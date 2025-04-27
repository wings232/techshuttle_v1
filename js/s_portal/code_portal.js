$(document).on("click",".stud_portal .leftside_bar .sidebar_button",function(){
	
	if($(this).attr("assign") == 0){
		$(this).parent().animate({"left":"0"});
		$(this).attr("assign","1") ;
		//$('.patient_portal .leftside_bar .sidebar_button i').css({"transform":"rotate(-180deg)"});
		$('.stud_portal .leftside_bar .sidebar_button i').animate(
			{deg:180},
			{
		      duration: 700,
		      step: function(now) {
		        $(this).css({ transform: 'rotate(' + now + 'deg)' });
		      }
		    }
		);
	}else{
		$(this).parent().animate({"left":"-320px"});
		$(this).attr("assign","0") ;
		$('.stud_portal .leftside_bar .sidebar_button i').animate(
			{deg:0},
			{
		      duration: 700,
		      step: function(now) {
		        $(this).css({ transform: 'rotate(' + now + 'deg)' });
		      }
		    }
		);
	}
	
		
});

function leaf(pages){  
	
	
	if(pages != '#'){
		$('.leftside_bar .left_side .user_menu .user_li > ul > li').css({"pointer-events":"none"});
		$('.header .logo_nav .nav .nav_menu .nav_option > ul > li').css({"pointer-events":"none"});
	  $('.stud_portal .rightside_bar .right_side .spinners').css({"display":"block"});
	  var customPaggiOffset = $(".stud_portal .rightside_bar ").offset().top;
	    		$('html, body').animate({ scrollTop: '' + (customPaggiOffset - 250) + 'px' }, 800);
	  $('.stud_portal .rightside_bar .right_side .right_ajax').html("");
	  $('.stud_portal .leftside_bar').animate({"left":"-320px"});
	  $('.stud_portal .leftside_bar .sidebar_button').attr("assign","0");  
	  $('.stud_portal .leftside_bar .sidebar_button i').animate(
				{deg:0},
				{
			      duration: 700,
			      step: function(now) {
			        $(this).css({ transform: 'rotate(' + now + 'deg)' });
			      }
			    }
			);
	  
	  
	  
	  $.ajax({
	        url:"ajax/dashboard/"+pages+".php",
	        type:'post',          
	        
	        success:function(result){         
	          //$('.login_form_con .login_ajax').css({"display":"none"});
	          $('.stud_portal .rightside_bar .right_side .right_ajax').html(result);
	          $('.stud_portal .rightside_bar .right_side .spinners').css({"display":"none"});
	          $('.leftside_bar .left_side .user_menu .user_li > ul > li').css({"pointer-events":"auto"});
	          //$('.header .logo_nav .nav .nav_menu .nav_option > ul > li').css({"pointer-events":"auto"});
	          //toloads();
	          
	         
	        } 
	      });
	}

}

function leaflog(pages){  
  
  $('.stud_portal .leftside_bar').animate({"left":"-320px"});
  $('.stud_portal .leftside_bar .sidebar_button').attr("assign","0");
  $('.stud_portal .leftside_bar .sidebar_button i').animate(
			{deg:0},
			{
		      duration: 700,
		      step: function(now) {
		        $(this).css({ transform: 'rotate(' + now + 'deg)' });
		      }
		    }
		);
  
  
  
  $.ajax({
        url:"ajax/patient_portal/"+pages+".php",
        type:'post',          
        
        success:function(result){         
          //$('.login_form_con .login_ajax').css({"display":"none"});
          window.location.href = "http://192.168.0.34/studies/techshuttle";
        } 
      });
}

$(document).on("click",".leftside_bar .left_side .user_menu .user_li > ul > li .slides",function(){
	//alert();
	$('.leftside_bar .left_side .user_menu .user_li > ul > li .leaf_drop').slideUp();
	$('.leaf_drop ul li').removeClass('a');
	if($(this).next(".leaf_drop").is(":hidden") == true){
		$(this).next(".leaf_drop").slideDown("slow");					
	}
	$(this).addClass('user_active');
	$(this).parent().siblings().children().removeClass('user_active');
});

$(document).on("click",".leaf_drop ul li",function(){
	$(this).addClass('a').siblings().removeClass('a');
});

$(document).on("click",".right_side .profile_list .profile_set .orders_con .order_list ul li .col_five",function(){
    $(this).next('.right_side .profile_list .profile_set .orders_con .order_list ul li .sum_list').slideToggle();    
});