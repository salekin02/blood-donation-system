<?php
include('header/connection.php');
include('header/header.php');
include('header/navuser.php');
$page='http://localhost/Blood/home.php';
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>

     <title>Blood Donation | Welcome</title>
     <link rel="stylesheet" href="./css/style.css">
   </head>

   <body>

<div align="center" id="login">
  <br><br><br>
<label><b><font size="6" color="#032B41">Admin Login</font></b></label>
<br><br>
  <form action="" method="post">
  <table align="center" id="table">
    <tr>
      <td width="250px" height="80px"><b><font size="5">Enter Username</b></td>
      <td width="250px" height="80px"><input type="text" name="un" placeholder="Enter username" style="font-size: 18px; width: 180px; height: 30px; border-radius: 10px;"></td>
    </tr>
    <tr>
      <td width="250px" height="80px"><b><font size="5">Enter Password</font></b></td>
      <td width="250px" height="80px"> <input type="password" name="ps" placeholder="Enter Password" style="font-size: 18px; width: 180px; height: 30px; border-radius: 10px" id="myInput"></td>
      <td width="250px" height="80px"> <input type="checkbox" onclick="myFunction()"><font size="4">Show Password</font></td>
    </tr>


    <tr>
      <td><input type="submit" name="sub" value="Login" style="font-size: 18px; width: 70px; height: 30px; border-radius: 5px;"></td>

    </tr>
  </table>
  </form>
  <br><br>

<?php
if(isset($_POST['sub']))
{
  $un=$_POST['un'];
  $ps=$_POST['ps'];
$q=$db->query("SELECT * FROM admin WHERE uname='$un' && pass='$ps'");
$q->execute();
$res=$q->fetchAll(PDO::FETCH_OBJ);
if($res)
{
  session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['uname'] = $un;
  header('Location: '.$page);
}
else {
  echo "<script>alert('Wrong User!')</script>";
}
}
?>

</div>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>
</html>
