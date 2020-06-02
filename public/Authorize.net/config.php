<?php 
// Product Details 
$itemName = "Demo Product";  
$itemNumber = "PN12345";  
$itemPrice = 25;  
$currency = "USD";  
 
// Authorize.Net API configuration  

//define('ANET_API_LOGIN_ID', '9W78rQ5pj9');  
//define('ANET_TRANSACTION_KEY', '5389SVak237qG9eH');  
 
define('ANET_API_LOGIN_ID', '5hg78faXKVdX');  
define('ANET_TRANSACTION_KEY', '765ce3xj6R8cLA7C'); 
 
$ANET_ENV = 'SANDBOX'; // or PRODUCTION 
  
// Database configuration  
define('DB_HOST', '172.17.0.3');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', 'admin');  
define('DB_NAME', 'liveidb'); 

