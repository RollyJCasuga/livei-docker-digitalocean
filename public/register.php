<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
		
    	:root{
			--register-width: 320px;
			--register-height: calc(100vh - 60px - 60px);
			/*--register-height: 500px;*/
			--header-height: 70px;
			
		}

		.registerContainer {
			display: block;
			position: fixed;
			width: var(--register-width);
			height: var(--register-height);
			top: 60px;
			border-radius: 5px;
			left: calc(100vw / 2 - calc(var(--register-width) / 2));
			background-color: rgba(0,0,0,0.3);
		}

		.registerContainer .header {
			position: relative;
			display: flex;
			align-items: center;
			justify-content: center;
			color: white;
		    font-family: "Arial Narrow", Arial, sans-serif;
	        font-weight: normal;
        	text-decoration: none;
			text-align: center;
			height: var(--header-height);
		}

		.registerContainer .header span {
			position: absolute;
			right: 10px;
			color: white;
			font-size: 28px;
			font-weight: bold;
			top: 3px;
		}

		.registerContainer .header label {
			font-size: 30px;
		}

		.registerContainer .body {
			max-height: calc(var(--register-height) - var(--header-height));
			overflow: auto;
		}

		.registerContainer form div{
			position: relative;
			padding: 0 10%;
		}

		.registerContainer form div input.input {
			position: relative;
			padding: 12px 20px;
			margin: 8px 0;
			border: 1px solid;
			box-sizing: border-box;
			border-color: white;
			width: 100%;
			background: transparent;
			color: white;
			border-radius: 5px;
	        font-size: 16px;
			outline: none;
		}

		.registerContainer form div input.input::placeholder {
			color: white;
		     	opacity: 1;
		}

		.registerContainer form div label.required-indicator {
			position: absolute;
			display: inline-block;
			color: red;
			padding-top: 10px;
			padding-left: 6px;
		}

		.registerContainer form div span {
			position: relative;
			display: inline-block;
			width: 90%;
			text-align: left;
			padding: 5px 0px 12px 20px;
			color: white;
	        	font-family: "Arial Narrow", Arial, sans-serif;
	        	font-weight: normal;
        		text-decoration: none;
		}

		.registerContainer form div span.newsletter {
			padding: 0px;
			padding-bottom: 10px;
		}

		.registerContainer form div button {
			background-color: #668d3c;
			color: white;
			padding: 12px 20px;
			margin-bottom: 20px;
			margin-top: 10px;
			border: none;
			cursor: pointer;
			width: 100%;
			border-radius: 5px;
			font-size: 16px;
		}
		.caret {
			position: absolute;
			content: '';
			right: 40px;
			top: 27.2px;
			border-top: 6px solid white;
			border-left: 6px solid transparent;
			border-right: 6px solid transparent;
		}

		.country-content {
            position: absolute;
		    display: none;
		    z-index: 1;
            background-color: white;
            border: 1px solid white;
		    left: 10%;
		    top: 53px;
		    width: 80%;
		    border-radius: 5px;
		    height: 348px;
		    overflow: auto;
		}

		.country-content a {
			overflow: auto;
            display: block;
            color: black;
			padding: 6px 20px;
            font-family: "Arial Narrow", Arial, sans-serif;
            font-size: 15px;
            font-weight: normal;
            text-decoration: none;
            text-align: left;
		}
		.country-content a.divider {
			padding: 12px 20px;
			border-bottom: 2px solid rgba(127, 127, 127, 0.5);
		}

		.country-content a:hover {
			background-color: rgba(127, 127, 127, 0.5);
		}

		.registerContainer form div input.disabled {
			position: absolute;
			width: 80%;
			left: 10%;
			text-align: left;
		}

		.registerContainer form div input.hidden {
			color: transparent;
			text-shadow: 0 0 0 transparent;
		}

		.show {display: block;}

		.eye {
			margin: 0;
			padding: 0;
			width: 16px;
			height: 16px;
			border: solid 1px white;
			border-radius:  75% 15%;
			position: absolute;
			top: 20px;
			right: calc(10% + 20px);
			transform: rotate(45deg);
			z-index: 2;
		}
		.eye:before {
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

		.slash {
			transform: rotate(45deg);
    			position: absolute;
    			top: 18px;	
    			right: calc(10% + 29px);
    			border-left: 1px solid white;
    			height: 25px;
			z-index: 1;
		}
		.hide {display: none;}
		.checknotification{
			margin-left: 5px;
			font-family: Arial;
			color: red;
			font-size: 14px;
		}
		#password-notification{
			margin-left: 5px;
			font-family: Arial;
			font-size: 14px;
		}
		
    </style>
