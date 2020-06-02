<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        :root{
            --paywall-width: 320px;
            /*--paywall-height: calc(100vh - 60px - 60px);*/
            --paywall-height: 500px;
            --header-height: 70px;
            
        }

        .paywallContainer .header {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: var(--header-height);
        }

        .paywallContainer .header span {
            position: absolute;
            right: 10px;
            color: white;
            font-size: 28px;
            font-weight: bold;
            top: 3px;
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

        .paywallContainer .show {display: block;}

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
    </style>
</head>
<body>
        <div class="header">
            <span class="close" onclick="hidePaywall()">&times;</span>
            <label>Get Access Now!</label>
        </div>
        <div class="body" id="body">
        <form class="paywallForm" id="paywallForm" action="Authorize.net/payment.php" method="post">
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
                <button type="submit" name="submit">Get Access</button>
            </div>
        </form>
</body>
</html>