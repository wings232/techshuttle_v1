<?php
	include "check_ses_list.php";
	include "dbconn.php";
	include_once "func_templates/func_code.php";
	include "constantconfig.php";
	if($user_session == ""){
		//header("Location:index.php");
	}	
	
?>
<!DOCTYPE html>
<html>
<head>
<base href='<?php echo $baseUrl; ?>' > 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techshuttle | Home</title>    
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/root.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fonts.css"/>    
    <link rel="stylesheet" href="css/animation.css"/> 
    <link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/gateway/choose_pay.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
	<script src='js/jquery.validate.js'></script>
    <script src='js/additional-methods.min.js'></script>
    <!-- <script src='js/page_valid.js'></script> -->
	
    <script type="text/javascript" src="js/tech_valid.js"></script>
</head>
<body>
<div class="container"><!--Container Starts -->
<div class='header_con'><!--header_con Starts -->
		<?php include "header.php"; ?>
	</div><!--header_con Ends -->   
	<div class="choose_gateway_con"><!--choose_gateway_con Starts -->
		<div class="choose_gateway_center"><!--choose_gateway_center Starts -->
			<div class="choose_gateway"><!--choose_gateway Starts -->
				<div class="gateway_head">
					<div class="head">
						Choose Your Payment Gateway
					</div>
				</div>
				<div class="gateway_para">
					<div class="gateway_image">
						<div class="image">
							<img src="images/icons/Mobile_ payments_pana.png"/>
						</div>
					</div>
					<div class="gate_split">
						<div class="gateway_c">
							<div class="gate_con">
								<p>
									
									UPI is a new mobile-first payment mode for making payments to friends or businesses. techshuttle was the first in the industry to bring UPI payments to merchants. Accept UPI payments without writing any additional code.
			 					</p>
								<p>
									
									Accept payments from all major credit and debit card networks like Visa, Mastercard, American Express and RuPay. And now also accept international card payments from customers in various countries including US, Europe, South East Asia etc.
			 					</p>
			 					<p>
			 						With Techshuttle Checkout,  your customers can save their card details and use them for future payments.
			 					</p>
			 					<p>
			 						Make your products more affordable by reducing the upfront payment amount. Available across 12+ banks.
			 					</p>
			 					<p>
			 						Make your products more affordable for India’s masses. Enable access to EMIs for Debit card users and increase penetration across Tier 2 and Tier 3 towns.
			 					</p>
			 					<p>
			 						100% Digital EMIs, no need of Credit or Debit cards. Enable access to EMIs for a large segment of consumers,who do not have access to a credit card
			 					</p>
			 				</div>
						</div>
					</div>					
				</div>

				<div class="gateway_table">
					<div class="gateway_left">
						<div class="left_head">
							<div class="head">
								Features
							</div>
						</div>
						<div class="feature_list">
							<ul>
								<li>
									<div class="columns">
										<div class="col_content">
											Credit card
										</div>
									</div>
								</li>
								<li>
									<div class="columns">
										<div class="col_content">
											Debit card
										</div>
									</div>
								</li>
								<li>
									<div class="columns">
										<div class="col_content">
											Net banking
										</div>
									</div>
								</li>
								<li>
									<div class="columns">
										<div class="col_content">
											Prepaid
										</div>
									</div>
								</li>
								<li>
									<div class="columns">
										<div class="col_content">
											Banking EMI
										</div>
									</div>
								</li>
								<li>
									<div class="columns">
										<div class="col_content">
											UPI
										</div>
									</div>
								</li>
								<li>
									<div class="columns">
										<div class="col_content">
											-
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="gateway_right">
						<div class="left_head">
							<div class="head">
								Payment Gateways
							</div>
						</div>
						<div class="gateway_list">
							<ul>
								<li>
									<div class="column_con">
										<div class="columns">
											<div class="col_content">
												Razor Pay
											</div>
										</div>
										<div class="columns">
											<div class="col_content">
												Stripe  
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="column_con">
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="column_con">
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="column_con">
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="column_con">
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="column_con">
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-times-circle-o" aria-hidden="true"></i>
											</div>
										</div>
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-times-circle-o" aria-hidden="true"></i>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="column_con">
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
										<div class="columns">
											<div class="col_content">
												<i class="fa fa-check-circle-o"></i>
											</div>
										</div>
									</div>
								</li>

								<li>
									<div class="column_con">

										<div class="columns">
											<div class="col_content">
												<!-- <input type="radio" name="gateway" onclick="user_select('razor')"/> Razor pay
												<label><span></span></label>
												<div class="bullet">
													<div class="line zero"></div>
													<div class="line one"></div>
													<div class="line two"></div>
													<div class="line three"></div>
													<div class="line four"></div>
													<div class="line five"></div>
													<div class="line six"></div>
													<div class="line seven"></div>
												</div> -->
												<div class="razor_button">
													<?php 
														include "ajax/razor/pay_tech.php";
													?>
												</div>
											</div>
										</div>
										<!-- <div class="columns">
											<div class="col_content">
												<input type="radio" name="gateway" onclick="user_select('ccavenue')"/> CCavenue
												<label><span></span></label>
												<div class="bullet">
													<div class="line zero"></div>
													<div class="line one"></div>
													<div class="line two"></div>
													<div class="line three"></div>
													<div class="line four"></div>
													<div class="line five"></div>
													<div class="line six"></div>
													<div class="line seven"></div>
												</div>
											</div>
										</div> -->
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div><!--choose_gateway Ends -->
		</div><!--choose_gateway_center Ends -->
	</div><!--choose_gateway_con Ends -->
	
	<div class="footer_con"><!--footer_con Starts -->
		<?php
			// include "footer.php";
		?>
	</div><!--footer_con Ends -->
</div><!--Container Ends -->
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/validate_page.js"></script>

