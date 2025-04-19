<?php
    include "../../check_ses_list.php";
    include "../../dbconn.php";
    include_once "../../func_templates/main_func_code.php";
    include "../../constantconfig.php";
    
    $course_id = isset($_REQUEST['parent_val'])?$_REQUEST['parent_val']:"";
	$sub_val = isset($_REQUEST['sub_val'])?$_REQUEST['sub_val']:"";
	$cate_group_val = isset($_REQUEST['cate_group_val'])?$_REQUEST['cate_group_val']:"";
	$cate_levelVal = isset($_REQUEST['cate_levelVal'])?$_REQUEST['cate_levelVal']:"";
	$head_services = isset($_REQUEST['head_services'])?$_REQUEST['head_services']:"";
	$sNames_admin = isset($_REQUEST['name'])?$_REQUEST['name']:"";
	$sMobile_no = isset($_REQUEST['mobile'])?$_REQUEST['mobile']:"";
	$sEmail_id = isset($_REQUEST['email_id'])?$_REQUEST['email_id']:"";
	$course_discount = isset($_REQUEST['course_discount'])?$_REQUEST['course_discount']:"";
	$pro_type = isset($_REQUEST['pro_type'])?$_REQUEST['pro_type']:"";

    date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:s"); 
	$currentDateAlone = date("ymd");

	$stamptime = substr(strtotime($currentdates),4);
	//$part_prefix = substr($menu_name,0,2);
	$techRegNo = strtoupper("TS".$currentDateAlone.$stamptime);
    $ref_no = base64_encode($techRegNo);	
    $sMobile_nos = base64_encode($sMobile_no);	

    

	$selectPriceSetup= selectPriceSetup("tbl_price_setup",$course_id,$pro_type,'courses','Active');
	$selectPriceSetup_json = json_decode($selectPriceSetup, true);
	//print_r($accopany_filter_List_json);
	$selectPriceSetup_json_count = isset($selectPriceSetup_json['selectPriceSetup_count'])?$selectPriceSetup_json['selectPriceSetup_count']:"";
	if($selectPriceSetup_json_count > 0){  
	  foreach ($selectPriceSetup_json['selectPriceSetup_details'] as $price_details) {
	      $base_price  = $price_details["base_price"];
	      $price_ids  = $price_details["price_id"];
          $end_date  = $price_details["end_date"];
      }
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    //use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require '../../../mail/phpmailer/vendor/autoload.php';

    $admission_insert = array(
        
        "course_id" => $course_id,
        "aName" => $sNames_admin,
        "mobile" => $sMobile_no,
        "email" => $sEmail_id,        
        "price_id" => $price_ids,       
        "course_fees" => $base_price,
        "expiry_date" => $end_date,
        "insert_time" => $currentdates,
        "admin_gen_id" => $techRegNo,
        "status" => "process",
        "course_status" => "Initaited",
    );
    //$obj->insert_records("sign_up",$myArray)

    if(recordsToInsert("tbl_adminission_form",$admission_insert)){
        echo "Admission created";

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
    $mail->addAddress($sEmail_id, $sNames_admin);  //Add a recipient
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
                            Dear ".$sNames_admin.", 
                        </td>
                    </tr>
                </table>
                <table width='700' style='border-collapse: collapse; border:1px solid #eee; border-top: none; border-bottom: none;' >
                    <tr>
                        <td width='700'>
                            <center>
                                <table width='85%'  style='font-family:outfit; font-size: 16px'>
                                    <tr>
                                        <td colspan='2' style='padding: 10px 5px 10px 5px; width: 50%; text-align: center;'>Greetings from Techshuttle </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2' style='padding: 10px 5px 10px 5px; width: 50%; text-align: justify; line-height:30px;'>Thank you for your interest in <span>".$head_services."</span>, your registration request has been Confirmed and the link for the payment is given below</td>
                                        
                                    </tr>

                                    <tr>
                                        <td colspan='2' style='padding: 0px 5px 10px 5px; width: 50%; text-align: center; color:#e44c25; line-height: 26px; text-transform:uppercase;'><a href='".$baseUrl."admission_login.php?key=".$ref_no."~".$sMobile_nos."' style='color: green;'>Click Here to Pay &#x20B9; ".$base_price."</a></td>
                                        
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
            echo "Admission Link Created";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>