function create_admission(){
 
  //var social_head_select = document.getElementById('social_head_select').value;
  //var campLoc = camp_register.camp_reg.value;
  //camp_register
    var parent_val = document.getElementById('parent_val').value;
    var sub_val = document.getElementById('sub_val').value;
    var cate_group_val = document.getElementById('cate_group_val').value; 
    var menu_slug = document.getElementById('menu_slug').value; 
    var cate_level_val = document.getElementById('level').value; 
    var head_services = document.getElementById('head_services').innerHTML;

    var name = document.getElementById('name').value;
    var mobile = document.getElementById('mobile').value; 
    var email_id = document.getElementById('email_id').value;
    var course_discount = document.getElementById('course_discount').value;
    var pro_type = document.getElementById('pro_type').value;
   
   if($('.admission_check').valid() == true){   
    
    //alert(sNames_admin,sMobile_no,sAddress);
    $.ajax({
          url:'ajax/admission/adms_submit.php',
          type:'post',
          data:{
            parent_val: parent_val,
            sub_val:sub_val,
            cate_group_val:cate_group_val,
            menu_slug:menu_slug,
            cate_levelVal:cate_level_val,
            head_services:head_services,
            name:name, 
            mobile: mobile,
            email_id:email_id,
            course_discount:course_discount,  
            pro_type:pro_type,          
          },
          success:function(result){
            $('.shows').html(result);  
            //alert(result);
            re = result.trim()
              /* if(re == 'valid'){
                  //window.location.href = "http://192.168.0.34/kmh_new_v1/patient_portal.php";            
                  //window.history.go(-1);
                  
                  //window.location.href ="http://192.168.0.34/studies/techshuttle/order_summary.php";
              }    */      
            
          }
      });
   }
}

