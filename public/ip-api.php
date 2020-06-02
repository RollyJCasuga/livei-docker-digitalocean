<?php 

$ip = $_SERVER['REMOTE_ADDR'];
//$ip = "128.199.183.37";
$details = json_decode(file_get_contents("http://ip-api.com/json/".$ip."?fields=continent,country,region,regionName,city,district,currency,mobile,proxy,query"));
echo $details->city;
echo "<br>";
echo $details->continent;
echo "<br>";

echo $details->regionName;
echo "<br>";

echo $details->country;
echo "<br>";


if ($details->mobile) {
	echo "true";
}
else{
	echo "false";
}

echo "<br>";
if ($details->proxy) {
	echo "true";
}
else{
	echo "false";
}

?>
