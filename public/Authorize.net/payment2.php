<?php 

session_start();

// Include Authorize.Net PHP sdk 
require 'authorize_net_sdk_php/autoload.php';  
use net\authorize\api\contract\v1 as AnetAPI; 
use net\authorize\api\controller as AnetController; 
 
// Include configuration file  
require_once 'config.php'; 
 
$paymentID = $statusMsg = ''; 
$ordStatus = 'error'; 
$responseArr = array(1 => 'Approved', 2 => 'Declined', 3 => 'Error', 4 => 'Held for Review'); 
 
// Check whether card information is not empty 
if(!empty($_POST['card_number']) && !empty($_POST['card_exp']) && !empty($_POST['card_cvc'])){ 
     
    // Retrieve card and user info from the submitted form data 
    $name = $_SESSION["firstname"]." ".$_SESSION["lastname"]; 
    $email = $_SESSION["email"]; 
    $card_number = preg_replace('/\s+/', '', $_POST['card_number']); 
    $card_exp_year_month = $_POST['card_exp']; 
    $card_cvc = $_POST['card_cvc']; 
     
    // Set the transaction's reference ID 
    $refID = 'REF'.time(); 
     
    // Create a merchantAuthenticationType object with authentication details 
    // retrieved from the config file 
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();    
    $merchantAuthentication->setName(ANET_API_LOGIN_ID);    
    $merchantAuthentication->setTransactionKey(ANET_TRANSACTION_KEY);    
     
    // Create the payment data for a credit card 
    $creditCard = new AnetAPI\CreditCardType(); 
    $creditCard->setCardNumber($card_number); 
    $creditCard->setExpirationDate($card_exp_year_month); 
    $creditCard->setCardCode($card_cvc); 
     
    // Add the payment data to a paymentType object 
    $paymentOne = new AnetAPI\PaymentType(); 
    $paymentOne->setCreditCard($creditCard); 
     
    // Create order information 
    $order = new AnetAPI\OrderType(); 
    $order->setDescription($itemName); 
     
    // Set the customer's identifying information 
    $customerData = new AnetAPI\CustomerDataType(); 
    $customerData->setType("individual"); 
    $customerData->setEmail($email); 
     
    // Create a transaction 
    $transactionRequestType = new AnetAPI\TransactionRequestType(); 
    $transactionRequestType->setTransactionType("authCaptureTransaction");    
    $transactionRequestType->setAmount($itemPrice); 
    $transactionRequestType->setOrder($order); 
    $transactionRequestType->setPayment($paymentOne); 
    $transactionRequestType->setCustomer($customerData); 
    $request = new AnetAPI\CreateTransactionRequest(); 
    $request->setMerchantAuthentication($merchantAuthentication); 
    $request->setRefId($refID); 
    $request->setTransactionRequest($transactionRequestType); 
    $controller = new AnetController\CreateTransactionController($request); 
    $response = $controller->executeWithApiResponse(constant("\\net\authorize\api\constants\ANetEnvironment::$ANET_ENV")); 
     
    if ($response != null) { 
        // Check to see if the API request was successfully received and acted upon 
        if ($response->getMessages()->getResultCode() == "Ok") { 
            // Since the API request was successful, look for a transaction response 
            // and parse it to display the results of authorizing the card 
            $tresponse = $response->getTransactionResponse(); 
 
            if ($tresponse != null && $tresponse->getMessages() != null) { 
                // Transaction info 
                $transaction_id = $tresponse->getTransId(); 
                $payment_status = $response->getMessages()->getResultCode(); 
                $payment_response = $tresponse->getResponseCode(); 
                $auth_code = $tresponse->getAuthCode(); 
                $message_code = $tresponse->getMessages()[0]->getCode(); 
                $message_desc = $tresponse->getMessages()[0]->getDescription(); 
                 
                // Include database connection file  
                include_once 'dbConnect.php'; 
                 
                // Insert tansaction data into the database 
                $sql = "INSERT INTO orders(name,email,item_name,item_number,item_price,item_price_currency,card_number,card_exp,paid_amount,txn_id,payment_status,payment_response,created,modified) VALUES('".$name."','".$email."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$card_number."','".$card_exp_year_month."','".$itemPrice."','".$transaction_id."','".$payment_status."','".$payment_response."',NOW(),NOW())"; 
                $insert = $db->query($sql); 
                $paymentID = $db->insert_id; 
                 
                $ordStatus = 'success'; 
                $statusMsg = 'Your Payment has been Successful!'; 
            } else { 
                $error = "Transaction Failed! \n"; 
                if ($tresponse->getErrors() != null) { 
                    // $error .= " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "<br/>"; 
                    // $error .= " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "<br/>"; 
                    $error .= $tresponse->getErrors()[0]->getErrorText() . "<br/>"; 
                } 
                $statusMsg = $error; 
            } 
            // Or, print errors if the API request wasn't successful 
        } else { 
            $error = "Transaction Failed! \n"; 
            $tresponse = $response->getTransactionResponse(); 
         
            if ($tresponse != null && $tresponse->getErrors() != null) { 
                // $error .= " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "<br/>"; 
                // $error .= " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "<br/>";
                $error .= $tresponse->getErrors()[0]->getErrorText() . "<br/>"; 
            } else { 
                // $error .= " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "<br/>"; 
                // $error .= " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "<br/>"; 
                $error .= $response->getMessages()->getMessage()[0]->getText() . "<br/>"; 
            } 
            $statusMsg = $error; 
        } 
    } else { 
        $statusMsg =  "Transaction Failed! No response returned"; 
    } 
}
else{ 
    $statusMsg = "Error on form submission."; 
} 

if (!empty($paymentID)) {
    $_SESSION['paid'] = 1;
}

echo "<script>location.href = '../bdd33ab49ef4aefdc55cfbee2898b672.php';</script>";
?>?