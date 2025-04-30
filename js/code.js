$(document).ready(function(){
	//alert()
	$('.cate_m .tech_menu .cate_sub > ul > li:not(:first) .sub_cate').hide();
});

$(document).on("mouseenter",".header .logo_search .cate_m",function(){ 	//alert();
    //$(this).parent().hide();
    if ($(window).width() > 943) {
	    $(this).children(".tech_menu").stop(true, false).fadeIn(150);
        $('.header .logo_search .overlay').stop(true, false).fadeIn(150);
		$('.cate_m .tech_menu .cate_sub > ul > li:first-child .sub_cate').show();
        //e.preventDefault();
	}
});

 
$(document).on("click",".header .logo_search .overlay",function(){ 	//alert();
    //$(this).parent().hide();
    //if ($(window).width() <= 943) {
		$(".tech_menu").stop(true, false).fadeOut(150);
        $(this).stop(true, false).fadeOut(150);
	    //$(".sub_cate").hide();
	      //e.preventDefault();
	//}
});

$(document).on("mouseleave",".header .logo_search .cate_m",function(){ 	//alert();
    //$(this).parent().hide();
    if ($(window).width() > 943) {
	    $(this).children(".tech_menu").stop(true, false).fadeOut(150);
        $('.header .logo_search .overlay').stop(true, false).fadeOut(150);
	      //e.preventDefault();
	}
});

$(document).on("mouseenter",".cate_m .tech_menu .cate_sub > ul > li",function(){ 	//alert();
    //$(this).parent().hide();
    if ($(window).width() > 943) {
	    $(this).children(".sub_cate").stop(true, false).fadeIn(150);
	     // e.preventDefault();
	}
});

$(document).on("mouseleave",".cate_m .tech_menu .cate_sub > ul > li",function(){ 	//alert();
    //$(this).parent().hide();
    if ($(window).width() > 943) {
	    $(this).children(".sub_cate").stop(true, false).fadeOut(150);
		$('.cate_m .tech_menu .cate_sub > ul > li:first-child .sub_cate').show();
	      //e.preventDefault();
	}
});

 
$(document).on("click",".header .logo_search .cate_m",function(){ 	//alert();
    //$(this).parent().hide();
    if ($(window).width() <= 943) {
	    $(this).children(".tech_menu").stop(true, false).fadeToggle(150);
	    //$(".sub_cate").hide();
	      //e.preventDefault();
	}
});

$(document).on("click",".cate_m .tech_menu .cate_sub > ul > li",function(ev){ 	//alert();
    //$(this).parent().hide();
    if ($(window).width() <= 943) {
	    $(this).children(".sub_cate").stop(true, false).fadeToggle(150);
	    $(this).siblings().children(".sub_cate").hide();
	     // e.preventDefault();
	     ev.stopImmediatePropagation();
    	//ev.preventDefault();
	}
});

$(document).on("click",".course_batch_list .batch_row .row_n > ul > li .new_button",function(){
    $('.course_batch_list .batch_row .row_n > ul .batch_det').slideUp();
   	if($(this).parent().next().is(':hidden') == true){
   		$(this).parent().next().slideDown(200);
   	}    
});
/* $(document).on("click",".acnav__label",function(){ 

	var label = $(this);
	var parent = label.parent('.has-children');
	var list = label.siblings('.acnav__list');

	if ( parent.hasClass('is-open') ) {
		list.slideUp('fast');
		parent.removeClass('is-open');
	}
	else {
		list.slideDown('fast');
		parent.addClass('is-open');
	}
}); */

$(document).on("click",".acnav__label",function(){ 
	var label = $(this);
	var parent = label.parent('.has-children');
	var list = label.siblings('.acnav__list');
	$(this).parent().siblings().children().next().slideUp();
	$(this).parent().removeClass('is-open');
	$(this).next().slideToggle();
	parent.siblings().attr('new','0');
	//$(this).parent().next().slideUp();
	if($(this).next().is(":hidden") == true){
		$(this).next().slideDown();		
	}

	
	
	if(parent.hasClass('is-open') == false){
		parent.addClass('is-open');
		parent.attr('new','1');
		parent.siblings().removeClass('is-open');
	}

	/* if(parent.hasClass('is-open') == true){
		parent.removeClass('is-open');
	} */

	
	/* if ( parent.hasClass('is-open') ) {
		list.slideUp('fast');
		parent.removeClass('is-open');
	}
	else {
		list.slideDown('fast');
		parent.addClass('is-open');
	} */
});

$(document).on("click",".header .logo_search .login .login_b .login_tabs",function(){
        //$(this).parent().hide();
        /*$('.login_tab').css({"display":"block"});
        $('.login_overlay').css({"display":"block"});*/
        window.location.href ="student_portal.php";
});

$(document).on("click",".course_content .course_right .border_bar .button .enroll_login",function(){
	$(this).next().slideToggle(200);
});

$(document).ready(function(){
	/*if($('.batch_c').is(':checked') ){
	    $('.enroll_admission').addClass('batch_mapped');
	}

	$('.batch_c').click(function(){
		$('.enroll_admission').addClass('batch_mapped');
		$('.float_batch').css({'display':'none'});
	});*/
	$('.enroll_admission').click(function(){
			window.location.href ="admission_form.php";
		//if($('.batch_c').is(':checked') ){
		    // var batch_map_id = document.querySelector('input[name="user"]:checked').value;
		    // var price_id_ilt = document.getElementById('price_id_ilt').value;
		    // var price_id_key = $(this).attr('key');
		    // var price_id_slv = document.getElementById('price_id_slv').value;
		    // var course_ids = document.getElementById('course_ids').value;
			// //alert(name + "-" + price_id_ilt + "-" + price_id_key );
			// $.ajax({
		    // 	url:'ajax/portal/adms_form.php',
		    //     type:'post',
		    //     data:{
			//         	batch_map_id:batch_map_id,
			//         	price_id_ilt:price_id_ilt,
			//         	course_ids:course_ids,
			//         	price_id_slv:price_id_slv,
			//         	price_id_key:price_id_key,
			//         },
		    //     success:function(result){
		    //       //$(".right_container .levels_create").show();
		    //       //$('.levels_create').html(result);
		    //       //levels_create_center();
		    //       //close_but();
		    //       //alert(result);
		    //       
		    //     }
			// });
		//}else{
			//$(this).next('.float_batch').css({'display':'block'});
			//$(this).next('.float_batch').html('Please Select the batch');
		//}
	});
	/*$(document).on("click",".batch_mapped",function(){
    	
	});*/
});

$(document).on("click",".sum_leftside .product_list .list_content ul li .img_list .image_button",function(){
    $(this).next('.sum_leftside .product_list .list_content ul li .img_list .sum_list').slideToggle();    
});


$(document).on("click",".course_center .course_sam .cour_left .button .feild_b .box_feild:first-child input",function(){
	//var list_id = $(this).attr('href');							
	$('html, body').animate({
		scrollTop: $('.product_details_con .product_leftbar .product_det .mat_enquiry').offset().top - 180
	}, 1000);
});



$(document).on("click",".common_form .close_button",function(){
	$('.enquiry_form').hide();
});