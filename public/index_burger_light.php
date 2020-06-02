<?php
	include 'checkvisitor.php';
//	include 'info.php';
	session_start();

	if($_SESSION["loginStatus"]==NULL){
		$loginStatus = 0;
	}
	else{
		$loginStatus = $_SESSION["loginStatus"];
		$firstname = $_SESSION["firstname"];
		$date = $_SESSION["membersince"];
		if ($_SESSION["alerstatus"]!=NULL){
			//echo "<script>alert('Nut Null.');";
		}
		else{
			//echo "<script>alert('Null');";
		}
	}
	//$loginStatus = (isset($_SESSION["loginStatus"]))?$_SESSION["loginStatus"]:0;
	//$firstname = $_SESSION["firstname"];

?>
<!DOCTYPE html>
<html>
        <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Livei</title>
                <link rel = "icon" href = "liveiLogo.png" type = "image/x-icon">
                <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
        </head>

<!-- START OF STYLES -->


<style type="text/css">
					body{
						color: white;
					}
                	#registerContainer{
						display: none;
					}
</style>	
<style type="text/css">
                	#userLogo {
                		position: absolute;
                		top: -8px;
				border-radius: 50%;
				width: 31px; 
				height:31px;
				border: 3px solid #39ff14;
                	}
</style>	
<style type="text/css">
            	.QRContainer {
					display: none;
					position: fixed;
					width: 320px;
					height: 500px;
					top: 60px;
					left: calc(100vw / 2 - calc(320px / 2));/*
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

				.close {
					position: fixed;
					right: 10px;
					top: 5px;
					width: 20px;
					height: 20px;
					background: transparent;
					border-style: none;
				}

				.close {
					color: #aaa;
					float: right;
					font-size: 28px;
					font-weight: ;
				}

				.close:hover, .close:focus {
					color: black;
					text-decoration: none;
					cursor: pointer;
				}

				.QRContainer img {
					width: 250px;
					padding-top: calc(calc(500px - 250px) / 2);
				}
</style>
<style type="text/css">
	.loginContainer {
		display: none;
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
		color: white;
		float: right;
		font-size: 28px;
		font-weight: ;
	}

	.close:hover, .close:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
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
	.loginContainer button.btnLogin, .loginContainer button.btnRegister{
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
	#btnRegister{
		background-color: #404f24;
	}

        font-size: 16px;
	}
	.loginContainer a {
		color: white;
        font-size: 12px;
	}
</style>
<style type="text/css">
    :root {
        --crawler-height: 35px;
        --logo-time-width: 125px;
        --text-width: calc(100vw - 127px);
    }

    .disabled {
    	color: rgba(127,127,127,0.5);
    	cursor: context-menu;
    }



        #video {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            object-fit: fill;
        }
        .dropdown {
            position: fixed;
            width: 40px;
            height: 40px;
            top: 9px;
            left: 9px;
            border-radius: 50%;
        }
        .dropdown:hover, .dropdown-content a:hover {
                background-color: rgba(255,255,255,0.1);
            cursor: context-menu;
        }

        .cameras-content a:hover, .downloads-content a:hover, .services-content a:hover, .accounts-content a:hover, .contact-content a:hover {
            background-color: rgba(125,125,125,0.3);
            cursor: context-menu;
        }

        .dropdown-content {
                display: none;
                position: fixed;
                background-color: transparent;
                min-width: 131px;
                top: 49px;
                left: 5px;
        }

        .dropdown-content a {
                float: none;
                color: white;
                padding: 10px 12px;
                font-family: "Arial Narrow", Arial, sans-serif;
                font-size: 15px;
                font-weight: normal;
                text-decoration: none;
                display: block;
                text-align: left;
                border-style: solid none none none;
                border-width: 0.5px;
                border-color: white;
        }

	#stream01, #accounts {
                border-style: none none none none;
        }

	.accounts-content {
                display: none;
                position: fixed;
                background-color: rgba(255,255,255,0.1);
                min-width: 100px;
                top: 49px;
                left: 136px;
        }

        .accounts-content a {
                float: none;
                color: white;
                padding: 10px 12px;
                font-family: "Arial Narrow", Arial, sans-serif;
                font-size: 15px;
                font-weight: normal;
                text-decoration: none;
                display: block;
                text-align: left;
        }

        .cameras-content {
                display: none;
                position: fixed;
                background-color: rgba(255,255,255,0.1);
                min-width: 100px;
                top: 89px;
                left: 136px;
        }

        .cameras-content a {
                float: none;
                color: white;
                padding: 10px 12px;
                font-family: "Arial Narrow", Arial, sans-serif;
                font-size: 15px;
                font-weight: normal;
                text-decoration: none;
                display: block;
                text-align: left;
        }
        .contact-content {
                display: none;
                position: fixed;
                background-color: rgba(255,255,255,0.1);
                min-width: 100px;
                top: 128px;
                left: 136px;
        }

        .contact-content a {
                float: none;
                color: white;
                padding: 10px 12px;
                font-family: "Arial Narrow", Arial, sans-serif;
                font-size: 15px;
                font-weight: normal;
                text-decoration: none;
                display: block;
                text-align: left;
        }
        .downloads-content {
                display: none;
                position: fixed;
                background-color: rgba(255,255,255,0.1);
                min-width: 100px;
                top: 168px;
                left: 136px;
        }

        .downloads-content a {
                float: none;
                color: white;
                padding: 10px 12px;
                font-family: "Arial Narrow", Arial, sans-serif;
                font-size: 15px;
                font-weight: normal;
                text-decoration: none;
                display: block;
                text-align: left;
        }
        .services-content {
                display: none;
                position: fixed;
                background-color: rgba(255,255,255,0.1);
                min-width: 100px;
                top: 207px;
                left: 136px;
        }

        .services-content a {
                float: none;
                color: white;
                padding: 10px 12px;
                font-family: "Arial Narrow", Arial, sans-serif;
                font-size: 15px;
                font-weight: normal;
                text-decoration: none;
                display: block;
                text-align: left;
        }

        .dropdown:hover{
        	cursor: pointer;
        }

        .dropdown-content a:hover{
        	cursor: pointer;
        }

        .cameras-content a:hover{
        	cursor: pointer;
        }

        .contact-content a:hover{
        	cursor: pointer;
        }

        .downloads-content a:hover{
        	cursor: pointer;
        }

        .services-content a:hover{
        	cursor: pointer;
        }


    /* Show the dropdown menu on click */
        .show {display: block;}
        .hide {display: none;pointer-events: none;}
        .highlight {background-color: rgba(255,255,255,0.1);}
        .unhighlight {background-color: transparent;}

        .livePointer {
            display: none;
            position: fixed;
            left: 215px;
            height: 10px;
            width: 10px;
            background-color: #39ff14;
            border-radius: 50%;
            cursor: context-menu;
        }

        .stream01 {
            display: block;
            top: 63px;
            left: 118px;
        }

        .stream02 {
            display: block;
            top: 104px;
        }

        .stream03 {
            display: block;
            top: 143px;
        }

        .breadcrumbs {
            position: fixed;
            top: 11px;
            left: 53px;
        }

        #location1, #home , #account{
        	cursor: pointer;
        }

        #home, #account, #location1, #location2 {
        	top: 10px;
        }

        .arrow0, .arrow1, .arrow2 {
        	margin-top: 0;
        	margin-bottom: 0;
        	top: 9px;
        }

        .arrow0 {
        		display: inline-block;
                position: relative;
                border: solid white;
                border-width: 0 3px 3px 0;
                padding: 3px;
                transform: rotate(-45deg);
                margin-left: 5px;
                margin-right: 5px;
        }

        .arrow1 {
        		display: inline-block;
                position: relative;
                border: solid white;
                border-width: 0 3px 3px 0;
                padding: 3px;
                transform: rotate(-45deg);
                margin-left: 5px;
                margin-right: 5px;
        }
        .arrow2 {
        		display: inline-block;
                position: relative;
                border: solid white;
                border-width: 0 3px 3px 0;
                padding: 3px;
                transform: rotate(-45deg);
                margin-left: 5px;
                margin-right: 5px;
        }
        .hideArrow {
        		border-color: transparent;
        }

        .showArrow {
        		border-color: white;
        }

        .breadcrumbs a {
                position: relative;
                color: white;
                font-family: "Arial Narrow", Arial, sans-serif;
                font-size: 15px;
                font-weight: normal; text-decoration: none;
                top: -15px;
                cursor: context-menu;
        }

    
    .crawler {
        position: fixed;
        bottom: 0px;
        width: 100vw;
        right: 0px;
        height: var(--crawler-height);
        background-color: rgba(0,0,0,0.3);
        color: white;
    }
    #logo {
        position: relative;
        width: calc(var(--crawler-height) * 0.71);
        opacity: 0.7;
	top: 3px;
    }
    #time {
        position: fixed;
        font-family: "Arial Narrow", Arial, sans-serif;
        font-size: calc(var(--crawler-height) * 0.43);
        font-weight: normal;
        bottom: calc(var(--crawler-height) - 4px);
        left: 5px;
        color: white;
        font-size: 15px;
    }
    #text {
        position: absolute;
        font-family: "Arial Narrow", Arial, sans-serif;
        font-size: calc(var(--crawler-height) * 0.55);
        font-weight: normal;
        cursor: context-menu;
        height: var(--crawler-height) - 10px;
        vertical-align: middle;
        display: table-cell;
        top: 2px;
    }

    #text label{
        font-weight: normal;
    }

