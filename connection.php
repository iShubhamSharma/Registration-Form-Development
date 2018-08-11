<?php

$conn = mysqli_connect("localhost","root","sharma2027","project") or die("Could Not Connect / Error 404") ;

if(!$conn)
{
	die("Connection Failed".mysqli_connect_error());
}
/* else
{
	echo "Connection Established Successfully <br>";
	
} */
?>