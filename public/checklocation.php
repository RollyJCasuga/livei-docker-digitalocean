<?php 
$ip_address=$_SERVER['REMOTE_ADDR'];

$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
$city = $addrDetailsArr['geoplugin_city'];
$state = $addrDetailsArr['geoplugin_regionName'];
$country = $addrDetailsArr['geoplugin_countryName'];
echo $ip_address;
echo "<br>";
echo $city;
echo "<br>";
echo $state;
echo "<br>";
echo $country;
?>
