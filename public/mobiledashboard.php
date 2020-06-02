<!DOCTYPE html>
<html>
<head>
        <title> </title>
</head>
<style type="text/css">
/*        :root{
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

        .accountContainer form div.buttons input {
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
*/
    </style>
<body>
    <!-- <div class="accountContainer" id="accountContainer">
        <div class="header">
            <span class="close" onclick="hideAccount()">&times;</span>
            <label id="title">Profile</label>
        </div>
        <div class="body" id="body">
            <form class="accountForm" id="accountForm" action="updateaccount.php" method="post" enctype="multipart/form-data">
                <div class="img">
                    <img id="image" src="<?php echo $_SESSION["profilepicture"]?>">
                    <span id="icon" class="icon">
                        <input id="upload" class="upload" name="image" type="file" onchange="displayPhoto()">
                        <a class="camera"></a>
                    </span>
                </div>
                <div class="username">
                    <label><?php echo $_SESSION["username"]?></label class="username">
                </div>
                <div>
                    <label class="label">Member Since:</label>
                    <input class="input" name="firstname" type="text" value="<?php echo $_SESSION["membersince"]?>" disabled>
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
                    <input class="input" name="birthdate" type="text" value="<?php echo $_SESSION["birthdate"]?>">
                </div>
                <div>
                    <label class="label">Email:</label>
                    <input class="input" name="email" type="email" value="<?php echo $_SESSION["email"]?>" disabled>
                </div>
                <div>
                    <label class="label">Country:</label>
                    <input class="input" name="country" type="text" value="<?php echo $_SESSION["country"]?>">
                </div>
                <div class="buttons">
                    <input id="btn-save" class="btn-save" name="save" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div> -->
</body>
</html>

<script type="text/javascript">
    /*function displayPhoto() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("upload").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("image").src = oFREvent.target.result;
        };
    }*/
</script>
