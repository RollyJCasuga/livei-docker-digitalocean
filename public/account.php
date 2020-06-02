<!DOCTYPE html>
<html>
<head>
        <title> </title>
</head>
<style type="text/css">
        :root{
            --account-width: 320px;
            --account-height: 500px;
            --header-height: 70px;
            --icon: 30px;
        }

        .accountContainer .header {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: "Arial Narrow", Arial, sans-serif;
            font-weight: normal;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            height: var(--header-height);
			
        }

        .accountContainer .header span {
            position: absolute;
            right: 10px;
            color: white;
            font-size: 28px;
            font-weight: bold;
            top: 3px;
        }

        .accountContainer .header label {
            font-size: 30px;
        }

        .accountContainer .body {
            max-height: calc(var(--account-height) - var(--header-height));
            overflow: auto;
        }

        .accountContainer form div {
            position: relative;
            padding: 0 10%;
			text-align: left;
        }

        .accountContainer form div input.input {
            position: relative;
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid;
            box-sizing: border-box;
            border-color: white;
            background: white;
            color: black;
            font-size: 16px;
            border-radius: 5px;
            outline: none;
        }

        .accountContainer form div label.label {
            color: white;
            padding-left: 6px;
            font-family: "Arial Narrow", Arial, sans-serif;
            font-weight: normal;
            text-decoration: none;
            font-size: 15px;
        }

        .accountContainer form div.img {
            text-align: center
        }

        .accountContainer form div.img img {
            height: 110px;
            width: 110px;
            border-radius: 50%;
        }

        .accountContainer form div.username {
            color: white;
            font-size: 20px;
            padding-bottom: 10px;
            text-align: center;
        }

        .accountContainer form div button {
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

        .hide {display: none;}

        .camera{
            display: block;
            width: calc(var(--icon) * .7);
            height: calc(var(--icon) * .5);
            position: absolute;
            top: calc(var(--icon) * .3);
            left: calc(var(--icon) * .15);
            background-color: gray;
            border-radius: calc(var(--icon) * .0667);
        }

        .camera:after{
            content: "";
            display: block;
            width: calc(var(--icon) * .2);
            height: calc(var(--icon) * .2);
            border: calc(var(--icon) * 0.0933) solid #fff;
            position: absolute;
            top: calc(var(--icon) * .5 * .1);
            left: calc(var(--icon) * .7 * .25);
            background-color: gray;
            border-radius: calc(var(--icon) * .2);
        }

        .camera:before{
            content: "";
            display: block;
            width: calc(var(--icon) * .7 * .5);
            height: calc(var(--icon) * .1333);
            position: absolute;
            top: calc(var(--icon) * .5 * -0.16);
            left: calc(var(--icon) * .7 * .25);
            background-color: gray;
            border-radius: calc(var(--icon) * .1333);
        }

        .icon{
            width: var(--icon);
            height: var(--icon);
            position: absolute;
            bottom: 2px;
            right: calc(50% - 55px);
            opacity: 0.8;
            background: white;
            border-radius: 50%;
        }

        .upload[type="file"] {
            position: absolute;
            opacity: 0;
            right: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            border-radius: 50%;
        }
		.creditcard-img{
			width: 50px;
			height: 30px;
			margin-right: 10px;
		}
		#creditcard-img{
			padding-top: 10px;
			display: flex;
		
		}
		#delivery-img{
			margin-top: 10px;
			padding-top: 0px;
			display: flex;
		}
		.delivery-img{
			width: 50px;
			height: 30px;
			margin-right: 10px;
		}
		#delivery-label{
			padding: 0px;
			margin: 0px;
			margin-top: 30px;
		}
		#btn-save{
			margin-top: 30px;
		}
		#creditcard{
			padding: 0px;
			display: flex;
			margin: 0px;
			margin-top: 10px;
			margin-left: 32px;

		}
		#creditcard .creditcard{
			width: 42%;
			margin-right: 10px;
			padding-left: 0px;
			text-align: left;
		}
		#postalcode{
			text-align: center;
		}
		
		
    </style>
