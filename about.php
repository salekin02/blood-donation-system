<?php
session_start();
include('header/header.php');
include('header/connection.php');
if(isset($_SESSION['loggedin'])==true){
	include('header/navadmin.php');
}
else {
	include('header/navuser.php');
}
?>
<!DOCTYPE html>
<html>

<section id="">
<div class="">
  <div class=""align="center">
    <img src="./img/vision.png" ALT="some text" WIDTH=180 HEIGHT=160>
      <ul style="list-style:none;">
          <li><a href=""><u>Our Vision</u></a></li>
        </ul>
<p>We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.</p>
  </div>
  <br><br>
  <div class=""align="center">
    <img src="./img/target.png" ALT="some text" WIDTH=180 HEIGHT=160>
    <ul style="list-style:none;">
    <li><a href=""><u>Our Goal</u></a></li>
    <p>We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.</p>
  </ul>
  </div>
  <br><br>
  <div class=""align="center">
    <img src="./img/mission.png" ALT="some text" WIDTH=180 HEIGHT=160>
    <ul style="list-style:none;">
  <li><a href=""><u>Our Mission</u></a></li>
  <p>We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.</p>
</ul>
  </div>

      <br><br>
</div>
</section>
</html>
