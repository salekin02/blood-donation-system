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

<!DOCTYPE HTML>

<head>
	<title>Registration</title>
	<link rel="icon" href="icon/reg.png" />
	<style type="text/css">

        label { display: inline-block; width: 130px; text-align: center; }

		ul{
			margin:0px;
			padding:0px;
			list-style: none;
		}
		ul li{
			float:left;
			width:220px;
			height:40px;
			background-color:#27ae60;
			opacity:.8;
			line-height: 40px;
			text-align:center;
			font-size:20px;
			margin-right:2px;
		}

		ul li a{
			text-decoration: none;
			color:black;
			text-transform: uppercase;
			font-weight: bold;
			display:block;
		}
		ul li a:hover{
			background-color:red;
		}
		ul li ul li{
			display:none;
		}
		ul li:hover ul li{
			display:block;
		}

		.reg{
			margin-left:530px;
		}
	</style>
</head>
<body>


	</ul>



<h1 align="center">Patient Registration</h1>
    <br />

	<form style="text-align:justify;font-size:18px;color:#FF5733 "class="reg" method="post"> <!--Registration Form-->
		<label for="first" >Full Name:</label>
		<input id="first" type="text" name="name" placeholder="Full Name" autofocus required />


		<br /><br />

		<label>Blood Group:</label>

		<select name="bgroup">
			<option>Select</option>
			<option>A+</option>
			<option>A-</option>
			<option>B+</option>
			<option>B-</option>
			<option>AB+</option>
			<option>AB-</option>
			<option>O+</option>
			<option>O-</option>

			</select>

		<br /><br />

		<label for="Gender">Gender:</label> <!--Radio Button for Gender-->
		<input type="radio" name="gender" value="Male"/>Male
		<input type="radio" name="gender" value="Female"/>Female
		<input type="radio" name="gender" value="Others"/>Others

		<br /><br />

		<label for="age">Age:</label>
		<input id="last" type="text" placeholder="" name="age" />
		<br /><br />
		<label for="weight">Weight:</label>
		<input id="weight" type="text" name="weight" placeholder="" />
		<br /> <br />



		<label for="phone">Phone Number:</label> <!--Input Type for Phone Number-->
		<input id="phone" type="tel" name="number"placeholder="+8801********" required />

		<br /><br />

		<label for="address">Address:</label>
		<textarea name="address" id="address" placeholder="Please include your Division & City" cols="35" rows="2"></textarea> <!--Textarea for address-->
<br><br />
		<input name="sub" type="submit" value="Submit" style="background-color:#1797DB;font-size:18px;" />
		<input type="reset" value="Reset" style="background-color:#ff0000;color:white;font-size:18px;" />
		<br /><br />

	</form>


    <?php
    if(isset($_POST['sub'])){
        $name=$_POST['name'];
        $bgroup=$_POST['bgroup'];
        $gender=@$_POST['gender'];
        $age=$_POST['age'];
        $weight=$_POST['weight'];
        $number=$_POST['number'];
        $address=$_POST['address'];
				$id=uniqid();


        $q=$db->prepare("INSERT INTO patient(id,name,bgroup,gender,age,weight,number,address) VALUES (:id,:name,:bgroup,:gender,:age,:weight,:number,:address)");

        $q->bindValue('id',$id);
        $q->bindValue('name',$name);
        $q->bindValue('bgroup',$bgroup);
        $q->bindValue('gender',$gender);
        $q->bindValue('age',$age);
        $q->bindValue('weight',$weight);
        $q->bindValue('number',$number);
        $q->bindValue('address',$address);

				if($q->execute()){
	          echo "<script>alert('Registration Succesfull!')</script>";
        }
        else{
            echo "<script>alert('Registration Failed!')</script>";
        }
    }

    ?>

</body>
</html>
