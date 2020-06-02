<!DOCTYPE html>
<html>
<head>
        <title> </title>
</head>
<style>
    #editAccountContainer span{
	position: fixed;
        display:table;
        padding-top: 8px; 
        margin-left: 90%;

    }
    #editAccountContainer h4{
        margin:0px;
        padding-left: 0px;
        margin-bottom: 10px;
	padding-top: 6%;
    }
    #editAccountContainer #title{
	padding-left: 20px;
   }
    #editAccountDisplay{
        margin-top: 5%;
        height: 400px;  
        overflow: scroll;
        margin-left: auto;
        margin-right: auto;
        width: 300px;
        text-align: center;
	font-family: "Arial Narrow", Arial, sans-serif;
        font-size: 15px;
        font-weight: normal; 
        text-decoration: none;
    }
    #editAccountDisplay h3, h4, h5, p{
        margin: 10px;
    }

    #editAccountDisplay .accountlabel{
        text-align: left;
        padding-left: 20px;
	    color: white ;

    }
    #editAccountDisplay .accountdetails{
        text-align: left;
        padding-left: 55px;

    }
    #editAccountDisplay button{
        width: 80%;
        height: 45px;
        border-radius: 5px;
        margin:20px;
        background-color: #668d3c;
        border: none;
        color: white;
        font-size: 15px;
    }
    #editAccountDisplay input{
        height: 35px;
        width: 80%;
        border-radius: 5px;
        border: none;
        color: black;
        padding-left:10px;
	outline: none;
	font-size: 15px;
    }
    #editAccountDisplay label {
	display: block;
        font-family: "Arial Narrow", Arial, sans-serif;
        font-size: 15px;
        font-weight: normal;
    }
</style>
<body>
        <span class="close" onclick="hideEditAccount()">&times;</span>
        <h4 id="title">Edit Account</h4>
        <div id="editAccountDisplay">
        <form action="updateaccount.php" method="post">
                <img src="user.png" height="100px" width="100px">
                <label> <?php echo $_SESSION["username"]; ?> </label>

                <p class="accountlabel">Gender:</p>
                <input class="editAccountInput" type="text" name="gender" value="<?php echo $_SESSION["sex"]; ?>">

                <p class="accountlabel">First Name:</p>
                <input class="editAccountInput" type="text" name="firstname" value="<?php echo $_SESSION["firstname"]; ?>">

                <p class="accountlabel">Last Name:</p>
                <input class="editAccountInput" type="text" name="lastname" value="<?php echo $_SESSION["lastname"]; ?>">

                <p class="accountlabel">Country</p>
                <input class="editAccountInput" type="text" name="country" value="<?php echo $_SESSION["country"]; ?>">

                <button id="save-btn" class="edit" type="submit" name="submit">Save Changes</button>
        </form>
        </div>
</body>
</html>

