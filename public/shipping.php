<?php 
session_start();
$username = $_SESSION["username"];
$shippingaddress = "";
$shippingcountry = $_SESSION["country"];
$shippingstate = "";
$shippingprovince = "";
$shippingcity = "";
$shippingzipcode = "";
$contactnumber = "";

include 'database_connect.php';

if (!empty($username)){
	$searchshippingusername = "SELECT * FROM Shipping WHERE Username='$username'";
	$resultshippingusername = mysqli_query($dbcon,$searchshippingusername);
	if (mysqli_num_rows($resultshippingusername) > 0) {
		//DO NOT INITIALIZE SHIPPING DETAILS
	}
	else{
		//Initialize Shipping Details
		//echo "<script>alert('Shipping Initializing');</script>";
		$initshipping = "INSERT into Shipping SET Username='$username', Shipping_Address='$shippingaddress', Shipping_City='$shippingcity', Shipping_State='$shippingstate', Shipping_Zipcode='$shippingzipcode',Shipping_Country='$shippingcountry', Contact_Number='$contactnumber'";

		if (mysqli_query($dbcon, $initshipping)) {
			//echo "<script>alert('Shipping Initialize');</script>";
		}
		else {
			$error = "Error" . mysqli_error($dbcon);
			echo "<script>alert('".$error."');</script>";
		}
		mysqli_close($dbcon);

	}
}
 
?>

