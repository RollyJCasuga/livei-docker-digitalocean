<?php 

include 'database_connect.php';

$email = $_REQUEST["email"]; 
$searchemail = "SELECT * FROM Registered WHERE Email_Address='$email'";
$resultemail = mysqli_query($dbcon,$searchemail);

if (mysqli_num_rows($resultemail) > 0) {
	echo "Email is already taken";
}
else{ 
	//echo "Available";
}
?>
