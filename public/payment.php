<?php 
session_start();
$username = $_SESSION["username"];
$cardname = "";
$cardnumber = "";
$cardcountry = "";
$cardmmyy = "";
$cardcvv = "";
$cardpostalcode = "";

include 'database_connect.php';

if (!empty($username)){
	$searchshippingusername = "SELECT * FROM Payment_Method WHERE Username='$username'";
	$resultshippingusername = mysqli_query($dbcon,$searchshippingusername);
	if (mysqli_num_rows($resultshippingusername) > 0) {
		//DO NOT INITIALIZE SHIPPING DETAILS
	}
	else{
		//Initialize Shipping Details
		$initshipping = "INSERT into Payment_Method SET Username='$username', Card_Name='$cardname', Card_Number='$cardnumber', Card_Country='$cardcountry', Card_MMYY='$cardmmyy', Card_CVV='$cardcvv', Card_Postal_Code='$cardpostalcode'";

		if (mysqli_query($dbcon, $initshipping)) {
			echo "<script>alert('Card Initialize');</script>";
		}
		else {
			$error = "Error" . mysqli_error($dbcon);
			echo "<script>alert('".$error."');</script>";
		}
		mysqli_close($dbcon);
		
	}
}
  
?>
