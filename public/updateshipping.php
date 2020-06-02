<?php
session_start();
if(isset($_POST['submit'])){

    $shippingaddress = $_POST['shippingaddress'];
    $shippingcity = $_POST['shippingcity'];
    $shippingstate = $_POST['shippingstate'];
    $shippingzipcode = $_POST['shippingzipcode'];
    $shippingcountry = $_POST['shippingcountry'];

    include 'database_connect.php';
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    else{
		//UPDATE SHIPPING
		$username = $_SESSION["username"];

		$updatequery = "UPDATE Shipping SET Shipping_Address='$shippingaddress', Shipping_City='$shippingcity', Shipping_State='$shippingstate', Shipping_Zipcode='$shippingzipcode', Shipping_Country='$shippingcountry' WHERE Username='$username'";

			if ($result = mysqli_query($dbcon, $updatequery)) {
				$_SESSION["shippingaddress"] = $shippingaddress;
				$_SESSION["shippingcity"] = $shippingcity;
				$_SESSION["shippingstate"] = $shippingstate;
				$_SESSION["shippingzipcode"] = $shippingzipcode;
				$_SESSION["shippingcountry"] = $shippingcountry;
				$_SESSION["alertstatus"] = 1;
				echo "<script>location.href = 'http://www.livei.com';</script>";
			  }
			  else {
				echo "<script>alert('Something went wrong.'); location.href = 'http://livei.com';</script>";
			  }

    }

}

?>
