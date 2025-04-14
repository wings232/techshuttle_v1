$(window).resize(function(){
    book_appointment();
});

book_appointment();

function book_appointment(){
    var popp = $('.login_center');
    var top = ($(window).height() - popp.outerHeight()) / 2;
    //var top = "12%";
    var left = ($(window).width() - popp.outerWidth()) / 2;
    var topa;
    popp.css({'margin-top':top, 'margin-left':left});   
}


$(document).on("click",".set > .set_one",function(){
  
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this)
        .siblings(".content")
        .slideUp(200);
      //$(".set > .set_one i").removeClass("fa-minus").addClass("fa-plus");
      $(".set > .set_one i").removeClass("minus_dashb").addClass("plus_dashb");
    } else {
      $(".set > .set_one i")
        .removeClass("minus_dashb")
        .addClass("plus_dashb");
      $(this)
        .find("i")
        .removeClass("plus_dashb")
        .addClass("minus_dashb");
      $(".set > .set_one").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this)
        .siblings(".content")
        .slideDown(200);
    }
  });

function url_pass(idss){
  //alert(idss);
  $(".dash_rightsidebar .dashboard_content").show();
  var url_id = idss;
  $.ajax({
        url:url_id,
        type:'get',
        // data:{
        //     main_id:key_one,
        //     sub_id:key_two
        //   },
        success:function(result){
          $('.dashboard_content').html(result);
           $('html, body').animate({
                scrollTop: 0
            }, 500);
        }
    });
}
