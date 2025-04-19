<?php

require('config.php');
require('razorpay-php/Razorpay.php');
$_SESSION['admission_ids']; 
$_SESSION['admission_no'];
$admissions_ids = base64_decode($_SESSION['admission_ids']);
$admissions_Nos = base64_decode($_SESSION['admission_no']);

$selectAdmissionCheck= selectAdmissionCheck("tbl_adminission_form",$admissions_ids,$admissions_Nos,"process");
$selectAdmissionCheck_json = json_decode($selectAdmissionCheck, true);
//print_r($accopany_filter_List_json);
$selectAdmissionCheck_json_count = isset($selectAdmissionCheck_json['selectAdmissionCheck_count'])?$selectAdmissionCheck_json['selectAdmissionCheck_count']:"";
if($selectAdmissionCheck_json_count > 0){  
  foreach ($selectAdmissionCheck_json['selectAdmissionCheck_details'] as $admission_detail_check) {
        $admission_id  = $admission_detail_check["admission_id"];
        $actual_fees  = $admission_detail_check["actual_fees"];
        $gst_amount  = $admission_detail_check["gst_amount"];
        $course_feess  = $admission_detail_check["course_fees"];
        $aNames  = $admission_detail_check["aName"];
        $mobiles  = $admission_detail_check["mobile"];
        $emails  = $admission_detail_check["email"];
        $citys  = $admission_detail_check["city"];
        $states  = $admission_detail_check["state"];
        $countrys  = $admission_detail_check["country"];
        $address  = $admission_detail_check["address"];
        $pincodes  = $admission_detail_check["pincode"];
     }
}
    date_default_timezone_set('Asia/Calcutta');
    $dateGen = date('Ymdhis');
	// mandatory Information
	$orderIdGen = $dateGen.$admissions_Nos;
	$tid = $dateGen;
	$merchant_id = 2241157;
	$amount_paid = $course_feess;
    $amount_paid = 10000;
//rzp_test_yOGVnX86q0PZAq - Key id
//4BbVxyFU2HEGFHbPa9l4v947 - Key Secret
// for razor pay login
//https://dashboard.razorpay.com/?screen=sign_in&next=app%2Fpayments
// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => $orderIdGen,
    'amount'          => 10000 * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);
//print_r($razorpayOrder);
$razorpayOrderId = $razorpayOrder['id'];
$razorpayOrderReceipt = $razorpayOrder['receipt'];
//pay_LZdEARQ17631Hm
/*$razorpayPayment = $api->payment->fetch('pay_MEjPMXMhy4R7Cg');
echo "<pre>";
print_r($razorpayPayment);
echo "<pre>";
print_r($razorpayPayment['notes']['shopping_order_id']);
echo $sd = $razorpayPayment['order_id'];

// Fetch Payments Based on Orders
echo "Fetch Payments Based on Orders";
$razorpayPayment_ap = $api->order->fetch($sd)->payments();
echo "<pre>";
print_r($razorpayPayment_ap);
echo "<pre>";

echo "Fetch Payments Based on Orders with id";
$razorpayPayment_ap = $api->order->fetch($sd);
echo "<pre>";
print_r($razorpayPayment_ap);
echo "<pre>";*/

/*echo "Fetch Payments Based on Orders Fetch on card details";
$razorpayPayment_aps = $api->payment->fetch('pay_LZdEARQ17631Hm')->edit(array('notes'=> array('shopping_order_id'=> 'value1')));
echo "<pre>";
print_r($razorpayPayment_aps);
echo "<pre>";*/


/*foreach ($razorpayPayment['notes'] as $key=> $value) {
    echo $value."<br>";
    
}*/
//echo $razorpayOrderId = $razorpayOrder['entity'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
//echo "<br>";
//print_r($orderData);
//echo "<br>";
$order_ids = $orderData['receipt'];
//echo "<br>";
$displayAmount = $amount = $orderData['amount'];

/*$razorpayPayments = $api->payment->fetch('pay_LZdEARQ17631Hm')->capture(array('amount'=>$amount,'currency' => 'INR'));
echo "<pre>";
print_r($razorpayPayments);
echo "<pre>";*/

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=USD";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['manual', 'automatic'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $aNames,
    "description"       => "Tron Legacy",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => "Daft Punk",
    "email"             => $emails,
    "contact"           => $mobiles,
    ],
    "notes"             => [
    "address"           => $address ,
    "merchant_order_id" => $orderIdGen,
    ],
    "theme"             => [
    "color"             => "#0251af"
    ],
   // "order_id"          => $razorpayOrderId,
    "order_id"          => $razorpayOrderId,
    "order_ids"          => $order_ids,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
?>

<style type="text/css">
    .razorpay-payment-button{
        background: red;
    }
</style>
