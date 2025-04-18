	
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
	success: "valid"
});


$(function(){
	$('.user_check').validate({
		rules:{
			role_select:{
				required: true,
			},			

			emp_level_select:{
				required: true,
			},

			user_name:{
				required: true,
			},

			user_fullname:{
				required: true,
			},

			user_pass:{
				required: true,
			},

			user_status: { 
			 	required: true,
			},

			user_mail:{
				required: true,
			},

			user_mobile:{
				required: true,
				number: true,
				minlength:10,
				maxlength:10
			},

			user_department:{
				required: true,
			},

			user_designation:{
				required: true,
			},
			
			user_branch: { 
			 	required: true,
			},
			 user_gender: { 
			 	required: true,
			},

			worker_type: { 
			 	required: true,
			}

			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/

			
			
		},
		messages:{
			role_select:{
				required: 'Select The Role'	
			},

			emp_level_select:{
				required: 'Select The Employee level',
			},

			

			user_name:{
				required: 'Please type your User Name'	
			},

			user_fullname:{
				required: 'Please type User full Name'
			},

			user_pass:{
				required: 'Please type Password'	
			},

			user_status: { 
			 	required: 'Select The User status',
			},

			user_mail:{
				required: 'Please enter the user mail id'	
			},

			user_mobile:{
				required: 'Please enter the Mobile Number',
				number: 'Number only allowed'
			},
			

			user_department:{
				required: 'Select the User department',
			},

			user_designation:{
				required: 'Select the User department',
			},
				
			 user_branch: { 
			 	required: 'Select the User branch'
			},

			user_gender: { 
			 	required: 'Select the User Gender'
			},

			worker_type: { 
			 	required: 'Please select your Worker Type',
			},

			

		}
	});
});

$(function(){
	$('.social_media_check').validate({
		rules:{
			social_select:{
				required: true,
			},
			media_title:{
				required: true,
			},
			media_content:{
				required: true,
			},
			sposted_date:{
				required: true,
				date:true,
			},
			media_image:{
				required: true,
			},
			media_link:{
				required: true,
			},
			social_status_select:{
				required: true,
			},
			screated_date:{
				required: true,
			},
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			social_select:{
				required: 'Select The Social Media'	
			},
			media_title:{
				required: 'Please type the media Title'	
			},
			media_content:{
				required: 'Please type the media Content'	
			},
			sposted_date:{
				required: 'Please enter the Media Posted Date',
			},
			media_image:{
				required: 'Please choose the Image',
			},
			media_link:{
				required: 'Please type the Media Link',
			},
			social_status_select:{
				required: 'Please select the Status',
			},
			screated_date:{
				required: 'Please enter the Media Created Date',
			},
		}
	});
});

$(function(){
	$('.media_blog_check').validate({

		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{
			doctor_select:{
				required: true,
			},

			media_link:{
				required: true,
			},

			spec_select:{
				required: true,
			},

			media_title:{
				required: true,
			},

			media_type:{
				required: true,
			},

			sposted_date:{
				required: true,
				date:true,
			},

			mediab_image:{
				required: true,
			},
			
			screated_date:{
				required: true,
			},
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			doctor_select:{
				required: 'Select The doctor'	
			},

			media_link:{
				required: 'Please type the media link'	
			},

			spec_select:{
				required: 'Select The Speciality'	
			},

			media_title:{
				required: 'Please type the media Title'	
			},

			media_type:{
				required: 'Please Select the media type',
			},
			sposted_date:{
				required: 'Please enter the Media Posted Date',
			},

			mediab_image:{
				required: 'Please choose the Image',
			},			
			screated_date:{
				required: 'Please enter the Media Created Date',
			},
		}
	});
});


$(function(){
	$('.specilities_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{
			social_select:{
				required: true,
			},
			media_content:{
				required: true,
			},
			email_id:{
				required: true,
			},
			mobile:{
				required: true,
			},
			meta_title:{
				required: true,
			},
			meta_description:{
				required: true,
			},
			meta_keyword:{
				required: true,
			},
			media_image_banner:{
				required: true,
			},
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			social_select:{
				required: 'Select The Social Media'	
			},
			media_content:{
				required: 'Speciality Content'	
			},
			email_id:{
				required: 'Please enter the email Id',
			},
			mobile:{
				required: 'Please type the Mobile Number'	
			},
			meta_title:{
				required: 'Please enter the Meta title',
			},
			meta_description:{
				required: 'Please choose the meta Description',
			},
			meta_keyword:{
				required: 'Please type the Meta Keyword',
			},
			media_image_banner:{
				required: 'Please select the Media Banner Image',
			}			
		}
	});
});

