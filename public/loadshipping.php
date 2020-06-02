<?php
  $mysqli = NEW MySQLi('172.17.0.3','root', 'admin', 'liveidb');

  //$username = $_SESSION['username'];

  $resultSet = $mysqli->query("SELECT * FROM Shipping WHERE Username = '$username' LIMIT 1");

  if($resultSet->num_rows !=0){
    $row = $resultSet->fetch_assoc();
    $shippingaddress = $row['Shipping_Address'];
	$shippingcountry = $row['Shipping_Country'];
	$shippingstate = $row['Shipping_State'];
    $shippingcity = $row['Shipping_City'];
    $shippingzipcode = $row['Shipping_Zipcode'];
	$contactnumber = $row['Contact_Number'];
	//$deliveryservices = $row['Delivery_Services'];

	//set details as sessions
	$_SESSION['shippingaddress'] = $shippingaddress;
	$_SESSION['shippingcity'] = $shippingcity;
	$_SESSION['shippingstate'] = $shippingstate;
	$_SESSION['shippingzipcode'] = $shippingzipcode;
	$_SESSION['shippingcountry'] = $shippingcountry;
	$_SESSION['contactnumber'] = $contactnumber;
	//$_SESSION['deliveryservices'] = $deliveryservices;
    }

    else{

      echo "<script>alert('Something went wrong.'); location.href = 'http://livei.com';</script>";

    }

?>

