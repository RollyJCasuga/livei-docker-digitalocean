<?php 
$error = NULL;
if(isset($_POST['submit'])){
  $mysqli = NEW MySQLi('172.17.0.3','root', 'admin', 'liveidb');

  $username = $mysqli->real_escape_string($_POST['username']);
  $password = $mysqli->real_escape_string($_POST['password']);
  $password = md5($password);
//  echo "<script>alert('".$password."');</script>";
  $resultSet = $mysqli->query("SELECT * FROM Registered WHERE username = '$username' AND password = '$password' LIMIT 1");

  if($resultSet->num_rows !=0){
    $row = $resultSet->fetch_assoc();
    $verified = $row['Verified'];
    $email = $row['Email_Address'];
    $date = $row['Registration_Date'];
    $date = strtotime($date);
    $date = date("F d Y", $date);
    $firstname = $row['First_Name'];
    $sex = $row['Gender'];
    $lastname = $row['Last_Name'];
    $country = $row['Country'];
    $username = $row['Username'];
    $id = $row['ID'];
	$clientid = $row['Client_ID'];
	$profilepicture = $row['Profile_Picture'];
    $birthday = $row['Birthday'];

    if($verified == 1){
       	session_start();

        //change login status
        $_SESSION['loginStatus'] = 1;

		//update last login
		include 'database_connect.php';
		date_default_timezone_set("Asia/Manila");
		$timelog = date("M d, Y  h:i a");
		$updatetimelog = "UPDATE Registered SET Timelog='$timelog' WHERE Username='$username'";
		mysqli_query($dbcon, $updatetimelog);
		mysqli_close($dbcon);

        //set details as sessions
        $_SESSION['sex'] = $sex;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['country'] = $country;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
		$_SESSION['membersince'] = $date;
		$_SESSION['email'] = $email;
		$_SESSION['id'] = $id;
		$_SESSION['clientid'] = $clientid;
		$_SESSION['profilepicture'] = $profilepicture;
        $_SESSION['birthday'] = $birthday;
		include 'shipping.php';
		//include 'payment.php';
		//include 'loadpayment.php';
		include 'loadshipping.php';
        //header('location:index.php');
		//	echo "<script>alert('Thank you for Login Livei.com, We are happy to serve you 24/7'); location.href = 'http://64.227.62.178/';</script>";
        echo "<script>location.href = 'index.php';</script>";
    }

    else{

      echo "<script>alert('This account has not yet been verified. An email was sent to $email on $date'); location.href = 'http://livei.com';</script>";

    }

  }

  else{

	echo "<script>alert('The username or password you entered is incorrect.'); location.href = 'http://livei.com';</script>";
  }

}
?>