.close {
	position: fixed;
	top: calc(60px + 10px);
	right: calc(calc(100vw / 2 - calc(var(--register-width) / 2)) + 18px);
	color: white;
	opacity: 1;
	text-decoration: none;
}
</style>
<!-- END FOF STYLES -->

<body onload="playVideo('stream01')">
                <video id="video" muted autoplay playsinline></video>

                <img id="dropdown" class="dropdown" src="burgerIcon.png" onclick="showContent(this.id)">

                <div class="breadcrumbs">
                	<?php 
                		if ($loginStatus) {
                			echo "
            			<a onclick='clickBreadcrumbs(this.id)' id='account'><img src='".$_SESSION["profilepicture"]."' id='userLogo'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hi! ".$firstname."</a>
                        <p id='arrow0' class='arrow0'></p>
                        ";
                		}
                	?>
 
                        <a onclick="clickBreadcrumbs(this.id)" id="home">HomeCam4K</a>
                        <p id="arrow1" class="arrow1"></p>
                        <a onclick="clickBreadcrumbs(this.id)" id="location1"></a>
                        <p id="arrow2" class="arrow2"></p>
                        <a onclick="clickBreadcrumbs(this.id)" id="location2"></a>
                </div>
                

                <script type="text/javascript">
                	function clickBreadcrumbs(argument) {
                		var text = document.getElementById(argument).textContent;

                		if(text == "HomeCam4K") {
            				showContent("dropdown");
                		}

                		else if (text == "Cameras") {
            				showContent("dropdown");
            				showContent("cameras");
            				cameras = true;
                		}

                		else if (text == "Contact") {
            				showContent("dropdown");
            				showContent("contact");
            				contact = true;
                		}

                		else if (text == "Downloads") {
            				showContent("dropdown");
            				showContent("downloads");
            				downloads = true;
                		}

                		else if (text == "Services") {
            				showContent("dropdown");
            				showContent("services");
            				services = true;
                		}
                	}
                </script>

                <div id="dropdown-content" class="dropdown-content">
			<?php 
                        	if ($loginStatus) {
                        		echo "<a id='accounts' class='accounts' onclick='displayShipping()'>My Dashboard</a>";
                        	}
                        	else {
                        		echo "<a id='stream01' onclick='playVideo(this.id)'>HomeCam4K&nbsp;&nbsp;&nbsp;&nbsp;</a>";
                        	}
                        ?>
                        <a id="cameras" class="cameras" onclick="showContent(this.id)">Cameras</a>
                        <a id="contact" class="contact" onclick="showContent(this.id)">Contact</a>
                        <a id="downloads" class="downloads" onclick="showContent(this.id)">Downloads</a>
                        <a id="services" class="services" onclick="showContent(this.id)">Services</a>
                        <a id="login" class="login" onclick="displayLogin()">
                        	<?php 
                        		if ($loginStatus) {
                       			echo "Logout";
                        		}
                        		else {
                        			echo "Login";
                        		}
                        	?>
                        </a>
                </div>

                <div id="accounts-content" class="accounts-content">
                    <a id="profile" onclick="showAccounts(this.id)">Profile</a>
                    <a id="shipping" onclick="showAccounts(this.id)">Shipping</a>
                    <a id="payment" onclick="showAccounts(this.id)">Payment Methods</a>
                </div>

		<div id="cameras-content" class="cameras-content">
                        <a id="stream02" onclick="playVideo(this.id)">Software</a>
                        <a id="stream03" onclick="playVideo(this.id)">Training</a>
                </div>

                <div id="contact-content" class="contact-content">
                        <a id="fbMessenger" onclick="displayQRCode(this.id)">FB Messenger</a>
                </div>

                <div id="downloads-content" class="downloads-content">
                        <a href="Raspbian+Full+with+LEMP.zip">Raspbian Full with LEMP (3.21GB)</a>
                </div>
                <div id="services-content" class="services-content">
                        <a>RasPi 4 HTTP server setup $10/hr</a>
                </div>

                <div id="livePointer" class="livePointer"></div>


                <a id="time"></a>

    <div class="crawler">
                <marquee id="text" scrollamount="4" behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                   	<?php

                                if ($loginStatus) {
                                        echo "
					<img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome ".$firstname."! Thank you, for being a part of Livei.com community since ".$date."&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.</label>&nbsp;&nbsp;&nbsp;&nbsp;
					";

                                }
                                else {
                                        echo "
					<img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <img id='logo' src='liveiLogo.png'><label>&nbsp;&nbsp;&nbsp;&nbsp;Livei.com is open 24/7&nbsp;&nbsp;&nbsp;&nbsp;</label><img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Login or Register, Now!&nbsp;&nbsp;&nbsp;&nbsp;<img id='logo' src='liveiLogo.png'>&nbsp;&nbsp;&nbsp;&nbsp;Free! Free! Free! Putty training. Learn how to remote login to your Raspberry Pi. Talk with one of our Linux experts to schedule your training now.&nbsp;&nbsp;&nbsp;&nbsp;</label>
					";
                                }
                        ?>
                </marquee>
            </div>


            <div class="QRContainer" id="QRContainer">
            	<span class="close" onclick="hideQRCode()">&times;</span>
            	<img id="QRCodeImage" id="QRCodeImage" src="fbMessenger.png">
            </div>

            <div class="loginContainer" id="loginContainer">
            	<?php include 'login.php';?>
            </div>

            <div class="registerContainer" id="registerContainer">
            	<?php include 'register.php';?>
            </div>

					<!-- FOR ACCOUNT CONTAINER -->
            <style>
                .accountContainer {
        	    display: none;
        	    position: fixed;
        	    width: 320px;
        	    height: 500px;
        	    top: 60px;
        	    left: calc(100vw / 2 - calc(var(--account-width) / 2));
        	    background-color: rgba(0, 0, 0, 0.3);
        	}
            </style>
            <div id="accountContainer" class="accountContainer">
            	<?php include 'account.php';?>
            </div>
            <script>
                function displayAccount() {
                        document.getElementById("accountContainer").style.display = "block";
                }
                function hideAccount() {
                        document.getElementById("accountContainer").style.display = "none";
                }
            </script>
                                <!-- END FOR ACCOUNT CONTAINER -->
				<!-- FOR EDIT ACCOUNT CONTAINER -->
            <style>
                #editAccountContainer{
                display: none;
                position: relative;
                border-radius: 5px;
                margin-top: 60px;
                width: 320px;
                margin-left: auto;
                margin-right: auto;
                background-color: rgba(0, 0, 0, 0.3);
                font-family: Arial;
                color: white;
                
            }
            </style>
            <div id="editAccountContainer">
            	<?php include 'editaccount.php';?>
            </div>
            <script>
                function displayEditAccount() {
                        document.getElementById("editAccountContainer").style.display = "block";
                        document.getElementById("accountContainer").style.display = "none";
                }
                function hideEditAccount() {
                        document.getElementById("editAccountContainer").style.display = "none";
                }
            </script>
                                <!-- END FOR EDIT ACCOUNT CONTAINER -->

								<!-- START OF SHIPPING CONTAINER -->
			<style>
                #shippingContainer{
                display: none;
                position: relative;
                border-radius: 5px;
                margin-top: 60px;
                width: 320px;
                margin-left: auto;
                margin-right: auto;
                background-color: rgba(0, 0, 0, 0.3);
                font-family: Arial;
                color: white;
                
            }
            </style>
			
            <div id="shippingContainer">
            	<?php include 'shipping.php';?>
            </div>
            <script>
                function displayShipping() {
                        document.getElementById("dashboardContainer").style.display = "block";
                        //document.getElementById("shippingContainer").style.display = "none";
                }
                function hideShipping() {
                        document.getElementById("dashboardContainer").style.display = "none";
                }
				
            </script>
								
								<!-- END FOF SHIPPING CONTAINER -->
								
								<!-- START FOF ALERT CONTAINER -->
            <style>
                #alertContainer{
                    display: none;
                    position: relative;
                    border-radius: 5px;
                    margin-top: 0px;
                    margin-left: auto;
                    margin-right: auto;
                    font-family: Arial;
                    color: white;
            }
            </style>
            
            <div id="alertContainer">	
                <?php include 'alert.php';?>
            </div>
            <script>
                function displayAlert() {
                        document.getElementById("alertContainer").style.display = "block";
                        
                }
                function hideAlert() {
                        document.getElementById("alertContainer").style.display = "none";
						<?php $_SESSION["alerstatus"]==NULL; ?>
                }
            </script>
                                
                                <!-- END FOF ALERT CONTAINER -->
								<!-- START FOF DASHBOARD CONTAINER -->
            
            <div id="dashboardContainer">	
                <?php include 'dashboard.php';?>
            </div>
 
								<!-- END FOF DASHBOARD CONTAINER -->
        </body>
