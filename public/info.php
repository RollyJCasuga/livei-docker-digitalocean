<?php 

//IP
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else{
  $ip = $_SERVER['REMOTE_ADDR'];
}

//MAC ADDRESS
//$MAC = exec('getmac'); 
//$MAC = strtok($MAC, ' '); 


//CITY & STATE & COUNTRY
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
$city = $addrDetailsArr['geoplugin_city'];
$state = $addrDetailsArr['geoplugin_regionName'];
$country = $addrDetailsArr['geoplugin_countryName'];




function getBrowser() {
  $u_agent = $_SERVER['HTTP_USER_AGENT'];
  $bname = 'Unknown';
  $platform = 'Unknown';
  $version= "";

  if (preg_match('/linux/i', $u_agent)) {
    $platform = 'Linux';
  }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'Mac';
  }elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'Windows';
  }

  if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }elseif(preg_match('/Firefox/i',$u_agent)){
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
  }elseif(preg_match('/OPR/i',$u_agent)){
    $bname = 'Opera';
    $ub = "Opera";
  }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Google Chrome';
    $ub = "Chrome";
  }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Apple Safari';
    $ub = "Safari";
  }elseif(preg_match('/Netscape/i',$u_agent)){
    $bname = 'Netscape';
    $ub = "Netscape";
  }elseif(preg_match('/Edge/i',$u_agent)){
    $bname = 'Edge';
    $ub = "Edge";
  }elseif(preg_match('/Trident/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }

  $known = array('Version', $ub, 'other');
  $pattern = '#(?<browser>' . join('|', $known) .
')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
  if (!preg_match_all($pattern, $u_agent, $matches)) {

  }

  $i = count($matches['browser']);
  if ($i != 1) {

    if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
        $version= $matches['version'][0];

	}else {
        $version= $matches['version'][1];
    }

  }else {
    $version= $matches['version'][0];
  }

  if ($version==null || $version=="") {$version="?";}

  return array(
    'userAgent' => $u_agent,
    'name'      => $bname,
    'version'   => $version,
    'platform'  => $platform,
    'pattern'    => $pattern
  );
}

//BROWSER
$ua=getBrowser();
$browser= $ua['name'] . " " . $ua['version'];

//OS
$platform = $ua['platform'];

//DEVICE
$device = $ua['userAgent'];
$pattern='/\((.*?)[;](.*?)[;](.*?)\)|\((.*?)\)/';
if (preg_match($pattern, $device, $match))
$device = $match[0];
?>

<script type="text/javascript">
  alert("IP Address: <?php echo $ip ?>  \nDevice: <?php echo $device ?> \nPlatform: <?php echo $platform ?> \nBrowser: <?php echo $browser ?> \nCity: <?php echo $city ?> \nState: <?php echo $state ?> \nCountry: <?php echo $country ?>");
</script>
