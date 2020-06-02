<?php 

$shippingaddress = "";
$shippingcountry = "";
$shippingstate = "";
$shippingprovince = "";
$shippingcity = "";
$shippingzipcode = "";
$contactnumber = "";
$deliveryservices = "";

//Initialize Shipping Details
$initshipping = "INSERT into Shipping SET Username='$username', Shipping_Address='$shippingaddress', Shipping_Country='$shippingcountry', Shipping_State='$shippingstate', Shipping_Province='$shippingprovince', Shipping_City='$shippingcity', Shipping_Zipcode='$shippingzipcode', Contact_Number='$contactnumber', Delivery_Services='$deliveryservices'";

if (mysqli_query($dbcon, $initshipping)) {
	echo "<script>alert('Shipping Initialize');</script>";
}
else {
	$error = "Error" . mysqli_error($dbcon);
	echo "<script>alert('".$error."');</script>";
}
mysqli_close($dbcon);
?>
