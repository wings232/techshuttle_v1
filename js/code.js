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