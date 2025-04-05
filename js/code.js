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
