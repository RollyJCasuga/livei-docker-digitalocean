<?php 

include 'database_connect.php';

$username = $_REQUEST["username"];
$searchusername = "SELECT * FROM Registered WHERE Username='$username'";

$resultusername = mysqli_query($dbcon,$searchusername);

  if (mysqli_num_rows($resultusername) > 0) {
    echo "Username is taken";
  }
  else{
    //echo "Available";
  }
?>
