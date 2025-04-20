<?php
require('config.php');
require('razorpay-php/Razorpay.php');   
use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

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



$orderData = [
    'receipt'         => $orderIdGen,
    'amount'          => 10000 * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);
$order_id = $razorpayOrder->id;

$callBackUrl = 'ajax/razor/orders_success.php';
echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';
echo '<button id="rzp-button1" onclick="startpayment()">Pay with Razorpay</button>';

echo '<script>
    function startpayment(){
        var option= {
            key: "rzp_test_yOGVnX86q0PZAq", 
            amount: '.$razorpayOrder->amount.', 
            currency: "INR",
            name: "Techshuttle.com",
            description: "Payment For your order",
            image: "https://techshuttle.com/public/webtest/images/logo_01.png",
            order_id: "'. $order_id.'",
            theme:{
                color:"#0251af"
            },
            prefill:{
                name : "'. $aNames.'",
                email : "'. $emails.'",
                contact: "'. $mobiles.'",
            },
            notes:{
                address :"'. $address.'",
                merchant_order_id :"'. $orderIdGen.'",
                admission_id:"'. $admissions_ids.'" ,
                admission_no:"'. $admissions_Nos.'" ,
            },
            callback_url:"'. $callBackUrl.'"
        };
        var rzp = new Razorpay(option);
        rzp.open();
    }
</script>'


?>