$(function(){
	$('.course_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{			
			
			email_id:{
				required: true,
			},
			mobile:{
				required: true,
				number: true,
				minlength:10,
				maxlength:10
			},
			
			
			overall_priority:{
				required: true,
			},

			dept_priority:{
				required: true,
			},

			

			
			meta_title:{
				required: true,
			},
			meta_description:{
				required: true,
			},
			meta_keyword:{
				required: true,
			},
			
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			
			email_id:{
				required: 'Please enter the email Id',
			},
			mobile:{
				required: 'Please enter the Mobile Number',
				number: 'Number only allowed'
			},	

			overall_priority:{
				required: 'Please enter the overall priority',
			},

			dept_priority:{
				required: 'Please enter the Department priority',
			},

			meta_title:{
				required: 'Please enter the Meta title',
			},
			meta_description:{
				required: 'Please choose the meta Description',
			},
			meta_keyword:{
				required: 'Please type the Meta Keyword',
			},
						
		}
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
			name:{
				required: true,
			},		
			
			email_id:{
				required: true,
				mail:true
			},
			mobile:{
				required: true,
				number: true,
				minlength:10,
				maxlength:10
			},
			course_discount:{				
				number: true,
				
			},
			pro_type:{				
				required: true,
				
			},
			
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			name:{
				required: 'Please enter the name',
			},	
			
			email_id:{
				required: 'Please enter the email Id',
				mail:'Please enter the valid email Id',
			},
			mobile:{
				required: 'Please enter the Mobile Number',
				number: 'Number only allowed'
			},	

			course_discount:{				
				number: 'Please enter the Dicount',
				
			},

			pro_type:{				
				required: 'Please Select the type',				
			},
						
		}
	});
});

$(function(){
	$('.course_fee_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{			
			
			course_fees:{
				required: true,
				number: true,
			},
			cate_type:{
				required: true,
			},

			price_type:{
				required: true,
			},
			fee_content:{
				required: true,
			},
			sposted_date:{
				required: true,
			},
			sexpiry_date:{
				required: true,
			},
			fee_status:{
				required: true,
			},
			
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			
			email_id:{
				required: 'Please enter the email Id',
			},
			mobile:{
				required: 'Please enter the Mobile Number',
				number: 'Number only allowed'
			},	

			overall_priority:{
				required: 'Please enter the overall priority',
			},

			dept_priority:{
				required: 'Please enter the Department priority',
			},

			meta_title:{
				required: 'Please enter the Meta title',
			},
			meta_description:{
				required: 'Please choose the meta Description',
			},
			meta_keyword:{
				required: 'Please type the Meta Keyword',
			},
						
		}
	});
});

$(function(){
	$('.course_batch_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{			
			
			batch_name:{
				required: true,
			},
			batch_content:{
				required: true,
			},

			sbatch_mode:{
				required: true,
			},
			sStartTime:{
				required: true,
			},
			sEndTime:{
				required: true,
			},
			seat_count:{
				required: true,
				number: true,
			},
			ssession_c:{
				required: true,
			},

			patient_take:{
				required: true,
			},

			dura_hrs:{
				required: true,
				number: true,
			},

			dura_days:{
				required: true,
				number: true,
			},

			dura_mnt:{
				required: true,
				number: true,
			},

			scourse_level:{
				required: true,
			},

			smodeofTraining:{
				required: true,
			},

			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			
			batch_name:{
				required: "Please type batch name",
			},
			batch_content:{
				required: "Batch Description",
			},

			sbatch_mode:{
				required: "Please select batch mode",
			},
			sStartTime:{
				required: "Batch Start Time",
			},
			sEndTime:{
				required: "batch end Time",
			},
			seat_count:{
				required: "batch seat count",
			},
			ssession_c:{
				required:"Please select the batch Session",
			},

			patient_take:{
				required: "Please select the batch days",
			},

			dura_hrs:{
				required: "Duration in hours",
			},

			dura_days:{
				required: "Duration in days",
			},

			dura_mnt:{
				required: "Duration in Months",
			},

			scourse_level:{
				required: "Please select the Course Level",
			},

			smodeofTraining:{
				required: "Please select the Mode of Taining",
			},
						
		}
	});
});

