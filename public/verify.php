<?php

$DATABASE_HOST = '172.17.0.3';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'admin';
$DATABASE_NAME = 'liveidb';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {

	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
else{

	$vkey = $_GET['vkey'];
	$query = "SELECT * FROM Registered WHERE Vkey='$vkey'";
	$result = mysqli_query($con,$query);

	if($row = mysqli_fetch_assoc($result)){

		if($row["Verified"] == 1){

			echo "<script>alert('This account is verified already.'); location.href = 'http://livei.com';</script>";
		}

		else{

			$sql = "UPDATE Registered SET Verified=1 WHERE Vkey='$vkey'";
			if (mysqli_query($con, $sql)) {
				echo "<script>alert('Your account has been verified you may now login.'); location.href = 'http://livei.com';</script>";
   			}
			else {

				echo "<script>alert('Error verifying .mysqli_error($conn).'); location.href = 'http://livei.com';</script>";

   			}
	   		mysqli_close($conn);

		}
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
