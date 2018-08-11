<?php
session_start();
$connect = mysqli_connect("localhost","root","","myproject");
if(!($connect))
{
	echo"<br><h3>Error in connecting</h3>".mysqli_connect_error();
}
if(isset($_POST['loginbtn']))
{
	$myuname = mysqli_real_escape_string($connect,$_POST['u_name']);
	$mypass = mysqli_real_escape_string($connect,$_POST['pass1']);
	
	$query = "SELECT * from `signup` WHERE email='$myuname'and password ='$mypass'";
	$result = mysqli_query($connect,$query);
    $rows = mysqli_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($rows == 1)
	{
        $_SESSION['u_name'] = $myuname;
		header("Location: LoginVALIDATIONS.php"); 
        
    }
	else
	{
		echo"<script> alert('Invalid password or username');
		window.location = 'SignUpValidations_LoginHTML.php';</script>";			
	}
	 
}
?>
<html>
<TITLE> FORM</TITLE>
<head>
<link rel = "stylesheet" type = "text/css" href = "form.css">
</head>
<body>
<style>
.container {
    border-radius: 5px;
    padding: 20px;
}
</style>
<center>
<h1 style="color:white">Contact Form</h1>

<div class="container">
  <form  method = "post" name = "form1" action="response.php">
  
 <input type="file" onchange="previewFile()" name = "fileToUpload" id = "fileToUpload" ><br>
	
<img src="" height="200" alt="Please Upload Your Image...">
      <script>
   function previewFile(){
       var preview = document.querySelector('img'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }

  previewFile();  
  </script>
 
  <br>
  <label for="fname"><h3><b>First Name</b></h3></label>
    <input type="text" id="fname" name="fname" placeholder="Your name.." required>
	<br>
  
    <label for="lname"><h3><b>Last Name</b></h3></label>
    <input type="text" id="lname" name="lname" placeholder="Your last name.." required>
	<br>
	<br>
	<input type="radio" name="radio" value="Male"><b>Male</b>
	<input type="radio" name="radio" value="female"><b>Female</b>
	<br>
	<br>
    <label for="country" ><h3><b>Country</b></h3>&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select id="country" name="country" required>
      <option value="India">India</option>
      <option value="USA">USA</option>
      <option value="Russia">Russia</option>
    </select>
	
    <label for="subject">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label> 
		
    <textarea id="subject" name="subject" placeholder="Please Provide Feedback.." style="height:200px; float:center;" required></textarea>
	<br>
    <input type="submit" value="Submit" >
	
	<a href="Logout.php">
	<img src="log-out.jpg" alt="Logout" width="30" height="30" border="0" class = "image" 
		style="position: absolute;right:400px;top:70px;">
	</a>
</form>
</div>
</center>
</body>
</html>
