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

        use Razorpay\Api\Api;

        $api = new Api($keyId, $keySecret);
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
        $_SESSION['razorpay_order_id'] = $razorpayOrderId;
        $order_ids = $orderData['receipt'];
        
        if ($displayCurrency !== 'INR')
        {
            $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=USD";
            $exchange = json_decode(file_get_contents($url), true);

            $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
        }

        $data = [
            "key"               => $keyId,
            "amount"            => $amount_paid * 100,
            "name"              => $aNames,
            "description"       => "Tron Legacy",
            "image"             => "https://techshuttle.com/public/webtest/images/logo_01.png",
            "prefill"           => [
                "name"              => $aNames,
                "email"             => $emails,
                "contact"           => $mobiles,
                "admission_id" => $admissions_ids,
                "admission_no" => $admissions_Nos,
            ],
            "notes"             => [
                "address"           => $address ,
                "merchant_order_id" => $orderIdGen,
                "admission_id" => $admissions_ids,
                "admission_no" => $admissions_Nos,
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

        
        
?>

<button id="rzp-button1">Pay with Razorpay</button>
<input type="hidden" name="admissions_ids" id="admissions_ids" value='<?php echo $admissions_ids; ?>'>
<input type="hidden" name="admissions_Nos"  id="admissions_Nos" value='<?php echo $admissions_Nos; ?>'>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="ajax/razor/order_success.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
<script>
// Checkout details as a json
var options = <?php echo $json?>;

//console.log(response)
/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
    console.log(response);
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;


//pay_QLP4kZHZywsrS9
var rzp = new Razorpay(options);
rzp.on('payment.failed', function(response){
    //alert(response.error.description)
     console.log(response.error.metadata.payment_id);
    // console.log(response.error.metadata.order_id);
    // console.log(response.error.reason);
    
    //document.getElementById('razorpay_payment_id').value = response.error.metadata.payment_id;
    var payment_id_f = response.error.metadata.payment_id;
    var admissions_ids = document.getElementById('admissions_ids').value;
    var admissions_Nos = document.getElementById('admissions_Nos').value;
    //failed();
    //alert(admissions_Nos)
    const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            alert(this.responseText);
        }
        xhttp.open("POST", "ajax/razor/razor_fail.php?payment_id_f="+payment_id_f+"&admissions_ids="+admissions_ids+"&admissions_Nos="+admissions_Nos, true);
        xhttp.send();
   
    //document.razorpayform.submit()
})
options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};



document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>

