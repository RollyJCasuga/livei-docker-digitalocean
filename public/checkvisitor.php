<?php
        include 'visitorinfo.php';
		
		
//	echo $yourip;
//	echo $yourdevice;
//	echo $yourplatform;
//	echo $yourbrowser;
//	echo $city;
//	echo $state;
//	echo $country;
//	echo $zipcode;
//	echo $currency;
//	echo $isp;
//	echo $latitude;
//	echo $longitude;
	
        if(isset($_COOKIE["UID"])){
		//Exists
        } 
        else{
		//Insert Database
                $uid = "LI2600-".mt_rand(1000000, 9999999);
                setcookie("UID", $uid, time() + 21600);

                $DATABASE_HOST = '172.17.0.3';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = 'admin';
                $DATABASE_NAME = 'liveidb';

                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

                $query = "INSERT into Visitors SET UID='$uid', IP='$yourip', Device='$yourdevice', Platform='$yourplatform', Browser='$yourbrowser', City='$city', State='$state', Country='$country', Zipcode='$zipcode', Currency='$currency', ISP = '$isp', Latitude = '$latitude', Longitude = '$longitude'";
                        if (mysqli_query($con, $query)) {
                                //echo "visitor added to db";
                        }
                        else {
                                //echo "Error" . mysqli_error($con);
                        }
                mysqli_close($con);
                }
?>