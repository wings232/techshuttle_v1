function create_admission(){
 
  //var social_head_select = document.getElementById('social_head_select').value;
  //var campLoc = camp_register.camp_reg.value;
  //camp_register
  var admissionId = document.getElementById('admissionId').value;
  var admissionMobile = document.getElementById('admissionMobile').value;
  var sAddress_proof = document.getElementById('address_proof').value;
  var sAddress = document.getElementById('address').value;
  var sCity = document.getElementById('city').value;
  var sState = document.getElementById('state').value;
  var sCountry = document.getElementById('country').value;
  var sPincode = document.getElementById('pincode').value;
  var social_upost_id = document.getElementById('social_upost_id').value;
   
   if($('.admission_check').valid() == true){   
    
    //alert(sNames_admin,sMobile_no,sAddress);
    $.ajax({
          url:'ajax/admission/adms_submit.php',
          type:'post',
          data:{
            admissionId:admissionId, 
            admissionMobile:admissionMobile, 
            sAddress_proof:sAddress_proof, 
            sAddress: sAddress,
            sCity:sCity,
            sState:sState, 
            sCountry: sCountry,
            sPincode:sPincode,
            social_upost_id:social_upost_id,          
          },
          success:function(result){
            $('.shows').html(result);  
            //alert(result);
            re = result.trim()
              if(re == 'valid'){
                  //window.location.href = "http://192.168.0.34/kmh_new_v1/patient_portal.php";            
                  //window.history.go(-1);
                  
                  window.location.href ="http://localhost/techshuttle_v1/order_summary.php";
              }      
            
          }
      });
   }
}

