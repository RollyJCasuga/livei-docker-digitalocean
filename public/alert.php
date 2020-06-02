<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	body{
		font-family: Arial;
		color: white;
	}
	#alertModalContainer{
		margin: auto;
		background-color: rgba(0,0,0,0.3);
		width: 70%;
		border-radius: 10px;
		padding: 20px;
	}
	#alertModalContainer span{
		font-size: 25px;
		margin-left: 97%;
	}
</style>

<body>
	<div id="alertModalContainer">
		<span id="alertClose" onclick="hideAlert()">&times;</span>
		<div id="alertModal">
			  <h1>Success!</h1>
			  <p>You successfully updated your account.</p>
		</div>
	</div>
</body>
</html>