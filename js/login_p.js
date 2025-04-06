$(function(){		

		$.validator.addMethod( "mail", function( value, element ) {
			return this.optional(element) || /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value);
		}, "Please enter a valid email address." );

		$.validator.addMethod( "whitespace", function( value, element ) {
			return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );
		}, "symbols not allowed" );
		
		jQuery.validator.addMethod("notEqual", function(value, element, param) {
			return this.optional(element) || value != $(param).val();
		}, "Another number");

		jQuery.validator.addMethod("EqualTo", function(value, element, param) {
			return this.optional(element) || value == $(param).val();
		}, "Another number");
		
		$.validator.addMethod("endGreaterThanBegin", function(value, element, param) {
    		return this.optional(element) || value > $(param).val();
		}, "Given Year Must Be Greater Than Previous Year");
		/*$.validator.addMethod("valueNotEquals", function(value, element, arg){
  			return arg != value;
 		}, "Value must not equal arg.");*/
		$.validator.addMethod('filesize', function (value, element, param) {
		    return this.optional(element) || (element.files[0].size <= param * 1000000)
		}, 'File size must be less than {0} MB');

		jQuery.validator.addMethod("zipcode", function(value, element) {
		  return this.optional(element) || /^[1-9][0-9]{5}$/.test(value);
		}, "Please provide a valid zipcode.");

		$.validator.addMethod("greaterThan", function( value, element, param ) {
	    	return this.optional( element ) || value > param;
		}, "The value must be greater than {0}")
	
});


function verify_mob_num(){
	
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
    //var patient_gender_pt = document.getElementById('gender').options[document.getElementById('gender').selectedIndex].text;
    login_verify();
    

    if($('.login_feild').valid() == true){
    	$('.login_form .form_spinner').css({"display":"block"});
    	//alert(mobileNumber);
    	$.ajax({
            url:"ajax/portal/login_check.php",
            type:'post',
            data:{
                username:username,    
                password:password,               
            },
            success:function(result){      
              $('.login_form .form_spinner').css({"display":"none"});         
              $('.container .login_portal .login_form .form_head .form_ajax').html(result);
              /*alert(result);
              if(result == 'correct'){
                window.location.href = "http://192.168.0.34/kmh_new_v1/patient_portal.php";
              }*/
              	re = result.trim();
	          	if(re == 'valid'){
	              	//window.location.href = "http://192.168.0.34/kmh_new_v1/patient_portal.php";     
	              	//response = await fetch(window.history.go(-2));       
	              	//window.history.go(-1);
	              	lastPageUrl = document.referrer
					//alert(lastPageUrl);
	              	window.location.href = lastPageUrl;
	              	//console.log(`Last visited page URL is ${lastPageUrl}`)
	              	
	            }
            }
        });
    }
}

function sign_up(){
	/*var genders = document.getElementById('gender').value;
    var patient_gender_pt = document.getElementById('gender').options[document.getElementById('gender').selectedIndex].text;*/
    var patname = document.getElementById('name').value;
	/*var patdoblogin = document.getElementById('date_of_birth').value;*/
	var patmobile = document.getElementById('mobile_number').value;
	var patemail = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	/*var patgender = document.getElementById('gender').value;
	var patgender_id = document.getElementById('gender_id').value;*/
	//var patgender_name = document.getElementById('patgender').options[document.getElementById('patgender').selectedIndex].text;
    //alert(patgender + " " + patgender_id+ " " +patname + " " +patdoblogin+ " " +patmobile+ " " +patemail )
    login_verify();    

    if($('.login_feild').valid() == true){
    	$('.login_form .form_spinner').css({"display":"block"});
    	login_verify();
    	$.ajax({
            url:"ajax/portal/sign_insert.php",
            type:'post',
            data:{
                patName:patname,
                patMobile:patmobile,
                patEmail:patemail,
                password:password
            },
            success:function(result){  
             	$('.login_form .form_spinner').css({"display":"none"});  
             	$('.container .login_portal .login_form .form_head .form_ajax').html(result);
              	re = result.trim()
              	if(re == 'valid'){
	              	//window.location.href = "http://192.168.0.34/kmh_new_v1/patient_portal.php";            
	              	window.history.go(-1);
	            }

             /* setTimeout(function() {
                //$('.booking_fixed').css({"display":"none"});
                 $('.booking_overlay').css({"display":"none"});
              }, 10000);*/
            }
        }); 
    }
}

