<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
     .loginContainer div a {
     	color: white;
     }
		form.loginForm div {
			position: relative;
		}
		.logineye {
                        margin: 0;
                        padding: 0;
                        width: 16px;
                        height: 16px;
                        border: solid 1px white;
                        border-radius:  75% 15%;
                        position: absolute;
                        top: 20px;
                        right: calc(10% + 10px);
                        transform: rotate(45deg);
                        z-index: 2;
                }
                .logineye:before {
                        content: '';
                        display: block;
                        position: absolute;
                        width: 7px;
                        height: 7px;
                        border: solid 1px white;
                        border-radius: 50%;
                        left: 3px;
                        top: 3px;
                }

                .loginslash {
                        transform: rotate(45deg);
                        position: absolute;
                        top: 18px;
                        right: calc(10% + 19px);
                        border-left: 1px solid white;
                        height: 25px;
                        z-index: 1;
                }
		.hide {display: none;}
  </style>
</head>
<body>
  <span class="close" onclick="hideLogin()">&times;</span>
              <img src="liveiLogo.png">
              <h2>Login</h2>

            <form class="loginForm" id="loginForm" action="loginpage.php" method="post">
	    	<div><input class="username" id="username" type="text" name="username" placeholder="Username"></div>
           	<div>
			<input class="password" id="password" type="password" name="password" placeholder="Password">
              		<a class="logineye" onclick="logineye('lp-eye')"></a>
              		<a id="lp-eye" class="loginslash hide"></a>
		</div>
              <button class="btnLogin" type="submit" name="submit">Login</button>
            </form>

        <button class="btnRegister" onclick="displayRegister()">Register</button>

        <div><a href="" class="forgot" style="font-size: 13px;">Forgot Password?</a></div>

</body>
</html>
<script>
        function logineye(id) {
                if(document.getElementById(id).classList.contains("hide")){
                        document.getElementById(id).classList.remove("hide");
			document.getElementById("password").type = "text";
                }
                else {
                        document.getElementById(id).classList.add("hide");
			document.getElementById("password").type = "password";
                }
        }
  </script>

