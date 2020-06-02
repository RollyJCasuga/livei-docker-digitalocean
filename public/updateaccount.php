<?php
session_start();
if(isset($_POST['save'])){

    $gender = $_POST['gender'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $country = $_POST['country'];
    $birthdate = $_POST['birthdate'];


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
		echo "<script>alert('Failed to upload your image.')</script>";
	    }
        }
	else {
	    $profilepicture = $_SESSION["profilepicture"];
	}
/*---------------------------end of profile picture----------------------*/
    $DATABASE_HOST = '117.17.0.3';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'admin';
    $DATABASE_NAME = 'liveidb';

    $connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    else{
	//echo "connected to db";

        $id = $_SESSION["id"];

	$updatequery = "UPDATE Registered SET Gender='$gender', First_Name='$firstname', Last_Name='$lastname', Country='$country',Birthday='$birthdate',Profile_Picture='$profilepicture' WHERE ID='$id'";

        if ($result = mysqli_query($connection, $updatequery)) {
            $_SESSION["sex"] = $gender;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["country"] = $country;
	    $_SESSION["birthdate"] = $birthdate;

            echo "<script>alert('Your account is successfully updated.'); location.href = 'http://www.livei.com';</script>";
          }
          else {
            echo "<script>alert('Something went wrong.'); location.href = 'http://www.livei.com';</script>";
          }

    }

}

?>
