
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="styles.css">
</head>
<style>
	#dashboardContainer{
		font-family: "Arial Narrow", Arial, sans-serif;
        font-size: 15px;
		display: none;
        position: relative;
		font-family: Arial;
		background-color: rgba(0, 0, 0,0.3);
		border-radius: 5px;
		padding: 10px;
		color: white;
		margin-top: 70px;
		width: 80%;
		margin-left: auto;
		margin-right: auto;
	}
	#dashboardContainer h1{
		margin: 0px;
		align-self: center;
		margin-left: 10px;
	}
	#profpic-username-container{
		margin-top: 12px;
		margin-bottom: 12px;
		display: flex;
	}
	#profpic-username{
		width: 100px;
		text-align: left;
		margin-left: 16px;
	}
	#dashboardContainer h3{
		margin-top: 0px;
		margin-bottom: 0px;
	}
	.dashboard-img{
		width: 60px;
		height: 30px;
		margin-right: 10px;
		cursor: pointer;
	}
	#dashboardProfilePic{
		width: 100px;
		height: 100px;
		border-radius: 50px;
	}
	#dashboardSection{
		overflow: auto;
		padding: 0px;
		margin: 0px;
	}
	#dashboardContainer label{
        font-size: 15px;
		margin-top: 10px;
	}
	#dashboardContainer #dashboardSection input{
        	font-size: 15px;
		margin-top: 10px;;
		border-style: none;
		border-radius: 5px;
		height: 30px;
		padding-left: 10px;
		width: 21.85vw;
	}
	#dashboardContainer button{
		color: white;
		border-radius: 5px;
		border-style: none;
		width: 15vw;
		height: 30px;
		background-color: rgb(70, 160, 73);
		margin: 10px;
		font-size: 15px;
		
	}
	.dashboardSection{
		padding: 20px;
		padding-top: 10px;
		padding-bottom: 10px;
		display: flex;
		flex-direction: column;
	}
	.dashboardSectionPDF{
		display: flex;

	}
	#dashboardContainer .advertisement{
		color: 	black;
		background-color: white;
	}
	#dashboardContainer #creditcard{
		padding: 0px;
		display: flex;
		margin: 0px;
		margin-top: 10px;

	}
	#dashboardContainer #creditcard input{
		width: 5vw;
		margin-right: 10px;
		padding-left: 0px;
		text-align: center;
		
	}
	#dashboardContainer #creditcard #postalcode{
		width: 10.3vw;
	}
	#dashboardContainer span{
		position: absolute;
		font-size: 28px; 
		color: white;
		right: 20px;
		cursor: pointer; 
	}
	
	#dashboardContainer .save-button-div{
		text-align: right;
		
		
	}
	#advertisement label{
		font-size: 13px;
	}
	#dashboardContainer #creditcard-img{
		padding-top: 10px;
		display: flex;
		
	}
	#dashboardContainer .creditcard-img{
		width: 50px;
		height: 30px;
		margin-right: 10px;
	}
	#dashboardContainer #deliveryServices{
		margin-top: 50px;
	}
	#dashboardContainer #deliveryServices input{
		
	}
	#dashboardContainer #deliveryServices #delivery-img{
		padding-top: 10px;
		display: flex;
	}
	#dashboardContainer #deliveryServices .delivery-img{
		width: 50px;
		height: 30px;
		margin-right: 10px;
	}
/*for camera upload*/
	:root{
            --icon: 30px;
       	}
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
            width: calc(var(--icon) * .4);
            height: calc(var(--icon) * .4);
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
            top: 95px;
	    left: 95px;
            opacity: 0.8;
            background: white;
            cursor: pointer;
	    border-radius: 50%;
        }

	input#file-upload-button {
	    cursor: pointer;
	}

        .upload[type="file"] {
            position: absolute;
            opacity: 0;
            right: 0;
	    top: -20px;
	    width: 100%;
	    height: 50px;
            z-index: 1;
            border-radius: 50%;
	    cursor: pointer;
        }
