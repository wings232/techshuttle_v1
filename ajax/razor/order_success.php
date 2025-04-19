<?php
	include "check_ses_list.php";
	include "dbconn.php";
	include_once "func_templates/func_code.php";
	include "constantconfig.php";
?>
<!DOCTYPE html>
<html>
<head>
	<base href='<?php echo $baseUrl; ?>' > 
	<title>Techshuttle | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div class="container"><!--Container Starts -->
	<div class="head_bar_con"><!--head_bar_con Starts -->
		<?php
			include "head_bar.php";
		?>
	</div><!--head_bar_con Ends -->

	<div class="header_con"><!--header_con Starts -->
		<?php
			 include "header.php";
		?>
	</div><!--header_con Ends -->

	<div class="menu_con"><!--menu_con Starts -->
		<?php
			 include "menu.php";
		?>
	</div><!--menu_con Ends -->
	<div class="order_success_con">
		<div class="order_success_center">
			<div class="order_success">
				<div class="user_nav">
					<ul>
						<li><a href="">Home</a></li>
						<li><a href="">Order Confirmation</a></li>
					</ul>
				</div>
				<div class="order_head_center">
					<div class="order_left">
						<div class="image_form">
							<div class="form_head">
								<div class="head">
									Jaheer Hussain Abdul, your order was submitted successfully!
									
								</div>
							</div>
							<div class="form_para">
								<div class="para">
									<p>
										Hi <span class="name">Dr.Jaheer Hussain Abdul</span>, Thank you for your interest in <span class="course">SAP ABAP</span> , your Course fee <span class="rupee">₹</span><span class="amount"> 35000.00</span>   (Inclusive of GST) has been successfully received . your transaction id is <span class="trans">17305322266</span>
									</p>
									<p>
										Your booking details has been sent to: 
										<span class="email">jaheerabdul@techshuttle.com</span>
									</p>
								</div>
							</div>
						</div>
						<div class="image">
							<img src="images/icons/filling-form.svg"/>
						</div>
					</div>
					<div class="order_right">						
						<div class="order_head_con">
							<div class="order_image">
								<i class="fas fa-check-circle"></i>
							</div>
							<div class="order_head">
								<div class="head">Payment Successful</div>
								<div class="head_para">
									<p>
										We are processing the same and you will be notified via email.
									</p>
								</div>
							</div>
							<div class="list_details">
								<div class="table_center">
									<table>
										<tbody>
											<tr>
												<td>Booked On</td>
												<td>:</td>
												<td>Tuesday, 20 Jun 2023</td>
											</tr>
											<tr>
												<td>Your Reference ID</td>
												<td>:</td>
												<td>20230620035738ANGLESNO10254600</td>
											</tr>
										
											<tr>
												<td>Actual Fees</td>
												<td>:</td>
												<td>500</td>
											</tr>
										
											<tr>
												<td>CGST Amount</td>
												<td>:</td>
												<td>45 &nbsp; (9% GST)</td>
											</tr>
											<tr>
												<td>SGST Amount</td>
												<td>:</td>
												<td>45 &nbsp; (9% GST)</td>
											</tr>
												<tr><td>Amount paid</td>
												<td>:</td>
												<td>590.00</td>
											</tr>
											<tr>
												<td>Status</td>
												<td>:</td>
												<td style="color:#4BB543;">TXN_SUCCESS</td>
											</tr>
											<tr>
												<td>Bank Response</td>
												<td>:</td>
												<td style="color:#4BB543;">Txn Success</td>
											</tr>
											<tr>
												<td>Bank Transaction Id</td>
												<td>:</td>
												<td>17305322266</td>
											</tr>
											<tr>
												<td>Pay Mode</td>
												<td>:</td>
												<td>NB - State Bank of India</td>
											</tr>
											<tr>
												<td>Transaction Id</td>
												<td>:</td>
												<td>20230620011650000877944419150898106</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer_con"><!--footer_con Starts -->
		<?php
			 include "footer.php";
		?>
	</div><!--footer_con Ends -->
</div><!--Container Ends -->
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>