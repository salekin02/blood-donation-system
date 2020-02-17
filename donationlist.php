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
<h1 align="center">Donation List</h1>
<br>
<table id="customers" style="margin: 0px auto;">
  <tr>
		<th>Donation ID</th>
    <th>Donor Name</th>
    <th>Patient Name</th>
    <th>Blood Group</th>
    <th>Date</th>

  </tr>
	<?php
$q=$db->query("SELECT * FROM donation");
while ($p=$q->fetch(PDO::FETCH_OBJ)) {
	?>
	<tr>
		<td><?= $p->donationid; ?></td>
    <td><?= $p->dname; ?></td>
    <td><?= $p->pname; ?></td>
	  <td><?= $p->bgroup; ?></td>
	  <td><?= $p->date; ?></td>
  </tr>
	<?php
}
	 ?>


</table>

</body>
</html>
