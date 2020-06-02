<?php 

//IP
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$yourip = getUserIpAddr();
// echo "<br>";
// echo 'IP: ';
// echo $yourip;


//CITY & STATE & COUNTRY
$details = json_decode(file_get_contents("http://ip-api.com/json/".$yourip."?fields=8913661"));
$city = $details->city;
$state = $details->regionName;
$country = $details->country;
$zipcode = $details->zip;
$currency = $details->currency;
$isp = $details->isp;
$latitude = $details->lat;
$longitude = $details->lon;




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
$yourbrowser= $ua['name'] . " " . $ua['version'];
// echo "<br>";
// echo "Browser: ";
// echo $yourbrowser;

//OS
// echo "<br>";
// echo "Platform: ";
$yourplatform = $ua['platform'];
// echo $yourplatform;

//DEVICE
$device = $ua['userAgent'];
$pattern='/\((.*?)[;](.*?)[;](.*?)\)|\((.*?)\)/';
if (preg_match($pattern, $device, $match))
$yourdevice = $match[0];
//echo "<br>";
//echo $device;
// echo "<br>";
// echo "Device: ";
// echo $yourdevice;
?>