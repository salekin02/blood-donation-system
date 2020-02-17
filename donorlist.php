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
	margin: 5px;
text-align: center;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 18px;

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
</style>
</head>
<body>
	<br>
<h1 align="center">Donor List</h1>
<br>
<table id="customers" style="margin: 0px auto;">
  <tr>
		<th>ID</th>
    <th>Name</th>
    <th>Blood Group</th>
    <th>Gender</th>
		<th>Age</th>
		<th>Weight</th>
		<th>Last Donated</th>
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
    if($month<3.0)
    {
      ?>
      <td><font color="red"><?= $p->id; ?></font></td>
      <td><font color="red"><?= $p->name; ?></font></td>
      <td><font color="red"><?= $p->bgroup; ?></font></td>
  	  <td><font color="red"><?= $p->gender; ?></font></td>
  	  <td><font color="red"><?= $p->age; ?></font></td>
  	  <td><font color="red"><?= $p->weight; ?></font></td>
        <td><font color="red"><?= $p->date; ?></font></td>
        <td><font color="red"><?= $p->number; ?></font></td>
    	  <td><font color="red"><?= $p->address; ?></font></td>
      <?php
    }
    else {
      ?>
      <td><?= $p->id; ?></td>
      <td><?= $p->name; ?></td>
      <td><?= $p->bgroup; ?></td>
  	  <td><?= $p->gender; ?></td>
  	  <td><?= $p->age; ?></td>
  	  <td><?= $p->weight; ?></td>
        <td><?= $p->date; ?></td>
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
  <p align="center" padding="40px">Note: [Red colored are not eligible for Donation] </p>
</br>
</body>
</html>