function forRegisteration(){
  //alert();
  $('.login_form .form_spinner').css({"display":"block"});
  $.ajax({
        url:"ajax/portal/sign_up.php",
        type:'post',          
        
        success:function(result){         
          $('.login_form .form_spinner').css({"display":"none"});
          $('.container .login_portal .login_form .form_head .form_ajax').html(result);
        } 
      });
}

function forLogin(){
  //alert();
  $('.login_form .form_spinner').css({"display":"block"});
    $.ajax({
        url:"ajax/portal/login_page.php",
        type:'post',  
        success:function(result){         
          $('.login_form .form_spinner').css({"display":"none"});
          $('.container .login_portal .login_form .form_head .form_ajax').html(result);
        } 
    });
}


login_verify();
function login_verify(){
	$(function(){
		$('.login_feild').validate({
			 
			onfocusin: function (element) {
			    $(element).valid();
			  },

			  onfocusout: function (element) {
			    $(element).valid();
			  },
			 
			rules:{	
				name:{
					required: true,		
				},

				username:{
					required: true,	
				},

				mobile_number:{
					required: true,
					number: true,
					minlength:10,
					maxlength:10,				
				},

				password:{
					required: true,			
				},

				confirm_password:{
					required: true,	
					EqualTo: '#password',		
				},
				
				date_of_birth:{
					required:true,
				},

				pat_otp:{
					required: true,
					number: true,
					minlength:6,
					maxlength:6,	
				},

				email:{
					required: true,
					mail:true
				},

				gender:{
					required: true,
				},

				pat_otps:{
					required: true,
					number: true,
					minlength:12,
					maxlength:12,
				},

				mobile_agree: { // <- NAME of every radio in the same group
	                required: true
	            },

				sign_agree: { // <- NAME of every radio in the same group
	                required: true
	            },
	            card_agree: { // <- NAME of every radio in the same group
	                required: true
	            },


				/*
				 "hiddengrecaptcha": {
		              required: function() {
		                    if (grecaptcha.getResponse() == '') {
		                        return true;
		                    } else {
		                        return false;
		                    }
		            	}
		        	}*/
				
			},
			messages:{
				name:{
					required:'Type your name',
				},

				username:{
					required: 'Please enter email or mobile number',	
				},
				mobile_number:{
					required: 'Please enter the Mobile Number',
					number: 'Number only allowed'
				},

				password:{
					required: "Please enter your password",			
				},

				confirm_password:{
					required: "Please enter your Confirm password",	
					EqualTo:"Not Match",		
				},

				date_of_birth:{
					required: 'Please select the date of birth'	
				},
				pat_otp:{
					required: 'Please enter the OTP Number',
					minlength:'Please enter 6 digit OTP',
				},
				email:{
					required: 'Please enter your mail id'	
				},
				gender:{
					required: 'Please Select the gender',
				},

				pat_otps:{
					required: 'Please enter the Aadhar Number',
					number: 'Number only allowed'
				},
				mobile_agree:{
					required: 'select the terms and conditions',
				},
				sign_agree: { 
	                required: 'select the terms and conditions',
	            },
	            card_agree: { // <- NAME of every radio in the same group
	                required: 'select the terms and conditions'
	            },
			},
		});
	});
}

$(document).on("click",".form_feild .login_feild .feild .feild_box .gender_drop_head",function(){	
	$('.form_feild .login_feild .feild .feild_box .gender_drop').slideToggle();
});

$(document).on("click",".form_feild .login_feild .feild .feild_box .gender_drop ul li",function(){	
	var gender = $(this).html();
	var gender_id = $(this).attr('gender');
	$('.form_feild .login_feild .feild .feild_box .gender_drop_head').val(gender);
	$('.form_feild .login_feild .feild .feild_box .gender_id').val(gender_id);
	$('.form_feild .login_feild .feild .feild_box .gender_drop').slideUp();
	$('.gender_drop_head').valid();

});

$(document).on("click","body",function(){	
	$('.form_feild .login_feild .feild .feild_box .gender_drop').slideUp();
});

$(document).on("click",".form_feild .login_feild .feild .feild_box .gender_drop_head",function(e){	
	e.stopPropagation();
});