</html>

<style type="text/css">
	:root{
		--login-width: 320px;
		--login-height: 500px;
		--register-width: 320px;
		--register-height: 500px;
	}
	.accountContainer {
                display: none;
                position: fixed;
                width: var(--register-width);
                height: var(--register-height);
                top: 60px;
                left: calc(100vw / 2 - calc(var(--register-width) / 2));/*
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

	.registerContainer {
		display: none;
		position: fixed;
		width: var(--register-width);
		height: var(--register-height);
		top: 60px;
		left: calc(100vw / 2 - calc(var(--register-width) / 2));
    	background-color: rgba(0, 0, 0, 0.3);
	}
</style>



<script type="text/javascript">
    var dropdown = accounts = cameras = downloads = services = contact = false;
    var live = "stream01";
    var loginStatus = <?php echo $loginStatus; ?>;


    if (!loginStatus) {
    	document.getElementById("cameras").style.opacity = "0.6";
    	document.getElementById("contact").style.opacity = "0.6";
    	document.getElementById("downloads").style.opacity = "0.6";
    	document.getElementById("cameras").style.cursor = "context-menu";
    	document.getElementById("contact").style.cursor = "context-menu";
    	document.getElementById("downloads").style.cursor = "context-menu";
    	document.getElementById("cameras").onmouseover = function() {
    		document.getElementById("cameras").style.backgroundColor = "transparent";
    	};
    	document.getElementById("contact").onmouseover = function() {
    		document.getElementById("contact").style.backgroundColor = "transparent";
    	};
    	document.getElementById("downloads").onmouseover = function() {
    		document.getElementById("downloads").style.backgroundColor = "transparent";
    	};
    }
    else {
    	document.getElementById("cameras").style.color = "white";
    	document.getElementById("contact").style.color = "white";
    	document.getElementById("downloads").style.color = "white";
    	document.getElementById("cameras").style.cursor = "pointer";
    	document.getElementById("contact").style.cursor = "pointer";
    	document.getElementById("downloads").style.cursor = "pointer";
    }

    
	function displayQRCode(toDisplay) {
		if(toDisplay == "fbMessenger") {
	    	document.getElementById("location2").innerHTML = "FB Messenger";
	    	document.getElementById("arrow2").classList.remove("hideArrow");
	    	document.getElementById("arrow2").classList.add("showArrow");
	    	document.getElementById("location1").innerHTML = "Contact";
	    	document.getElementById("arrow1").classList.remove("hideArrow");
	    	document.getElementById("arrow1").classList.add("showArrow");

	    	document.getElementById("QRContainer").classList.remove("hide");
	        document.getElementById("QRContainer").classList.add("show");
		}
	}

	function hideQRCode() { 
		document.getElementById("QRContainer").classList.remove("show");
        document.getElementById("QRContainer").classList.add("hide");
        document.getElementById("arrow1").classList.remove("showArrow");
        document.getElementById("arrow1").classList.add("hideArrow");
        document.getElementById("location1").innerHTML = "";
        document.getElementById("arrow2").classList.remove("showArrow");
        document.getElementById("arrow2").classList.add("hideArrow");
        document.getElementById("location2").innerHTML = "";
	}

    function displayLogin() {
    	if (loginStatus) {
    		location.href = "logout.php";
    	}
    	else {
    		document.getElementById("arrow2").classList.remove("showArrow");
	    	document.getElementById("arrow2").classList.add("hideArrow");
	    	document.getElementById("location2").innerHTML = "";
	    	document.getElementById("location1").innerHTML = "Login";
	    	document.getElementById("arrow1").classList.remove("hideArrow");
	    	document.getElementById("arrow1").classList.add("showArrow");

	    	document.getElementById("loginContainer").classList.remove("hide");
	        document.getElementById("loginContainer").classList.add("show");
    	}
    }
    function hideLogin() {
    	document.getElementById("loginContainer").classList.remove("show");
        document.getElementById("loginContainer").classList.add("hide");
        document.getElementById("arrow1").classList.remove("showArrow");
        document.getElementById("arrow1").classList.add("hideArrow");
        document.getElementById("location1").innerHTML = "";

    }

    function displayRegister() {
		document.getElementById("registerContainer").style.display = "block";
    	hideLogin();
    	document.getElementById("location1").innerHTML = "Register";
    	document.getElementById("registerContainer").classList.remove("hide");
        document.getElementById("registerContainer").classList.add("show");
        document.getElementById("arrow1").classList.remove("hideArrow");
        document.getElementById("arrow1").classList.add("showArrow");

    }
    function hideRegister() {
		document.getElementById("registerContainer").style.display = "none";
    	document.getElementById("registerContainer").classList.remove("show");
        document.getElementById("registerContainer").classList.add("hide");
        document.getElementById("arrow1").classList.remove("showArrow");
        document.getElementById("arrow1").classList.add("hideArrow");
        document.getElementById("location1").innerHTML = "";

    }

    function showAccounts(id) {
	if (id == "profile") {
	    displayAccount();
	}
	else if (id == "shipping") {
            displayShipping();
	}
	else {
            
	}
    }

    function formatAMPM() {
        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
        seconds = seconds < 10 ? '0'+seconds : seconds;
        var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

        document.getElementById('time').innerHTML = strTime;
        var t = setTimeout(formatAMPM, 500);
    }

        function showContent(contentId) {
                if (contentId == "dropdown") {
                        if (dropdown) {
                                hideContent("dropdown");
                                if(loginStatus) hideContent("accounts");
                                hideContent("cameras");
                                hideContent("contact");
                                hideContent("downloads");
                                hideContent("services");
                                dropdown = accounts = cameras = downloads = services = contact = false;
                        }
                        else {	
                        	hideQRCode();
				hideAccount();
				hideEditAccount();
                        	hideLogin();
                       		hideRegister();
                                displayContent(contentId);
                                dropdown = true;
                        }
                }
		else if (contentId == "accounts") {
                    if(loginStatus) {
                        if (accounts) {
                                if(loginStatus) hideContent("accounts");
                                accounts = false;
                        }
                        else if (cameras) {
                                hideContent("cameras");
                                displayContent("accounts");
                                cameras = false;
                                accounts = true;
                        }
                        else if (downloads) {
                                hideContent("downloads");
                                displayContent("accounts");
                                downloads = false;
                                accounts = true;
                        }
                        else if (contact) {
                                hideContent("contact");
                                displayContent("accounts");
                                contact = false;
                                accounts = true;
                        }
                        else if (services) {
                                hideContent("services");
                                displayContent("accounts");
                                services = false;
                                accounts = true;
                        }
                        else {
                                displayContent("accounts");
                                accounts = true;
                        }
                    }
                }
                else if (contentId == "cameras") {
                	if(loginStatus) {
        				if (cameras) {
                                hideContent("cameras");
                                cameras = false;
                        }
			else if (accounts) {
                                if(loginStatus) hideContent("accounts");
                                displayContent("cameras");
                                accounts = false;
                                cameras = true;
                        }
                        else if (downloads) {
                                hideContent("downloads");
                                displayContent("cameras");
                                downloads = false;
                                cameras = true;
                        }
                        else if (contact) {
                                hideContent("contact");
                                displayContent("cameras");
                                contact = false;
                                cameras = true;
                        }
                        else if (services) {
                                hideContent("services");
                                displayContent("cameras");
                                services = false;
                                cameras = true;
                        }
                        else {
                                displayContent("cameras");
                                cameras = true;
                        }
			    	}
			    	// else {
			    	// 	displayLogin();
			    	// }
                 }
                 else if (contentId == "contact") {
                 	if(loginStatus) {
        				if (contact) {
                                hideContent("contact");
                                contact = false;
                        }
                        else if (accounts) {
                                if(loginStatus) hideContent("accounts");
                                displayContent("contact");
                                accounts = false;
                                contact = true;
                        }
                        else if (downloads) {
                                hideContent("downloads");
                                displayContent("contact");
                                downloads = false;
                                contact = true;
                        }
                        else if (cameras) {
                                hideContent("cameras");
                                displayContent("contact");
                                cameras = false;
                                contact = true;
                        }
                        else if (services) {
                                hideContent("services");
                                displayContent("contact");
                                services = false;
                                contact = true;
                        }
                        else {
                                displayContent("contact");
                                contact = true;
                        }
			    	}
			    	// else {
			    	// 	displayLogin();
			    	// }
                 }
                else if (contentId == "downloads") {
                	if(loginStatus) {
        				if (downloads) {
                                hideContent("downloads");
                                downloads = false;
                        }
			else if (accounts) {
                                if(loginStatus) hideContent("accounts");
                                displayContent("downloads");
                                accounts = false;
                                downloads = true;
                        }
                        else if (cameras) {
                                hideContent("cameras");
                                displayContent("downloads");
                                cameras = false;
                                downloads = true;
                        }
                        else if (contact) {
                                hideContent("contact");
                                displayContent("downloads");
                                contact = false;
                                downloads = true;
                        }
                        else if (services) {
                                hideContent("services");
                                displayContent("downloads");
                                services = false;
                                downloads = true;
                        }
                        else {
                                displayContent("downloads");
                                downloads = true;
                        }
			    	}
			    	// else {
			    	// 	displayLogin();
			    	// }
                }
                else if (contentId == "services") {
                        if (services) {
                                hideContent("services");
                                services = false;
                        }
                        else if (accounts) {
                                if(loginStatus) hideContent("accounts");
                                displayContent("services");
                                accounts = false;
                                services = true;
                        }
                        else if (downloads) {
                                hideContent("downloads");
                                displayContent("services");
                                downloads = false;
                                services = true;
                        }
                        else if (contact) {
                                hideContent("contact");
                                displayContent("services");
                                contact = false;
                                services = true;
                        }
                        else if (cameras) {
                                hideContent("cameras");
                                displayContent("services");
                                cameras = false;
                                services = true;
                        }
                        else {
                                displayContent("services");
                                services = true;
                        }
                }
        }

        function displayContent(contentId) {
                document.getElementById(contentId + "-content").classList.remove("hide");
                document.getElementById(contentId + "-content").classList.add("show");
                document.getElementById(contentId).classList.remove("unhighlight");
                document.getElementById(contentId).classList.add("highlight");

                if (live == "stream01") {
                    displayPointer();
                }

                if (contentId == "cameras") {
			    	document.getElementById("arrow1").classList.remove("hideArrow");
			    	document.getElementById("arrow1").classList.add("showArrow");
                    document.getElementById("location2").innerHTML = "";
                    document.getElementById("location1").innerHTML = "Cameras";
                    displayPointer();
			    	document.getElementById("arrow2").classList.remove("hideArrow");
			    	document.getElementById("arrow2").classList.add("showArrow");
                    if(live == "stream01") {

                    }
                    else if(live == "stream02") {
                            document.getElementById("location2").innerHTML = "Software";
                    }
                    else if(live == "stream03") {
                            document.getElementById("location2").innerHTML = "Training";
                    }
                }
                else if (contentId == "contact") {
			    	document.getElementById("arrow1").classList.remove("hideArrow");
			    	document.getElementById("arrow1").classList.add("showArrow");
                    document.getElementById("location1").innerHTML = "Contact";
			    	document.getElementById("arrow2").classList.remove("hideArrow");
			    	document.getElementById("arrow2").classList.add("showArrow");
                    document.getElementById("location2").innerHTML = "FB Messenger";
                }
                else if (contentId == "downloads") {
			    	document.getElementById("arrow1").classList.remove("hideArrow");
			    	document.getElementById("arrow1").classList.add("showArrow");
                    document.getElementById("location1").innerHTML = "Downloads";
			    	document.getElementById("arrow2").classList.remove("hideArrow");
			    	document.getElementById("arrow2").classList.add("showArrow");
                    document.getElementById("location2").innerHTML = "Raspbian Full with LEMP (3.21GB)";
                }
                else if (contentId == "services") {
			    	document.getElementById("arrow1").classList.remove("hideArrow");
			    	document.getElementById("arrow1").classList.add("showArrow");
                    document.getElementById("location1").innerHTML = "Services";
			    	document.getElementById("arrow2").classList.remove("hideArrow");
			    	document.getElementById("arrow2").classList.add("showArrow");
                    document.getElementById("location2").innerHTML = "RasPi 4 HTTP server setup $10/hr";
                }
        }

        function hideContent(contentId) {
                document.getElementById(contentId + "-content").classList.remove("show");
                document.getElementById(contentId + "-content").classList.add("hide");
                document.getElementById(contentId).classList.remove("highlight");
                document.getElementById(contentId).classList.add("unhighlight");
                if(contentId == "cameras"){
                    hidePointer();
                }
        }

        function displayPointer() {
            if(live == "stream01"){
                document.getElementById("livePointer").classList.remove("stream03");
                document.getElementById("livePointer").classList.remove("stream02");
                document.getElementById("livePointer").classList.add("hide");
            }
            else if(live == "stream02"){
                document.getElementById("livePointer").classList.remove("hide");
                document.getElementById("livePointer").classList.remove("stream03");
                document.getElementById("livePointer").classList.add("stream02");
            }
            else if(live == "stream03"){
                document.getElementById("livePointer").classList.remove("hide");
                document.getElementById("livePointer").classList.remove("stream02");
                document.getElementById("livePointer").classList.add("stream03");
            }
        }

        function hidePointer() {
                document.getElementById("livePointer").classList.remove("stream01");
                document.getElementById("livePointer").classList.remove("stream02");
                document.getElementById("livePointer").classList.remove("stream03");
                document.getElementById("livePointer").classList.add("hide");
        }

        window.onclick = function(event) {
		if(!event.target.matches('.dropdown') && !event.target.matches('.cameras') && !event.target.matches('.contact') && !event.target.matches('.downloads') && !event.target.matches('.services') && !event.target.matches('#home') && !event.target.matches('#location1') && !event.target.matches('#location2')) {
			hideContent("dropdown");
	                hideContent("cameras");
	                hideContent("contact");
	                hideContent("downloads");
	                hideContent("services");
			if(loginStatus) hideContent("accounts");
	                hidePointer();
	                dropdown = accounts = cameras = downloads = services = contact = false;
		}
        }

        // HLS Video Player
        function playVideo(videoId) {
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

                live = videoId;
                if(live == "stream01") {
				    	document.getElementById("arrow2").classList.remove("showArrow");
				    	document.getElementById("arrow2").classList.add("hideArrow");
				    	document.getElementById("arrow1").classList.remove("showArrow");
				    	document.getElementById("arrow1").classList.add("hideArrow");
                        document.getElementById("location2").innerHTML = "";
                        document.getElementById("location1").innerHTML = "";
                }
                else if(live == "stream02") {
				    	document.getElementById("arrow2").classList.remove("hideArrow");
				    	document.getElementById("arrow2").classList.add("showArrow");
                        document.getElementById("location2").innerHTML = "Software";
                }
                else if(live == "stream03") {
				    	document.getElementById("arrow2").classList.remove("hideArrow");
				    	document.getElementById("arrow2").classList.add("showArrow");
                        document.getElementById("location2").innerHTML = "Training";
                }
                formatAMPM();
        }
</script>





