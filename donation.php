<?php
include('header/header.php');
include('header/navadmin.php');
include('header/connection.php');
?>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
	margin: 0px;
text-align: center;
font-size: 18px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 5px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #FF5733;
  color: white;
}
h1{
  font-size: 20px;
}
</style>
</head>
<body>
	<br>
<h1 align="center">Donor List</h1>

<table id="customers" style="margin: 0px auto;">
  <tr>
		<th>ID</th>
    <th>Name</th>
    <th>Blood Group</th>
    <th>Gender</th>
		<th>Phone Number</th>
		<th>Address</th>
  </tr>
	<?php
$q=$db->query("SELECT * FROM donor");
while ($p=$q->fetch(PDO::FETCH_OBJ)) {
	?>
  <tr>

    <?php
        $d=$p->date;
        $current=date("Y/m/d");
        $month=((strtotime($current) - strtotime($d))/60/60/24)/30;
    if($month>=3.0) {
      ?>
      <td><?= $p->id; ?></td>
      <td><?= $p->name; ?></td>
      <td><?= $p->bgroup; ?></td>
      <td><?= $p->gender; ?></td>
      <td><?= $p->number; ?></td>
      <td><?= $p->address; ?></td>
    <?php
    }
    ?>

  </tr>

	<?php
}
	 ?>
</table>

<br>
<h1 align="center">Patient List</h1>

<table id="customers" style="margin: 0px auto;">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Blood Group</th>
  <th>Gender</th>
  <th>Phone Number</th>
  <th>Address</th>
</tr>
<?php
$q=$db->query("SELECT * FROM patient");
while ($p=$q->fetch(PDO::FETCH_OBJ)) {
?>
<tr>
  <td><?= $p->id; ?></td>
  <td><?= $p->name; ?></td>
  <td><?= $p->bgroup; ?></td>
  <td><?= $p->gender; ?></td>
  <td><?= $p->number; ?></td>
  <td><?= $p->address; ?></td>
</tr>

<?php
}
 ?>
</table>

<br></br>

<div class="type">
  <label style="color: #032B41"><u>Proceed a Donation</u></label>
  <br><br>
<form class="" action="" method="post">
    <label style="font-size:20px">Enter ID of Donor:</label>
  <input type="text" name="did" placeholder="ID of Donor" style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
  &nbsp;<label style="font-size:20px">  Enter ID of Patient:</label>
  <input type="text" name="pid" placeholder="ID of Patient" style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
<br>
    <input name="sub" type="submit" value="Proceed" style="font-weight:bold;font-size: 12px; width: 90px; height: 35px;border-radius:10px;background-color:#F9054B;font-size:18px;">
<br></br>
  </form>
</div>

<?php

if(isset($_POST['sub']))
{
  $did=$_POST['did'];
  $pid=$_POST['pid'];
  $count=$db->query("SELECT count(*) FROM donor WHERE id='$did'")->fetchColumn();


$q=$db->query("SELECT date FROM donor WHERE id='$did'");
$d=$q->fetchColumn();
$current=date("Y/m/d");
$month=((strtotime($current) - strtotime($d))/60/60/24)/30;
if($month<3.0)
{
echo "<script>alert('Donor not Available!')</script>";
}
else {
if(!$count==0){
$qd=$db->query("SELECT * FROM donor WHERE id='$did'");
$pd=$qd->fetch(PDO::FETCH_OBJ);
$dname=$pd->name;
$bdgroup=$pd->bgroup;

$qp=$db->query("SELECT * FROM patient WHERE id='$pid'");
$pp=$qp->fetch(PDO::FETCH_OBJ);
$pname=$pp->name;
$bgroup=$pp->bgroup;
$donationid=uniqid();
$date=$current;
 if($bdgroup==$bgroup){
  $t=$db->prepare("INSERT INTO donation(donationid,dname,pname,bgroup,date) VALUES (:donationid,:dname,:pname,:bgroup,:date)");
  $t->bindValue('donationid',$donationid);
  $t->bindValue('dname',$dname);
  $t->bindValue('pname',$pname);
  $t->bindValue('bgroup',$bgroup);
  $t->bindValue('date',$date);

$u=$db->prepare("UPDATE `donor` SET `date`='$date' WHERE id='$did'");

  if($t->execute() && $u->execute()){
      echo "<script>alert('Donation Succesfull')</script>";
  }
  else{
      echo "<script>alert('Donation Failed!')</script>";
  }
}
else {
  echo "<script>alert('Blood Group not matched!')</script>";
}} 
else
{
	 echo "<script>alert('Wrong ID!')</script>";
}
}}
 ?>
</body>
</html>