<body>
        <div class="header">
            <span class="close" onclick="hideAccount()">&times;</span>
            <label id="title">My Account</label>
        </div>
        <div class="body" id="body">
            <form class="accountForm" id="accountForm" action="updatedashboard.php" method="post" enctype="multipart/form-data">
                <div class="img">
                    <img id="image" src="<?php echo $_SESSION["profilepicture"]?>">
                    <span id="icon" class="icon">
                        <input id="upload" class="upload" name="image" type="file" onchange="displayPhoto()">
                        <a class="camera"></a>
                    </span>
                </div>
				<div class="username">
                    <label><?php echo $_SESSION["username"]?></label class="label">
                </div>
				<div>
                    <h3>Profile</h3>
                </div>
                <div>
                    <label class="label">Member Since:</label>
                    <input class="input" type="text" value="<?php echo $_SESSION["membersince"]?>" readonly>
                </div>
                <div>
                    <label class="label">Gender:</label>
                    <input class="input" name="gender" type="text" value="<?php echo $_SESSION["sex"]?>">
                </div>
                <div>
                    <label class="label">First Name:</label>
                    <input class="input" name="firstname" type="text" value="<?php echo $_SESSION["firstname"]?>">
                </div>
                <div>
                    <label class="label">Last Name:</label>
                    <input class="input" name="lastname" type="text" value="<?php echo $_SESSION["lastname"]?>">
                </div>
                <div>
                    <label class="label">Birth Date:</label>
                    <input class="input" name="birthday" type="text" value="<?php echo $_SESSION["birthday"]?>">
                </div>
                <div>
                    <label class="label">Email:</label>
                    <input class="input" type="email" value="<?php echo $_SESSION["email"]?>" readonly>
                </div>
                <div>
                    <label class="label">Country:</label>
                    <input class="input" name="country" type="text" value="<?php echo $_SESSION["country"]?>">
                </div>
				<div>
                    <h3>Shipping</h3>
                </div>
                <div>
                    <label class="label">Shipping Address:</label>
                    <input class="input" name="shippingaddress" type="text" value="<?php echo $_SESSION["shippingaddress"]?>">
                </div>
				<div>
                    <label class="label">Shipping City:</label>
                    <input class="input" name="shippingcity" type="text" value="<?php echo $_SESSION["shippingcity"]?>">
                </div>
                <div>
                    <label class="label">Shipping State:</label>
                    <input class="input" name="shippingstate" type="text" value="<?php echo $_SESSION["shippingstate"]?>">
                </div>

                <div>
                    <label class="label">Shipping Zipcode</label>
                    <input class="input" name="shippingzipcode" type="text" value="<?php echo $_SESSION["shippingzipcode"]?>">
                </div>
				 <div>
                    <label class="label">Shipping Country:</label>
                    <input class="input" name="shippingcountry" type="text" value="<?php echo $_SESSION["shippingcountry"]?>">
                </div>
                <div>
                    <label class="label">Contact Number</label>
                    <input class="input" name="contactnumber" type="text" value="<?php echo $_SESSION["contactnumber"]?>">
                </div>
<!--		<div>
                    <h3>Payment Methods</h3>
                </div>
                <div>
                    <label class="label">Name of Card</label>
                    <input class="input" name="cardname" type="text" value="<?php echo $_SESSION["cardname"]?>">
                </div>
                <div>
                    <label class="label">Card Number</label>
                    <input class="input" name="cardnumber" type="text" value="<?php echo $_SESSION["cardnumber"]?>">
                </div>
                <div>
                    <label class="label">Country</label>
                    <input class="input" name="cardcountry" type="text" value="<?php echo $_SESSION["cardcountry"]?>">
                </div>
				<div id="creditcard">
					<div class="creditcard">
						<label class="label">MM/YY</label>				
						<input class="input" type="text" name="cardmmyy" placeholder="" value="<?php echo $_SESSION["cardmmyy"]?>">
					</div>
					<div class="creditcard">
						<label class="label">CVV</label>
						<input class="input" type="text" name="cardcvv" placeholder="" value="<?php echo $_SESSION["cardcvv"]?>">
					</div>
					
				</div>
				<div>
					<label class="label">Postal Code</label>
                    <input id="postalcode" class="input" name="cardpostalcode" placeholder="" type="text" value="<?php echo $_SESSION["cardpostalcode"]?>">
                </div>
               <div id="creditcard-img">
						<a>
							<img class="creditcard-img" src="images/dashboard/visa.svg">
						</a>
						<a>
							<img class="creditcard-img" src="images/dashboard/mastercard.png">
						</a>
						<a>
							<img class="creditcard-img" src="images/dashboard/americanexpress.png">
						</a>
				</div>
				<div>
                    <h3 id="delivery-label">Delivery Services</h3>
                </div>
                <div>
                    <input class="input" name="deliveryservices" type="text" value="<?php echo $_SESSION["deliveryservices"]?>">
                </div>
                <div id="delivery-img">
							<a>
								<img class="delivery-img" src="images/dashboard/lbc.png">
							</a>
							<a>
								<img class="delivery-img" src="images/dashboard/fedex.png">
							</a>
				</div>
-->
                <div>
                    <button id="btn-save" class="btn-save" name="submit" type="submit">Update My Account</button>
                </div>

            </form>
        </div>

</body>
</html>

<script type="text/javascript">
    function displayPhoto() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("upload").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("image").src = oFREvent.target.result;
        };
    }
</script>

