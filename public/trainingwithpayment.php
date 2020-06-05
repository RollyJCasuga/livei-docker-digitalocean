<?php 
    session_start();

    $_SESSION['loginStatus'] = empty($_SESSION['loginStatus']) ? 0 : $_SESSION['loginStatus'];
    $_SESSION['paid'] = empty($_SESSION['paid']) ? 0 : $_SESSION['paid'];

    if (isset($_POST["login_submit"])) {
        $mysqli = NEW MySQLi('172.17.0.3','root', 'admin', 'liveidb');

        $username = $mysqli->real_escape_string($_POST['username']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $password = md5($password);

        $resultSet = $mysqli->query("SELECT * FROM Registered WHERE username = '$username' AND password = '$password' LIMIT 1");

        if ($resultSet->num_rows != 0) {
            $row = $resultSet->fetch_assoc();
            if ($row['Verified'] == 1) {

                $_SESSION['loginStatus'] = 1;

                $verified = $row['Verified'];
                $email = $row['Email_Address'];
                $date = $row['Registration_Date'];
                $date = strtotime($date);
                $date = date("F d Y", $date);
                $firstname = $row['First_Name'];
                $sex = $row['Gender'];
                $lastname = $row['Last_Name'];
                $country = $row['Country'];
                $username = $row['Username'];
                $id = $row['ID'];
                $clientid = $row['Client_ID'];
                $profilepicture = $row['Profile_Picture'];
                $birthday = $row['Birthday'];

                $_SESSION['sex'] = $sex;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['country'] = $country;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['membersince'] = $date;
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $id;
                $_SESSION['clientid'] = $clientid;
                $_SESSION['profilepicture'] = $profilepicture;
                $_SESSION['birthday'] = $birthday;
            }
            else {
                echo "<script>alert('This account has not yet been verified. An email was sent to ".$row['Email_Address']." last ".$row['Registration_Date'].".')</script>";
            }
        }
        else {
            echo "<script>alert('The username or password you entered is incorrect.')</script>";
        }
    }

    // if (isset($_POST["register_submit"])) {

    // }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Livei.com</title>
        <link rel = "icon" href = "liveiLogo.png" type = "image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    </head>

<!-- START OF STYLES -->

<style type="text/css">
    :root{
        --login-width: 320px;
        --login-height: 500px;
        --paywall-width: 320px;
        --paywall-height: 500px;
        --register-width: 320px;
        --register-height: 500px;
        --header-height: 70px;
    }

    #video {
        position: fixed;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        object-fit: fill;
    }

/*======================================== Login Container ========================================*/
    .loginContainer {
        position: fixed;
        width: var(--login-width);
        height: var(--login-height);
        top: 60px;
        left: calc(100vw / 2 - calc(var(--login-width) / 2));/*
        background:  rgba(255,255,255,0.1);*/
        background-color: rgba(0, 0, 0, 0.3);
        text-align: center;
        color: white;
        font-family: "Arial Narrow", Arial, sans-serif;
        font-size: 15px;
        font-weight: normal;
        text-decoration: none;
        border-radius: 5px;
        overflow: auto;
    }

    .loginContainer img {
        padding-top: 40px;
        width: 100px;
        opacity: 0.7;
    }

    .loginContainer input {
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid;
        box-sizing: border-box;
        border-color: white;
        width: 85%;
        background: transparent;
        color: white;
        border-radius: 5px;
        font-size: 16px;
        outline: none;
    }
    .loginContainer input:focus {
        border-width: 2px;
        border-color: #668d3c;      
    }
    .loginContainer input::placeholder {
        color: white;
        opacity: 1;
    }
    .loginContainer button {
        background-color: #668d3c;
        color: white;
        padding: 12px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 85%;
        font-size: 15px;
        border-radius: 5px;
    }

    .loginContainer a {
        color: white;
        font-size: 12px;
    }

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

