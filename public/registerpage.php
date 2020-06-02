<?php 
$error = NULL;
include 'database_connect.php';
if(isset($_POST['submit'])){

    $gender = $_POST['gender'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country = $_POST['country'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];
    $clientid = $_POST['clientid'];
    //echo "<script>alert('submitted');</script>";
    if(strlen($username) < 5){
        //echo "<script>alert('good username');</script>";
        //$error = "<p>Your username must be at least 5 characters</p>";
    }
    elseif ($confirmpassword != $password) {
        //echo "<script>alert('good password');</script>";
        //$error .= "<p>Your passwords do not match!</p>";
    }
    else{
		date_default_timezone_set("Asia/Manila");
		$dateregister = date("M d, Y  h:i a");
        $timelog = "";
        $vkey = md5(time().$username);
		$clientid = "LI2600-".mt_rand(100000000, 999999999);
		$verified = 0;
        $password = md5($password);
		$profilepicture = "images/default.png";
		$birthday = "";
        //echo "<script>alert('good info');</script>";
        $register = "INSERT into Registered SET Gender='$gender', First_Name='$firstname', Last_Name='$lastname', Country='$country', Username='$username', Password='$password', Email_Address='$email', Client_ID='$clientid', Registration_Date = '$dateregister', Timelog = '$timelog', Vkey='$vkey', Verified = '$verified', Profile_Picture = '$profilepicture', Birthday='$birthday'";
        //echo "<script>alert('register okay');</script>";
                if (mysqli_query($dbcon, $register)) {
                        //if insert success, send vkey via email
                        //echo "<script>alert('querying');</script>";
                        include 'phpmailer/index.php';
                        echo "<script>alert('Thank you for registering! We have sent a verification email to the address you provided.'); location.href = 'http://livei.com';</script>";

                }

                else {
                        $error = "Error" . mysqli_error($dbcon);
                        echo "<script>alert('".$error."');</script>";
                }
				mysqli_close($dbcon);
	}
}		

?>



