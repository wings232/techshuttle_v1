<?php
	include "../../check_ses_list.php";
	include "../../dbconn.php";
	include_once "../../func_templates/func_code.php";

	$name = isset($_REQUEST['name'])?$_REQUEST['name']:"";	
    $email = isset($_REQUEST['email'])?$_REQUEST['email']:"";
    $mobile = isset($_REQUEST['mobile'])?$_REQUEST['mobile']:"";
    $phone_code = isset($_REQUEST['phone_code'])?$_REQUEST['phone_code']:"";
    $country_code = isset($_REQUEST['country_code'])?$_REQUEST['country_code']:"";
    $message = isset($_REQUEST['message'])?$_REQUEST['message']:"";
    $course = isset($_REQUEST['course'])?$_REQUEST['course']:"";
    $course_type = isset($_REQUEST['course_type'])?$_REQUEST['course_type']:"";

	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:s"); 
	$currentDateAlone = date("Y-m-d");

	//$dateGen = date('Ymdhis');
	//=$dateGenFormat = date('Y-m-dh:i:s');

	$stamptime = substr(strtotime($currentdates),4);
	//$part_prefix = substr($menu_name,0,2);
	$techRegNo = strtoupper("TSENQ".$stamptime);

	//$orderIdGen = $dateGen.$techRegNo;
	//$_SESSION['admission_no'] = $techRegNo;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    //use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require '../../mail/phpmailer/vendor/autoload.php';

	$admission_insert = array(
			"name" => $name,
			"email" => $email,
			"course" => $course,
			"course_type" => $course_type,
			"message" => $message,
			"mobile" => $mobile,
			"country_code" => $country_code,
			"phone_code" => $phone_code,
			"enquiry_gen_id" => $techRegNo,
			"insert_time"=>$currentdates,
			"status" => 'process',
			"course_status" => "Start",
		);
		//$obj->insert_records("sign_up",$myArray)

		if(recordsToInsert("enquiry",$admission_insert)){
            echo "done";

			$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.zoho.in';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'reachus@techshuttle.com';                     //SMTP username
    $mail->Password   = 'it7ACpBHhFMA';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('reachus@techshuttle.com', 'Techshuttle');
    $mail->addAddress($email, $name);  //Add a recipient
    //$mail->addAddress('drdheepikacancure@oncodheep.com','Dr.Dheepika');               //Name is optional
    $mail->addReplyTo('reachus@techshuttle.com', 'Information');
    $mail->addCC('jaheer_hussain@ymail.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name



$message = "
		<html>
		<head>
		<title>Appointment Request</title>
		</head>
		<body>
		
 <center>
	 
	 	<table width='700' style='background: #513f95; border-collapse: collapse;' cellpadding='0'>
	 		<tr>
	 			<td><img src='https://techshuttle.com/public/webtest/images/logo_01.png' style='width: 50px; padding: 10px;'></td>
	 			<td width='200'>
	 				<table width='200'>
	 					<tr>
	 						<td>
	 							<a class='facebook sh-tooltip' data-placement='bottom' title='Facebook /drkmh' target='_blank' href='' rel='noopener'><img src='https://www.oncodheep.com/test/images/facebook.png' width='25' height='25' /></a>
	 						</td>
	 						<td>
	 							<a class='instagram sh-tooltip' data-placement='bottom' title='Instagram /drkmh' target='_blank' href='' rel='noopener'><img src='https://www.oncodheep.com/test/images/instagram.png'  width='25' height='25'/></a>
	 						</td>
	 						<td>
	 							<a class='twitter sh-tooltip' data-placement='bottom' title='Twitter /drkmh' target='_blank' href='' rel='noopener'><img src='https://www.oncodheep.com/test/images/twitter.png'  width='25' height='25'/></a>
	 						</td>
	 						<td>
	 							<a class='whatsapp sh-tooltip' data-placement='bottom' title='Whatsapp /drkmh' target='_blank' href='' rel='noopener'><img src='https://www.oncodheep.com/test/images/whatsapp.png'  width='25' height='25'/></a>
	 						</td>
	 						<td>
	 							<a class='youtube sh-tooltip' data-placement='bottom' title='youtube /drkmh' target='_blank' href='' rel='noopener'><img src='https://www.oncodheep.com/test/images/youtube.png'  width='25' height='25'/></a>
	 						</td>
	 					</tr>
	 				</table>
	 			</td>
	 		</tr>
	 	</table>
	 	<table width='700' style='border-collapse: collapse;' cellpadding='0'>
	 		<tr>
	 			<td><img src='https://techshuttle.com/webtest/images/course/main/sap_abap.webp' width='100%' style='display:block'/></td>
	 		</tr>
	 	</table>
	 	<table  width='700' cellpadding='0' style='border-collapse: collapse;'>
	 		<tr>
	 			<td style='background: burlywood; padding: 10px 5px 10px 5px; font-family: sans-serif; color: white; font-weight: bold; font-size:20px' align='center'>Digital Environments</td>
	 		</tr>
	 		<tr>
	 			<td style='background: burlywood; padding: 10px 5px 10px 5px; font-family: sans-serif; color: white; font-weight: bold;' align='center'>Course Enquired</td>
	 		</tr>
	 	</table>
	 	<table width='700' style='border-collapse: collapse; border:1px solid #eee; border-bottom: none' >
	 		<tr>
	 			<td style='font-family: sans-serif; padding: 10px 10px 0px 10px;'>
	 				Hi Team,
	 			</td>
	 		</tr>
	 	</table>
	 	<table width='700' style='border-collapse: collapse; border:1px solid #eee; border-top: none; border-bottom: none;' >
	 		<tr>
	 			<td width='700'>
	 				<center>
		 				<table width='60%'  style='font-family: sans-serif; font-size: 14px'>
 							<tr>
 								<td colspan='2' style='border-bottom:1px solid #eee; padding: 10px 5px 10px 5px; width: 50%;'><b>Patient Name: &nbsp;&nbsp;</b>".$name."</td>
 							</tr>
 							<tr>
 								<td colspan='2' style='border-bottom:1px solid #eee; padding: 10px 5px 10px 5px; width: 50%'><b>Email: &nbsp;&nbsp;</b>".$email."</td>
 								
 							</tr>
 							<tr>
 								<td colspan='2' style='border-bottom:1px solid #eee; padding: 10px 5px 10px 5px; width: 50%'><b>Mobile Number: &nbsp;&nbsp;</b>+&nbsp;&nbsp; ".$phone_code.$mobile." </td>
 							</tr>
							<tr>
 								<td colspan='2' style='border-bottom:1px solid #eee; padding: 10px 5px 10px 5px; width: 50%'><b>Course Name: &nbsp;&nbsp;</b>".$course."</td>
 								
 							</tr>
							<tr>
 								<td colspan='2' style='border-bottom:1px solid #eee; padding: 10px 5px 10px 5px; width: 50%'><b>Course Type: &nbsp;&nbsp;</b>".$course_type."</td>
 								
 							</tr>
 							<tr>
 								<td colspan='2' style='border-bottom:1px solid #eee; padding: 10px 5px 10px 5px; width: 50%'><b>Message: &nbsp;&nbsp;</b>".$message."</td>
 							</tr>
 						
 						</table>
	 				</center>
	 			</td>
	 		</tr>
	 	</table>
	 	
	 	<table width='700' style='border-collapse: collapse; background: #eee'>
	 		
	 		<tr>
	 			<td colspan='6' style='width: 100%; text-align: center; padding: 10px; font-family: sans-serif; font-weight: bold;'>
	 				For Enquiry
	 			</td>
	 		</tr>
	 		<tr>
	 			<td rowspan='2' width='6%'><center><img src='https://www.drkmh.com/images/phone_01.png'  /></center></td>
	 			<td width='30%' style='text-align: center; padding: 10px; font-family: sans-serif; font-size: 13px; text-transform: uppercase; font-weight: bold;'>Office</td>
	 			
	 			
	 			<td rowspan='2' width='1%'><center></center></td>
	 			<td rowspan='2' width='6%'><center><img src='https://www.drkmh.com/images/whatsapp.png'/></center></td>
	 			<td width='15%' style='text-align: center; padding: 10px; font-family: sans-serif; font-size: 13px; text-transform: uppercase; font-weight: bold;'>Whats App</td>
	 		</tr>
	 		<tr>
	 			
	 			<td style='text-align: center; padding: 5px; font-family: sans-serif; font-size: 13px;'>+91 8870802060</td>
	 			
	 	
	 			
	 			<td style='text-align: center; padding: 5px; font-family: sans-serif; font-size: 13px;'>+91 8870802060</td>
	 		</tr>
	 		
	 	</table>
	 
</center>

		</body>
		</html>
		";





    //Content
    //https://github.com/PHPMailer/PHPMailer
    $mail->WordWrap = 50;   
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Enquiry - from Techshuttle.com';
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


		}

?>

