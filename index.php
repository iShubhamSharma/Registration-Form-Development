<?php
session_Start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="google-signin-client_id" content="255249138366-fltc38naerso2ium3l7t9ccbt9opmhhq.apps.googleusercontent.com">

<meta charset="utf-8">
<link href='//fonts.googleapis.com/css?family=Eater' rel='stylesheet'>
<link href='//fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>


<link rel = "stylesheet" type = "text/css" href = "signup.css">


<script src ="snackbar.js"></script>
</head>
<center>
<h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signup </h2>
</center>
<body onload ="myFunction()">
<body>
<?php
// Below is My Database Connection File 
/* include 'connection.php';
if (isset($_REQUEST['email'])){
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
		
 */		
		/* $reg_date = date("Y-m-d H:i:s"); */
        /* $query = "INSERT into users(fname,lname,email,password) VALUES ('$fname','$lname','$email',
		'".md5($password)."')";
 */		//$query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '$password', '$email', '$trn_date')";
/*         
			$result = mysqli_query($conn,$query);
 */			
	
	
	
	
?>
<!-- <div id="parallax1"></div> -->
<div id="snackbar">Sign Up Here !</div>

<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function validateEmail() {
    var x = document.forms["myForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}

function validatePassword(){  
var firstpassword= document.forms["myForm"]["psw"].value; 
var secondpassword= document.forms["myForm"]["psw-repeat"].value;  
  
if(firstpassword==secondpassword){  
return true;  
}  
else{  
alert("password must be same!");
window.location = '/Project/signup.php';  
return false;  
}  
}  
</script>

<form method = "post" action = "/Project/welcome.php" name = "myForm"  onsubmit="return validateEmail();"  >
  <div class="container">
  <center>
 
  <label><b>First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
    <input type="text" placeholder="First Name" name="fname"  required/>
	<br>
	<?php
	usleep(2000000);
	?>
	<label><b>Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
    <input type="text" placeholder="Surname" name="lname" required/>
	<br>
    
	<label><b>E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
    <input type="text" placeholder="email" name="email" required/>
	<br>
    
	<label><b>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
    <input type="password" placeholder="Password" name="psw" id = "psw" required/>
	<br>
	
    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id = "psw-repeat"
		onmouseleave ="validatePassword()"	required/>
    <br>
	
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<input type="checkbox" checked="checked">Remember me
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
   
   <a href = "login.php">Already Registered ? </a>
    <div class="clearfix">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  
	  <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="signupbttn">Sign Up</button>
    </div>
   <b> Or </b>
	
	<script src="https://apis.google.com/js/platform.js" async defer></script>

<div class="g-signin2" data-onsuccess="onSignIn"></div>

<script>

function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  
  var id_token = googleUser.getAuthResponse().id_token;
	 if(id_token!="")
	{
		window.location ='final.php';
	} 
	var xhr = new XMLHttpRequest();
xhr.open('POST', 'http://localhost/Project/signup1.php');
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.onload = function() {
  console.log('Signed in as: ' + xhr.responseText);
};
xhr.send('idtoken=' + id_token);
}
</script>

<!--
<div id="my-signin2"></div>
  <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>
-->
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
   
  </div>
</center>
  </form>
<?php
session_destroy();
?>
</body>
</html>
