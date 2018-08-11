<?php
// VALIDATIONS FOR SIGN UP
$connect = mysqli_connect("localhost","root","","myproject");
if(!($connect))
{
	echo"<br><h3>Error in connecting</h3>".mysqli_connect_error();
}
session_start();
if(isset($_POST['signupbttn']))
{
		$uname = mysqli_real_escape_string($connect,$_POST['fname']);
		$lname = mysqli_real_escape_string($connect,$_POST['lname']);
		$emname = mysqli_real_escape_string($connect,$_POST['emname']);
		$pass = mysqli_real_escape_string($connect,$_POST['pass']);
		$rep_pass = mysqli_real_escape_string($connect,$_POST['rep_pass']);
		
		/*Applying VALIDATIONS */
		if(!filter_var($emname, FILTER_VALIDATE_EMAIL))
		{
			echo"<script> alert('Enter valid email address');
				window.location ='SignUp.html'</script>"; 
			
		}
		if($pass != $rep_pass)
		{
			echo"<script> alert('Invalid password');
				window.location ='SignUp.html'</script>";
			
		}
		
		else{
			$result = mysqli_query($connect,"Insert into signup(Firstname,Lastname,Email,Password,RepeatPassword) VALUES ('$uname','$lname','$emname','$pass','$rep_pass')");
			}
			
								
}	
?>

<html>
<head>
<TITLE> LOGIN </TITLE>

<link rel = "stylesheet" type = "text/css" href = "Login.css">
</head>
<body>
<form method = "post" name ="login" action="LoginVALIDATIONS.php">
<div id = "imgcontainer">
<center><img src = "male_photo.png"></center>

<center>
<div id = "container">
	
	<label><b>Username</b></label>
	<input type = "text" placeholder = "Enter Username" name = "u_name" required>
 	<br>
	
	<label><b>Password </b></label>
	<input type = "password" placeholder = "Enter Password" name = "pass1" required>
	<br>
	
	<button type = "Submit" name = "loginbtn" class = "loginbtn">Login</button>
	<br><br>
	<a href= "SignUp.html" style="font-size:20;">Haven't Registered? Register now</a>
</div>

</div>
</center>
</form>
</body>
</html>