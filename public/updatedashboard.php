<?php
session_start();
if(isset($_POST['submit'])){

	//PERSONAL INFO
	$gender = $_POST['gender'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
	$birthday = $_POST['birthday'];
    $country = $_POST['country'];

	//SHIPPING
    $shippingaddress = $_POST['shippingaddress'];
    $shippingcity = $_POST['shippingcity'];
    $shippingstate = $_POST['shippingstate'];
	$shippingprovince = $_POST['shippingprovince'];
    $shippingzipcode = $_POST['shippingzipcode'];
    $shippingcountry = $_POST['shippingcountry'];
	$contactnumber = $_POST['contactnumber'];
	$deliveryservices = $_POST['deliveryservices'];

	//CARD
    $cardname = $_POST['cardname'];
	$cardnumber = $_POST['cardnumber'];
	$cardcountry = $_POST['cardcountry'];
	$cardmmyy = $_POST['cardmmyy'];
	$cardcvv = $_POST['cardcvv'];
	$cardpostalcode = $_POST['cardpostalcode'];

	/*--------------------------for profile picture----------------------------*/
	$image = $_FILES['image']['name'];
		if(!empty($image)) {
            $target = "images/profile/".$_SESSION["username"].".".strtolower(pathinfo($image, PATHINFO_EXTENSION));
	//echo "<script>alert('".$target."')</script>";
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	//echo "<script>alert('meron')</script>";
					$profilepicture = $target;
					$_SESSION["profilepicture"] = $target;
			}
			else {
					$profilepicture = $_SESSION["profilepicture"];
					echo "<script>alert('Failed to upload your image. Error: ".$_FILES["image"]["error"]."')</script>";
			}
		}
		else {
			$profilepicture = $_SESSION["profilepicture"];
		}
	/*---------------------------end of profile picture----------------------*/

    include 'database_connect.php';
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
		//echo "failed to connect";
    }
    else{
		//echo "success to connect";
		$username = $_SESSION["username"];
		//UPDATE PERSONAL INFO
		$updatepersonalinfo = "UPDATE Registered SET Gender='$gender', First_Name='$firstname', Last_Name='$lastname', Birthday='$birthday', Country='$country',Profile_Picture='$profilepicture' WHERE Username='$username'";

			if ($result = mysqli_query($dbcon, $updatepersonalinfo)) {
				$_SESSION["sex"] = $gender;
				$_SESSION["firstname"] = $firstname;
				$_SESSION["lastname"] = $lastname;
				$_SESSION["country"] = $country;
				$_SESSION["birthday"] = $birthday;
				//echo "<script>alert('Update Success'); location.href = 'http://livei.com';</script>";
			  }
			  else {
				echo "<script>alert('Something went wrong. PI'); location.href = 'http://livei.com';</script>";
		}

		//UPDATE SHIPPING
		$updateshipping = "UPDATE Shipping SET Shipping_Address='$shippingaddress', Shipping_City='$shippingcity', Shipping_State='$shippingstate', Shipping_Zipcode='$shippingzipcode',Shipping_Country='$shippingcountry', Contact_Number='$contactnumber' WHERE Username='$username'";

			if ($result = mysqli_query($dbcon, $updateshipping)) {
				$_SESSION["shippingaddress"] = $shippingaddress;
				$_SESSION["shippingcity"] = $shippingcity;
				$_SESSION["shippingstate"] = $shippingstate;
				$_SESSION["shippingzipcode"] = $shippingzipcode;
				$_SESSION["shippingcountry"] = $shippingcountry;
				$_SESSION["contactnumber"] = $contactnumber;
				$_SESSION["deliveryservices"] = $deliveryservices;
				echo "<script>alert('Account Updated'); location.href = 'http://livei.com';</script>";
			  }
			  else {
				echo "<script>alert('Something went wrong SHIPPING.'); location.href = 'http://livei.com';</script>";
			  }
		//UPDATE PAYMENT
		//$updatepayment = "UPDATE Payment_Method SET Card_Name='$cardname', Card_Number='$cardnumber', Card_Country='$cardcountry', Card_MMYY='$cardmmyy', Card_CVV='$cardcvv', Card_Postal_Code='$cardpostalcode' WHERE Username='$username'";

		//	if ($result = mysqli_query($dbcon, $updatepayment)) {
		//		$_SESSION["cardname"] = $cardname;
		//		$_SESSION["cardnumber"] = $cardnumber;
		//		$_SESSION["cardcountry"] = $cardcountry;
		//		$_SESSION["cardmmyy"] = $cardmmyy;
		//		$_SESSION["cardcvv"] = $cardcvv;
		//		$_SESSION["cardpostalcode"] = $cardpostalcode;
		//		echo "<script>alert('Account Updated'); location.href = 'http://livei.com';</script>";
		//	  }
		//	  else {
		//		echo "<script>alert('Something went wrong PAYMENT.'); location.href = 'http://livei.com';</script>";
		//	  }


    }

}

?>