/*for camera upload end*/
</style>
<body>
	<div id="dashboardContainer container">
		<span onclick="hideShipping()">&times;</span>
		<div id="profpic-username-container">
			<div id="profpic-username">
				<img id="dashboardProfilePic" src="<?php echo $_SESSION["profilepicture"]?>">
				<span id="icon" class="icon">
                        		<input id="upload" class="upload" name="image" type="file" onchange="setPhoto()">
                        		<a class="camera"></a>
                    		</span>
			</div>
			<h1>Hello! <?php echo $_SESSION["firstname"] ?>, Welcome to your Dashboard!</h1>
		</div>
		<form action ="updatedashboard.php" method = "post">
			<div class="row" id="dashboardSection" >
				<div class="dashboardSection col-4">
					<h3>Profile</h3>
					<label>Member Since</label>
					<input type="text" name="" value="<?php echo $_SESSION["membersince"]?>" readonly>
					<label>Gender</label>
					<input type="text" name="gender" value="<?php echo $_SESSION["sex"]?>">	
					<label>First Name</label>
					<input type="text" name="firstname" value="<?php echo $_SESSION["firstname"]?>">
					<label>Last Name</label>
					<input type="text" name="lastname" value="<?php echo $_SESSION["lastname"]?>">	
					<label>Birthday</label>
					<input type="text" name="birthday" value="<?php echo $_SESSION["birthdate"]?>">
					<label>Country</label>
					<input type="text" name="country" value="<?php echo $_SESSION["country"]?>">		
					<label>Email</label>
					<input type="text" name="" value="<?php echo $_SESSION["email"]?>" readonly>	
				</div>
				<div class="dashboardSection col-4">
					<h3>Shipping</h3>
					<label>Shipping Address</label>
					<input type="text" name="shippingaddress" value="w">
					<label>Shipping Country</label>
					<input type="text" name="shippingcountry" value="w">	
					<label>Shipping State</label>
					<input type="text" name="shippingstate" value="w">
					<label>Shipping Province</label>
					<input type="text" name="shippingprovince" value="w">
					<label>Shipping City</label>
					<input type="text" name="shippingcity" value="w">
					<label>Shipping Zipcode</label>
					<input type="text" name="shippingzipcode" value="w">					
					<label>Contact Number</label>
					<input type="text" name="contactnumber" value="w">		
				</div>
				<div class="dashboardSection col-4">
					<h3>Payment Method</h3>
					<label>Name of Card</label>
					<input type="" name="" readonly>
					<label>Card Number</label>
					<input type="" name="" placeholder="XXXX XXXX XXXX XXXX" readonly>
					<label>Country</label>
					<input type="" name="" readonly>
					<div id="creditcard">	
					<input type="text" name="" placeholder="MM/YY" readonly>
					<input type="text" name="" placeholder="CVV" readonly>
					<input type="text" name="" placeholder="Postal Code" id="postalcode" readonly>
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
					<div id="deliveryServices">
						<h3>Delivery Services</h3>
						<input type="" name="" readonly>
						<div id="delivery-img">
							<a>
								<img class="delivery-img" src="images/dashboard/lbc.png">
							</a>
							<a>
								<img class="delivery-img" src="images/dashboard/fedex.png">
							</a>
					
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-4">	
				</div>
				<div class="col-4">	
				</div>
				<div class="col-4 save-button-div">
					<button name="submit" type="submit">Update Dashboard</button>	
				</div>
			</div>
		</form>
		<!-- <div class="row advertisement">
			<div class="dashboardSection col-4">
				<label>Payment Method</label>
				<div class="dashboardSectionPDF">
					<a>
						<img class="dashboard-img" src="images/dashboard/visa.svg">
					</a>
					<a>
						<img class="dashboard-img" src="images/dashboard/mastercard.png">
					</a>
					<a>
						<img class="dashboard-img" src="images/dashboard/americanexpress.png">
					</a>
				</div>
			</div>
			<div class="dashboardSection col-4">
				<label>Delivery Services</label>
				<div class="dashboardSectionPDF">
					<a>
						<img class="dashboard-img" src="images/dashboard/lbc.png">
					</a>
					<a>
						<img class="dashboard-img" src="images/dashboard/fedex.jpeg">
					</a>
				</div>
			</div>
			<div class="dashboardSection col-4">
				<label>Follow us</label>
				<div class="dashboardSectionPDF">
					<a>
						<img class="dashboard-img" src="images/dashboard/facebook.png">
					</a>
					<a>
						<img class="dashboard-img" src="images/dashboard/youtube.png">
					</a>
					<a>
						<img onclick="location.href='https://messenger.com'" class="dashboard-img" src="images/dashboard/messenger.png">
					</a>
				</div>
			</div>
		</div> -->
	</div>
</div>
</body>
</html>
<script type="text/javascript">
    function setPhoto() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("upload").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("dashboardProfilePic").src = oFREvent.target.result;
        };
    }
</script>
