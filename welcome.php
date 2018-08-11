<?php
session_Start();
?>
<!DOCTYPE html>
<html>
<head>
<link href='//fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
<style>

body, html {
	background-image : url("tryit.jpg");
	 background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
	background-color : lightblue;
	font-family: 'Cinzel Decorative';
	// font-family: 'Flavors';
	font-size: 35px;
	}
	
h4{
	color : white;
}
	
a:link {
    color: blue;
    background-color: transparent;
    text-decoration: none;
}
a:visited {
    color: orange;
    background-color: transparent;
    text-decoration: none;
}
a:hover {
    color: red;
    background-color: transparent;
    text-decoration: underline;
	font-size:150%;
}
a:active {
    color: yellow;
    background-color: transparent;
    text-decoration: underline;
}
</style>
<body>
<?php
		$user = $_POST['fname'];
		$pass = $_POST['psw'];
echo "<h2><font color='blue' >  Welcome ". $user." ! </font></h2>";


		// Below is My Database Connection File 
include 'connection.php';

if (isset($_REQUEST['signupbttn'])){
		$email = stripslashes($_REQUEST['email']); // For removing Backslashes
		$email = mysqli_real_escape_string($conn,$email); //escapes special characters in a string
		
		$fname = stripslashes($_REQUEST['fname']);
		$fname = mysqli_real_escape_string($conn,$fname);
		
		$lname = stripslashes($_REQUEST['lname']);
		$lname = mysqli_real_escape_string($conn,$lname);
		
		$password = stripslashes($_REQUEST['psw']);
		$password = mysqli_real_escape_string($conn,$password);
		
		$repPassword = stripslashes($_REQUEST['psw-repeat']);
		$repPassword = mysqli_real_escape_string($conn,$password);
		
		if($password != $repPassword)
		{
			echo"<script> alert('Invalid password');
				</script>";
			
		}
		
		else{
		
		$result = mysqli_query($conn,"Insert into users(fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')");
		}
		
}		
?>
<h4> You have Successfully Registered ! </h4>
<a href="/Project/login.php" target="_blank">Click Here To LogIn</a> 

</head>
<?php
session_destroy();
?>
</body>

</html>