</head>
<body>
		<div class="header">
			<span class="close" onclick="hideRegister()">&times;</span>
        	<label>Registration</label>
		</div>
		<div class="body" id="body">
		<form class="registerForm" id="registerForm" action="registerpage.php" method="post">
				<div>
					<label class="required-indicator">*</label>
					<span>
					<label>Gender:</label>
					<label><input type="radio" name="gender" value="Male" required>Male</label>
					<label><input type="radio" name="gender" value="Female" required>Female</label>
					</span>
				</div>
	            <div>
	            	<label class="required-indicator">*</label>
	            	<input class="input" type="text" name="firstname" placeholder="First Name" required>
	            </div>
	            <div>
	            	<label class="required-indicator">*</label>
	            	<input class="input" type="text" name="lastname" placeholder="Last Name" required>
	            </div>
			
	            <div>
	            	<label class="required-indicator">*</label>
	            	<input class="input hidden" id="country" type="text" name="country" onfocus="show()" required>
	            	<input class="input disabled" id="fake" type="button" value="Country" onclick="show()">
	            	<label class="caret" onclick="show()"></label>
		            <label class="country-content" id="country-content">
	            		<a class="divider" id="United States" onclick="setCountry(this.id)">United States</a>
	            	</label>
	            </div>
	            <div>
	            	<label class="required-indicator">*</label>
	            	<input class="input" type="text" name="username" placeholder="Username" pattern="[A-Za-z0-9_]{5,}" title="Your username must contain at least 5 characters and Alphnumeric characters only" required onkeyup="checkusername(this.value);">
					<label id="username-notification" class="checknotification"></label>
					
	            </div>
	            <div>
	            	<label class="required-indicator">*</label>
	            	<input class="input" id="r-password" type="password" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
	                <a class="eye" onclick="eye('p-eye')"></a>
			<a id="p-eye" class="slash hide"></a>
		    </div>
	            <div>
	            	<label class="required-indicator">*</label>
	            	<input class="input" id="confirmpassword" type="password" name="confirmpassword" placeholder="Confirm Password" required onkeyup="check();"/> 
	            	<label id="password-notification"></label>
			<a class="eye" onclick="eye('cp-eye')"></a>
			<a id="cp-eye" class="slash hide"></a>
	            </div>
	            <div>
	            	<label class="required-indicator">*</label>
	            	<input class="input" type="email" name="email" placeholder="Email Address" required onkeyup="checkemail(this.value);">
					<label id="email-notification" class="checknotification"></label>
					<label id="email-validation" class="checknotification"></label>
	            </div>
	            <div>
			<label class="required-indicator">*</label>
	            	<button id="register-btn" type="submit" name="submit">Click here to Register</button>
	            </div>
        	</form>
		</div>
	</body>
</html>

<script>

	function checkusername(username){
		if (username.length == 0) {
			document.getElementById("username-notification").innerHTML = "";
	    return;
		} 
		else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("username-notification").innerHTML = this.responseText;
				
			}
	    };
		
	    xmlhttp.open("GET", "checkusername.php?username=" + username, true);
	    xmlhttp.send();
		}
		
	}
	
	function checkemail(email){
		
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		
		if (email.length == 0) {
			document.getElementById("email-notification").innerHTML = "";
	    return;
		}
		else if (email.match(mailformat)){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("email-notification").innerHTML = this.responseText;
					
				}
			};
			xmlhttp.open("GET", "checkemail.php?email=" + email, true);
			xmlhttp.send();
		}
		else{
			
			document.getElementById("email-notification").innerHTML = "You have entered an invalid email address!";
			
		}
		
	}
		
	
	var countries = ["Afghanistan", "Ãland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Cook Islands", "Costa Rica", "Cote D'ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran, Islamic Republic of", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Moldova, Republic of", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard and Jan Mayen", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan (ROC)", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Timor-leste", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "VietNam", "Virgin Islands, British", "Virgin Islands, U.S.", "Wallis and Futuna", "Western Sahara", "Yemen", "Zambia", "Zimbabw"];

	for (var x = 0; x < countries.length; x++) {
		var a = document.createElement("A");
		a.setAttribute("id", countries[x]);
		a.setAttribute("onclick", "setCountry(this.id)");
		a.innerHTML = countries[x];
		document.getElementById("country-content").appendChild(a);
	}

	function check() {
		if (document.getElementById('r-password').value == document.getElementById('confirmpassword').value) {
		    document.getElementById('password-notification').style.color = 'green';
		    document.getElementById('password-notification').innerHTML = 'Password match!';
		    document.getElementById('register-btn').disabled = false;
		}
		else {
		    document.getElementById('password-notification').style.color = 'red';
		    document.getElementById('password-notification').innerHTML = 'Password not match!';
		    document.getElementById('register-btn').disabled = true;
	  }
	}

	function show() {
		if (document.getElementById("country-content").classList.contains("show")) {
			document.getElementById("country-content").classList.remove("show");
		}
		else {
			document.getElementById("country-content").classList.add("show");
		}

		var body = document.getElementById('body');
		body.scrollTop = body.clientHeight - 50;
	}

	function setCountry(country) {
		document.getElementById("country").value = country;
		document.getElementById("fake").value = country;
		document.getElementById("country-content").classList.remove("show");
	}

	function eye(id) {
		var slash = document.getElementById(id).style.display;
		if(document.getElementById(id).classList.contains("hide")){
				document.getElementById(id).classList.remove("hide");
			if (id == "p-eye") {
				document.getElementById('r-password').type = 'text';
			}
			else {
				document.getElementById('confirmpassword').type = 'text';
			}
		}
		else {
			document.getElementById(id).classList.add("hide");
			if (id == "p-eye") {
                                document.getElementById('r-password').type = 'password';
                        }
                        else {
                                document.getElementById('confirmpassword').type = 'password';
                        }
		}
	}
</script>

