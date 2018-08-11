<?php
session_Start();
?>
<!DOCTYPE html>
<html>
<style>
h3{
	color: white;
}
</style>
<link href='//fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
<link rel = "stylesheet" type = "text/css" href = "login.css">
<!-- 
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
 -->

 <body onload = "document.getElementById('id01').style.display='block'" style="width:10%;" >
 <body>

 <div id="id01" class="modal">
  
  <form class="modal-content animate" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="capture.jpg" alt="Avatar" class="avatar">
	  <!-- Below Code Starts For Image Upload -->
	  
	 <!--
	 <input type="file" onchange="previewFile()" ><br>
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
	-->
    </div>
					<!-- Code Ends For Image Upload -->	
 <?php
 include 'connection.php';
 //include 'signup.php';
 
 if (isset($_REQUEST['loginbtn'])){
	 
		
	 
		//$username = stripslashes($_REQUEST['email']); // removes backslashes
		$username = mysqli_real_escape_string($conn,$_REQUEST['email']); //escapes special characters in a string
	//	$password = stripslashes($_REQUEST['psw']);
		$password = mysqli_real_escape_string($conn,$_REQUEST['psw']);
		
		//Checking is user existing in the database or not
      //  $query = "SELECT * FROM `users` WHERE email='$username' and password='$password'";
		$query = "SELECT * FROM users WHERE email='$username' and password='$password'";
		$result = mysqli_query($conn,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		
		
	
		
		if($rows==1){
			// session_register("username");
         $_SESSION['email'] = $username;
         
         header("location: SubmitDetails.php");
      }else {
			echo "<script> alert('invalid password or username');
					window.location = '/Project/login.php';</script>";
      } 		 
		
}		

?>		

						<!-- Code Starts For Inserting Image Into Database -->
<?php
/* 
$msg = '';

if($_SERVER['REQUEST_METHOD']=='POST')
	{
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    
	$con = mysqli_connect('localhost','root','sharma2027','project') or die('Unable To connect');
    
	$sql = "insert into users (image) values(?)";
 
    $stmt = mysqli_prepare($con,$sql);
 
    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);
 
    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = ' <h1> Successfullly UPloaded </h1>';
    }else{
        $msg = ' <h1> Could not upload </h1>';
    }
    mysqli_close($con);
} */
?>
<?php
/* 
 $con = mysqli_connect('localhost','root','sharma2027','project') or die('Unable To connect');
    echo $msg;
	//select * from images where id = 1;
	$select_path="select * from users";

	$var=mysql_query($select_path);

	while($row=mysql_fetch_array($var))
	{
	$image_name=$row["imagename"];
	$image_path=$row["imagepath"];
	echo "img src=".$image_path."/".$image_name." width=100 height=100";
	}
 */?>
 

<center>
    <div class="container">
	
	
      <label><b>E-mail</b></label>
      <input type="text" placeholder="E-mail" name="email" required/>
		<br>
		
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required/>
        <br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <button type="submit" name = "loginbtn" >Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="/Project/signup.php" target="_blank">New User ?</a> 

  </form>
</div>
</center>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php
session_destroy();
?>
</body>
</html>
