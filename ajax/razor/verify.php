<?php

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";
echo $_SESSION['razorpay_order_id'];
print_r($_POST);
//pay_QKumKQJS31a7uo 
//order_QKusbzskoOFHfw
//Array ( [razorpay_payment_id] => pay_QKusiMPwHUd2sm [razorpay_signature] => 248002fb01567c9efc54fa23db6eecffb3a8ce2f1b52226a6139195a553b6004 )

$api = new Api($keyId, $keySecret);

$razorpayPayment = $api->payment->fetch('pay_QKusiMPwHUd2sm');
echo "<pre>";
print_r($razorpayPayment);

echo "<pre>";
print_r($razorpayPayment['notes']['merchant_order_id']);
echo $sd = $razorpayPayment['order_id'];

// Fetch Payments Based on Orders
echo "Fetch Payments Based on Orders";
$razorpayPayment_ap = $api->order->fetch($sd)->payments();
echo "<pre>";
print_r($razorpayPayment_ap);
echo "<pre>";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_order_id'] }</p>
             <p>Payment ID: {$_POST['razorpay_payment_id'] }</p>
             <p>Payment ID: {$_POST['razorpay_signature'] }</p>";
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
             print_r($error);
}

//echo $html;


echo "<br>";
echo $sd = $_POST['razorpay_order_id'];
$razorpayPayment_ap = $api->order->fetch($sd)->payments();
echo "<pre>";
print_r($razorpayPayment_ap);
echo "<pre>";
//echo $razorpayPayment_ap['items'];
//print_r($razorpayPayment_ap['items'][0]['id']);
echo $payment_ids =  $razorpayPayment_ap['items'][0]['id'];
echo $payment_amount =  $razorpayPayment_ap['items'][0]['amount'];
/*foreach ($razorpayPayment_ap['items'] as $key => $value) {
    //print_r($value);
    foreach ($value as $keyone => $valueone) {
        print_r($valueone);
    }

}*/
echo "<br>";
echo "Fetch Payments Based on Orders";
echo "<br>";
$razorpayPayment = $api->payment->fetch($payment_ids);

echo "<pre>";
print_r($razorpayPayment);
echo "<pre>";

echo $razorpayPayment['notes']['shopping_order_id'];
echo "<br>";
echo $razorpayPayment['amount']/100;

echo "<br>";
echo "Fetch Payments Based on Orders with id";
echo "<br>";
$razorpayPayment_ap = $api->order->fetch($sd);
echo "<pre>";
print_r($razorpayPayment_ap);
echo "<pre>";
