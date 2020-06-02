<?php 
  $mysqli = NEW MySQLi('localhost','admin', 'admin', 'liveidb');
  
  
  
  $username = $_SESSION['username'];
  $resultPayment = $mysqli->query("SELECT * FROM Payment_Method WHERE Username='$username' LIMIT 1");

  if($resultPayment->num_rows !=0){
    $row = $resultPayment->fetch_assoc();
    $cardname = $row['Card_Name'];
	$cardnumber = $row['Card_Number'];
	$cardcountry = $row['Card_Country'];
	$cardmmyy = $row['Card_MMYY'];
	$cardcvv = $row['Card_CVV'];
    $cardpostalcode = $row['Card_Postal_Code'];
    
	//set details as sessions
	$_SESSION["cardname"] = $cardname;
	$_SESSION["cardnumber"] = $cardnumber;
	$_SESSION["cardcountry"] = $cardcountry;
	$_SESSION["cardmmyy"] = $cardmmyy;
	$_SESSION["cardcvv"] = $cardcvv;
	$_SESSION["cardpostalcode"] = $cardpostalcode;
	//echo "<script>alert('Payment Loaded.');</script>";
	
    }

    else{

      echo "<script>alert('Something went wrong loading Payment');</script>";

    }

?>