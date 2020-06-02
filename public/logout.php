<?php
session_start();
//echo "<script>alert('Thank you ".$_SESSION['firstname'].", Comeback Again!')</script>";
session_destroy();

//header('location: http://www.livei.com');
?>
<script>
	setTimeout(backHome, 1000);
	function backHome() {
	  window.location.replace("http://livei.com");
	}
</script>
