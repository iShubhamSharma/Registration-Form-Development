<?php
session_Start();
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

	
   
<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
echo "<h2><font color='blue' > Thanks ". $fname." Your Response Is Recorded ! </font></h2>";


echo "<h2><b><font color='blue' >Your Submitted Details Are :<br><br>
First Name : ". $fname."<br><br> Last Name : ".$lname." <br> <br> Your Feedback Is Kept Encrypted </b></font></h2>";

if(isset($_POST['submit'])){
$selected_val = $_POST['Country'];  
echo "<h2><font color='blue' >Your Selected Country Is :" .$selected_val."<br></font></h2>";
}

if(isset($_POST['radio']))
{
echo "<h2><font color='blue' >Gender :".$_POST['radio']."<br></font></h2>"; 
}

?>


<!-- Below Code Starts For ImageUpload -->
<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<h2><font color='blue' >Uploaded Image is of Type - " . $check["mime"] . ".</b></font></h2>";
        $uploadOk = 1;
    } else {
        echo " <h2><font color='blue' > Uploaded File is not an image.</b></font></h2>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo " <h2><font color='blue' > Sorry, file already exists.</b></font></h2>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000000000) {
    echo "<h2><font color='blue' > Sorry, your file is too large.</b></font></h2>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo " <h2><font color='blue' >Sorry, only JPG, JPEG, PNG & GIF files are allowed.</b></font></h2>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h2><font color='blue' > Sorry, your file was not uploaded.</b></font></h2>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<h2><font color='blue' > The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</b></font></h2>";
    } else {
        echo "<h2><font color='blue' > Sorry, there was an error uploading your file.</b></font></h2>";
    }
}
?>
<?php
session_destroy();
?>
</body>
</html>