/*======================================== Register Container ========================================*/

    .registerContainer {
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
        height: 310px;
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

    .slash {
        transform: rotate(45deg);
            position: absolute;
            top: 18px;  
            right: calc(10% + 29px);
            border-left: 1px solid white;
            height: 25px;
        z-index: 1;
    }

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

    .show {display: block;}

/*======================================== Paywall Container ========================================*/
    .paywallContainer {
        position: fixed;
        width: var(--paywall-width);
        height: var(--paywall-height);
        top: 60px;
        border-radius: 5px;
        left: calc(100vw / 2 - calc(var(--paywall-width) / 2));
        background-color: rgba(0,0,0,0.3);
        color: white;
        font-family: "Arial Narrow", Arial, sans-serif;
        font-weight: normal;
        text-decoration: none;
    }

    .paywallContainer .header {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: var(--header-height);
    }

    .paywallContainer .header label {
        font-size: 25px;
    }

    .paywallContainer .body {
        max-height: calc(var(--paywall-height) - var(--header-height));
        overflow: auto;
    }

    .paywallContainer form div{
        position: relative;
        padding: 0 10%;
    }

    .paywallContainer form div input.input {
        position: relative;
        padding: 8px 10px;
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

    .paywallContainer form div input.input::placeholder {
        color: white;
        opacity: 0.7;
    }

    .paywallContainer form div button {
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

    .paywallContainer .payment-label {
        text-align: center;
        margin-bottom: 15px;
        padding: 0;
    }

    .paywallContainer .payment-label img {
        width: 65%;
        margin: 10px 0 15px 0;
    }

    .paywallContainer .col-left {
        padding: 0;
        width: 47%;
        float: left;
    }

    .paywallContainer .col-right {
        padding: 0;
        width: 47%;
        float: right;
    }

    .paywallContainer .price{
        font-size: 35px;
        text-align: center;
        margin: 15px 0px 30px 0px;
    }

    .paywallContainer .cards {
        text-align: center;
        margin: 15px 0;
    }
/*======================================== Close ========================================*/
    .close {
        position: absolute;
        right: 10px;
        top: 5px;
        width: 20px;
        height: 20px;
        background: transparent;
        border-style: none;
    }

    .close {
        color: rgba(255, 255, 255, 0.7);
        float: right;
        font-size: 28px;
        font-weight: normal;
    }

    .close:hover, .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
/*======================================== Back Button ========================================*/

    /*.back {
        position: fixed;
    }*/
</style>
<!-- END FOF STYLES -->

<body>
    <video id="video" muted autoplay playsinline></video>

<!-- ======================================== Login Container ======================================== -->
    <div id="loginContainer" class="loginContainer">
        <span class="close" onclick="closeContainer()">&times;</span>
        <img src="liveiLogo.png">
        <h2>Login</h2>
        <form class="loginForm" id="loginForm" action="" method="post">
            <div><input class="username" id="username" type="text" name="username" placeholder="Username"></div>
            <div>
                <input class="password" id="password" type="password" name="password" placeholder="Password">
                <a class="logineye" onclick="logineye('lp-eye')"></a>
                <a id="lp-eye" class="loginslash hide"></a>
            </div>
            <button class="btnLogin" type="submit" name="login_submit">Login</button>
        </form>
        <button class="btnRegister" onclick="showRegistration()">Register</button>
        <div><a href="" class="forgot" style="font-size: 13px;">Forgot Password?</a></div>
    </div>

<!-- ======================================== Register Container ======================================== -->
    
    <div id="registerContainer" class="registerContainer hide">
        <div class="header">
            <span class="close" onclick="closeRegister()">&times;</span>
            <label>Registration</label>
        </div>
        <div class="body" id="body">
            <form class="registerForm" id="registerForm" action="" method="post">
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
    </div>

<!-- ======================================== Paywall Container ======================================== -->

    <div id="paywallContainer" class="paywallContainer hide">
        <div class="header">
            <span class="close" onclick="closeContainer()">&times;</span>
            <label>Get Access Now!</label>
        </div>
        <div class="body" id="body">
        <form class="paywallForm" id="paywallForm" action="Authorize.net/payment2.php" method="post">
            <div class="price">
                <label>$9.99 / Month</label>
            </div>
            <div class="payment-label">
                <div>
                    <label>Payment via</label>
                </div>
                <div>
                    <img src="Authorize.net/authorize.png">
                </div>
            </div>
            <div>
                <label>Card Number</label>
                <input class="input" type="text" name="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" required>
            </div>
            <div style="height: 60px;">
                <div class="col-left">
                    <label>Card Expiry</label>
                    <input class="input" type="text" name="card_exp" placeholder="MM/YYYY" required>
                </div>
                <div class="col-right">
                    <label>CVV</label>
                    <input class="input" type="text" name="card_cvc" placeholder="123" autocomplete="off" required>
                </div>
            </div>
            <div>
                <button type="submit" name="paywall_submit">Get Access</button>
            </div>
        </form>
    </div>

<!-- ======================================== Back Button ======================================== -->
    <!-- <div class="back">
        
    </div> -->

</body>

<script type="text/javascript">

    var loginStatus = <?php echo $_SESSION['loginStatus']; ?>;
    var paid = <?php echo $_SESSION['paid']; ?>;

    if (loginStatus && paid) {
        document.getElementById('loginContainer').classList.add('hide');
        alert('Your Payment is successfull. Enjoy your training!');
        play("stream03");
    }
    else if (loginStatus) {
        document.getElementById('loginContainer').classList.add('hide');
        document.getElementById('paywallContainer').classList.remove('hide');
        play('stream01');
    }
    else {
        play('stream01');
    }

    function play(videoId) {
        var video = document.getElementById('video');
        if (Hls.isSupported()) {
            var hls = new Hls();
            hls.loadSource('http://165.227.7.5:8080/hls/'+videoId+'/.m3u8');
            hls.attachMedia(video);
            hls.on(Hls.Events.MANIFEST_PARSED, function() {
                video.play();
            });
        }
        else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            video.src = 'http://165.227.7.5:8080/hls/'+videoId+'.m3u8';
            video.addEventListener('loadedmetadata', function() {
                video.play();
            });
        }
    }

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

    function closeContainer() {
        document.getElementById('loginContainer').classList.add('hide');
        document.getElementById('paywallContainer').classList.add('hide');

        location.href = 'http://livei.com';
    }

    function showRegistration() {
        document.getElementById('loginContainer').classList.add('hide');
        document.getElementById('registerContainer').classList.remove('hide');
    }

    // ======================================== Registration Functions ========================================

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

    function closeRegister() {
        document.getElementById('registerContainer').classList.add('hide');
        document.getElementById('loginContainer').classList.remove('hide');
    }
</script>