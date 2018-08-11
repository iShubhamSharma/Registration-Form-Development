<?php
$conn = mysqli_connect("localhost","root","sharma2027","project");

		
$sql = "insert into users(fname,lname,email,password) values
('Shubham','Sharma','Sharma@gmail.com','swsw')";

if(mysqli_query($conn,$sql)){
	echo "Record Inserted";
}
else{
	echo "Error ".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);
?>