$(function(){
	$('.course_descrip_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{			
			
			descrip_type:{
				required: true,
			},
			post_type:{
				required: true,
			},

			product_descrip:{
				required: true,
			},
			descrip_status:{
				required: true,
			},
			
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			
			descrip_type:{
				required: "Please select Description Type",
			},
			post_type:{
				required: "Please Select Post Type",
			},

			product_descrip:{
				required: "Please type the description",
			},
			descrip_status:{
				required: "Please select the status",
			},
						
		}
	});
});

$(function(){
	$('.course_level_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{			
			
			descrip_type:{
				required: true,
			},
			post_type:{
				required: true,
			},

			product_descrip:{
				required: true,
			},
			descrip_status:{
				required: true,
			},
			
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			
			descrip_type:{
				required: "Please select Description Type",
			},
			post_type:{
				required: "Please Select Post Type",
			},

			product_descrip:{
				required: "Please type the description",
			},
			descrip_status:{
				required: "Please select the status",
			},
						
		}
	});
});

$(function(){
	$('.batch_mapping_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{			
			
			
			sposted_date:{
				required: true,
			},
			sexpiry_date:{
				required: true,
			},
			descrip_status:{
				required: true,
			},
			
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			
			
			descrip_status:{
				required: "Please select the status",
			},
						
		}
	});
});


$(function(){
	$('.location_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{
			categories_g:{
				required: true,
			},
			location_country:{
				required: true,
			},
			location_state:{
				required: true,
			},
			location_city:{
				required: true,
			},
			location_area:{
				required: true,
			},
			doctor_specility:{
				required: true,
			},
			doctor_facility:{
				required: true,
			},
			doctor_location_id:{
				required: true,
			},
			location_server:{
				required: true,
			}

			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			social_select:{
				required: 'Select The Social Media'	
			},
			media_content:{
				required: 'Speciality Content'	
			},
			email_id:{
				required: 'Please enter the email Id',
			},
			mobile:{
				required: 'Please type the Mobile Number'	
			},
			meta_title:{
				required: 'Please enter the Meta title',
			},
			meta_description:{
				required: 'Please choose the meta Description',
			},
			meta_keyword:{
				required: 'Please type the Meta Keyword',
			},
			media_image_banner:{
				required: 'Please select the Media Banner Image',
			}			
		}
	});
});


$(function(){
	$('.package_check').validate({
		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{
			
			media_content:{
				required: true,
			},
			patient_gender:{
				required: true,
			},
			pack_inter_id:{
				required: true,
			},
			
			package_incode:{
				required: true,
			},
			package_tag:{
				required: true,
			},
			
			package_rate:{
				required: true,
			},

			sStartTime:{
				required: true,
			},

			sEndTime:{
				required: true,
			},


			doctor_specility:{
				required: true,
			},

			package_guideline:{
				required: true,
			},

		
			
			media_image_banner:{
				required: true,
			},
			/*user_image: { 
			 	required: true,
			 	extension: "docx|rtf|doc|pdf",
			 	filesize:2
			},*/
		},
		messages:{
			media_content:{
				required: 'Package Content'	
			},
			patient_gender:{
				required: 'Please enter the patient Gender',
			},
			pack_inter_id:{
				required: 'Please type the Internal Id'	
			},
			package_incode:{
				required: 'Please type the internal Code',
			},
			package_tag:{
				required: 'Please type the tag',
			},

			package_rate:{
				required: 'Please type the Package Rate',
			},

			sStartTime:{
				required: 'Please Select Starts Time',
			},

			sEndTime:{
				required: 'Please Select Ends Time',
			},

			doctor_specility:{
				required: 'Please type the speciality',
			},

			package_guideline:{
				required: 'Please type the package Guideline',
			},

			media_image_banner:{
				required: 'Please select the Media Banner Image',
			}			
		}
	});
});





