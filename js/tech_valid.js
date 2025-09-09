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

jQuery.validator.setDefaults({
    debug: true,
    success: "valid",
    ignore: ".ignoreThisClass"
});

function enq_form(type,course,course_type){
    document.getElementById('type').value = type;
    document.getElementById('course_name').value = course;
    document.getElementById('course_type').value = course_type;
    $('.enquiry_form').show();
}

function contact_form(){
	var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var c_val = document.getElementById('c_val').innerHTML;
    var country_code = document.getElementById('c_c').options[document.getElementById('c_c').selectedIndex].text;
    var mobile = document.getElementById('mobile').value;
    var message = document.getElementById('message').value;
    var course = document.getElementById('course_name').value;;
    var course_type = document.getElementById('course_type').value;;
    //var patient_gender_pt = document.getElementById('c_c').options[document.getElementById('c_c').selectedIndex].text;*/
    
    //alert(patgender + " " + patgender_id+ " " +patname + " " +patdoblogin+ " " +patmobile+ " " +patemail )
    //login_verify();    

    if($('.enquiries').valid() == true){
    	$('.common_form .input_box .spinner').css({"display":"block"});
    	//login_verify();
    	$.ajax({
            url:"ajax/portal/enq_submit.php",
            type:'post',
            data:{
                name:name,
                email:email,
                mobile:mobile,
                phone_code:c_val,
                country_code:country_code,
                message:message,
                course:course,
                course_type:course_type
            },
            success:function(result){  
             	$('.common_form .input_box .spinner').css({"display":"none"});  
                $('.common_form .input_box .result').show();
             	$('.common_form .input_box .result').html(result);
              	//re = result.trim()
              	// if(re == 'valid'){
	            //   	//window.location.href = "http://192.168.0.34/kmh_new_v1/patient_portal.php";            
	            //   	window.history.go(-1);
	            // }

             /* setTimeout(function() {
                //$('.booking_fixed').css({"display":"none"});
                 $('.booking_overlay').css({"display":"none"});
              }, 10000);*/
            }
        }); 
    }
}

function contact_form_open(){
	var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var c_val = document.getElementById('c_val').innerHTML;
    var country_code = document.getElementById('c_c').options[document.getElementById('c_c').selectedIndex].text;
    var mobile = document.getElementById('mobile').value;
    var message = document.getElementById('message').value;
    var course = document.getElementById('course_name').value;;
    var course_type = document.getElementById('course_type').value;;
    //var patient_gender_pt = document.getElementById('c_c').options[document.getElementById('c_c').selectedIndex].text;*/
    
    //alert(patgender + " " + patgender_id+ " " +patname + " " +patdoblogin+ " " +patmobile+ " " +patemail )
    //login_verify();    

    if($('.enquiries_form').valid() == true){
    	$('.common_form .input_box .spinner').css({"display":"block"});
    	//login_verify();
    	$.ajax({
            url:"ajax/portal/enq_submit.php",
            type:'post',
            data:{
                name:name,
                email:email,
                mobile:mobile,
                phone_code:c_val,
                country_code:country_code,
                message:message,
                course:course,
                course_type:course_type
            },
            success:function(result){  
             	$('.common_form .input_box .spinner').css({"display":"none"});  
                $('.common_form .input_box .result').show();
             	$('.common_form .input_box .result').html(result);
              	//re = result.trim()
              	// if(re == 'valid'){
	            //   	//window.location.href = "http://192.168.0.34/kmh_new_v1/patient_portal.php";            
	            //   	window.history.go(-1);
	            // }

             /* setTimeout(function() {
                //$('.booking_fixed').css({"display":"none"});
                 $('.booking_overlay').css({"display":"none"});
              }, 10000);*/
            }
        }); 
    }
}



function getPhoneCode(){
    var country_code = document.getElementById('c_c').value;
    $('.common_form .input_box .feild_b .box_feild .cty_code .c_val').html(country_code);      
}

function getPhoneCodeForm(){
    var country_code = document.getElementById('c_cf').value;
    $('.common_form_one .input_box .feild_b .box_feild .cty_code .c_val').html(country_code);      
}

$(function(){
    $('.enquiries').validate({
         
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

            mobile:{
                required: true,
                number: true,
                minlength:10,
                maxlength:10,				
            },            

            email:{
                required: true,
                mail:true
            },

            message:{
                required: true,
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
           
            mobile:{
                required: 'Please enter the Mobile Number',
                number: 'Number only allowed'
            },

            email:{
                required: 'Please enter your mail id'	
            },

            message:{
                required: 'Please enter your message',
            },
           
        },
    });
});

$(function(){
    $('.enquiries_form').validate({
         
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

            mobile:{
                required: true,
                number: true,
                minlength:10,
                maxlength:10,				
            },            

            email:{
                required: true,
                mail:true
            },

            message:{
                required: true,
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
           
            mobile:{
                required: 'Please enter the Mobile Number',
                number: 'Number only allowed'
            },

            email:{
                required: 'Please enter your mail id'	
            },

            message:{
                required: 'Please enter your message',
            },
           
        },
    });
});

$(function(){
	$('.admission_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{	
			names_admin:{
				required: true,
			},		
			
			email_id:{
				required: true,
				mail:true
			},
			mobile_no:{
				required: true,
				number: true,
				minlength:10,
				maxlength:10
			},
			address_proof:{				
				required: true,				
			},
			address:{				
				required: true,				
			},
            city:{				
				required: true,				
			},
            state:{				
				required: true,				
			},
            country:{				
				required: true,				
			},

            pincode:{				
				required: true,
                number: true,
				zipcode:true,
			},
			
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			names_admin:{
				required: 'Please enter the name',
			},	
			
			email_id:{
				required: 'Please enter the email Id',
				mail:'Please enter the valid email Id',
			},
			mobile_no:{
				required: 'Please enter the Mobile Number',
				number: 'Number only allowed'
			},	

			address_proof:{				
				required: 'Please Select the Proof',				
			},
			address:{				
				required: 'Please enter your address',				
			},
            city:{				
				required: 'Enter your city',				
			},
            state:{				
				required: 'Enter your state',				
			},
            country:{				
				required: 'Enter your Country',				
			},

            pincode:{				
				required: 'type your pincode',
                number: 'Numbers only allowed',
			},
						
		}
	});
});