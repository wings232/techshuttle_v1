function create_level_one(levels_create,querys){
	
	$.ajax({
    	url:'menu_c/menu_create.php?level='+levels_create+'&queryKeys='+querys,
        type:'post',
        //data:{doctor_ids:doctor_id},
        success:function(result){
          $(".right_container .levels_create").show();
          $('.levels_create').html(result);
          levels_create_center();
          close_but();
        }
	});
	
	//window.location.href='menu_enroll.php?level='+er;


}

function createTwo(el,levels_create,querys){
	$.ajax({
    	url:'menu_c/menu_create.php?sub_ids='+el+'&level='+levels_create+'&queryKeys='+querys,
        type:'post',
        //data:{doctor_ids:doctor_id},
        success:function(result){
           $(".right_container .levels_create").show();
           $('.levels_create').html(result);
           levels_create_center();
           close_but();
        }
	});
	//window.location.href='menu_enroll.php?sub='+el+'&level='+level;
}

function menuUpdate(content_name,content_url,content_id,levels_create,querys){
	var menu_name = content_name;
	var menu_url = content_url;
	var menu_SetupUpdateId = content_id;
	var query_key = querys;
	var levels = levels_create;
	
	$.ajax({
    	url:'menu_c/menu_create.php',
        type:'post',
        data:{menuName:menu_name,menuUrl:menu_url,menuSetupUpdateId:menu_SetupUpdateId,level:levels,queryKeys:query_key},
        success:function(result){
          $(".right_container .levels_create").show();
          $('.levels_create').html(result);
          levels_create_center();
          close_but();
        }
	});
}

function menuDelete(content_id,levels_create,querys){
	var menu_SetupUpdateId = content_id;
	var query_key = querys;
	var levels = levels_create;
	
	$.ajax({
    	url:'menu_c/menu_post.php',
        type:'post',
        data:{sub_id:menu_SetupUpdateId,levels:levels,menuQueryKeys:query_key},
        success:function(result){
          $(".right_container .levels_create").show();
          $('.levels_create').html(result);
          levels_create_center();
          close_but();
        }
	});
}

function menu_post(){
	var cates = document.getElementById("cate").value;
	var menu_urls = document.getElementById("menu_url").value;
	var menuSubId = document.getElementById("menu_sub_id").value;
	var menuLevel = document.getElementById("menu_level").value;
	var menu_queryKeys = document.getElementById("menu_query_Keys").value;
	//alert(menu_queryKeys)
	$.ajax({
        	url:'menu_c/menu_post.php',
	        type:'post',
	        data:{cate_name: cates,menuUrl:menu_urls,sub_id:menuSubId,levels:menuLevel,menuQueryKeys:menu_queryKeys},
	        success:function(result){
	          $('.levels_create').html(result);
	        }
    	});
}


//Navigation Post Starts

function navigation_level_one(levels_create,querys){
  //alert(levels_create+querys);
  $.ajax({
      url:'navigation_c/navigation_create.php?level='+levels_create+'&queryKeys='+querys,
        type:'post',
        //data:{doctor_ids:doctor_id},
        success:function(result){
          $(".right_container .levels_create").show();
          $('.levels_create').html(result);
          levels_create_center();
          close_but();
        }
  });
  
  //window.location.href='menu_enroll.php?level='+er;


}

function navigationTwo(el,levels_create,querys){
  $.ajax({
      url:'navigation_c/navigation_create.php?sub_ids='+el+'&level='+levels_create+'&queryKeys='+querys,
        type:'post',
        //data:{doctor_ids:doctor_id},
        success:function(result){
           $(".right_container .levels_create").show();
           $('.levels_create').html(result);
           levels_create_center();
           close_but();
        }
  });
  //window.location.href='menu_enroll.php?sub='+el+'&level='+level;
}

function navigationUpdate(content_name,content_url,content_id,levels_create,querys){
  var menu_name = content_name;
  var menu_url = content_url;
  var menu_SetupUpdateId = content_id;
  var query_key = querys;
  var levels = levels_create;
  
  $.ajax({
      url:'navigation_c/navigation_create.php',
        type:'post',
        data:{menuName:menu_name,menuUrl:menu_url,menuSetupUpdateId:menu_SetupUpdateId,level:levels,queryKeys:query_key},
        success:function(result){
          $(".right_container .levels_create").show();
          $('.levels_create').html(result);
          levels_create_center();
          close_but();
        }
  });
}

function navigationDelete(content_id,levels_create,querys){
  var menu_SetupUpdateId = content_id;
  var query_key = querys;
  var levels = levels_create;
  
  $.ajax({
      url:'navigation_c/navigation_post.php',
        type:'post',
        data:{sub_id:menu_SetupUpdateId,levels:levels,menuQueryKeys:query_key},
        success:function(result){
          $(".right_container .levels_create").show();
          $('.levels_create').html(result);
          levels_create_center();
          close_but();
        }
  });
}

function navigation_post(){
  var cates = document.getElementById("cate").value;
  var menu_urls = document.getElementById("menu_url").value;
  var menu_queryKeys = document.getElementById("menu_query_Keys").value;
  var user_call_id = document.getElementById("call_id").value;
  var menu_prioritys = document.getElementById("menu_priority").value;
  if(menu_queryKeys == 'Update_query'){
    var update_ids = document.getElementById("update_ids").value;
  }
  
  var menuSubId = document.getElementById("menu_sub_id").value;
  var menuLevel = document.getElementById("menu_level").value;
  var media_slug = document.getElementById("media_slug").value;
  var sfile_image = "";
  if(menuLevel == 2){
    var sfile_image = document.getElementById('sfile_image').value;
  }
  var categories_list_id = document.getElementById("categories_list").value;
  var categories_list = document.getElementById('categories_list').options[document.getElementById('categories_list').selectedIndex].text;
  var categories_status = document.getElementById("categories_status").value;
  alert(sfile_image)
  if($('.navigation_validate').valid() == true){
    $.ajax({
            url:'navigation_c/navigation_post.php',
            type:'post',
            data:{
              cate_name: cates,
              menuUrl:menu_urls,
              updateIds:update_ids,
              sub_id:menuSubId,
              levels:menuLevel,
              menuQueryKeys:menu_queryKeys,
              sfile_image:sfile_image,
              menu_prioritys:menu_prioritys,
              media_slug:media_slug,
              categories_list_id:categories_list_id,
              categories_list:categories_list,
              categories_status:categories_status,
              user_call_id:user_call_id
            },
            success:function(result){
              $('.levels_create').html(result);
            }
      });
  }
}



//Navigation Post Ends


$(document).ready(function(){
  $(window).resize(function(){
    levels_create_center();
  });
});

function levels_create_center(){
  var popp = $('.levels_create');
  var top = ($(window).height() - popp.outerHeight()) / 2;
  var top = "100px";
  //var left = ($(window).width() - popp.outerWidth() - 300) / 2; if we use position absolute we need to use minus 300px in left.
  var left = ($(window).width() - popp.outerWidth()) / 2;
  var topa;
  popp.css({'top':top, 'left':left}); 
}

function close_but(){
  $(".right_container .levels_create .level_form .close_but").click(function(){
    $(this).parent().hide();
  });
}

//Category Post Starts

function category_level_one(levels_create,querys){
  //alert(levels_create+querys);
  $.ajax({
      url:'cate_group/categories_create.php?level='+levels_create+'&queryKeys='+querys,
        type:'post',
        //data:{doctor_ids:doctor_id},
        success:function(result){
          $(".right_container .levels_create").show();
          $('.levels_create').html(result);
          levels_create_center();
          close_but();
        }
  });
  
  //window.location.href='menu_enroll.php?level='+er;


}

function categoryTwo(el,levels_create,querys){
  $.ajax({
      url:'cate_group/categories_create.php?sub_ids='+el+'&level='+levels_create+'&queryKeys='+querys,
        type:'post',
        //data:{doctor_ids:doctor_id},
        success:function(result){
           $(".right_container .levels_create").show();
           $('.levels_create').html(result);
           levels_create_center();
           close_but();
        }
  });
  //window.location.href='menu_enroll.php?sub='+el+'&level='+level;
}

function categoryUpdate(content_name,content_url,content_id,levels_create,querys){
  var menu_name = content_name;
  var menu_url = content_url;
  var menu_SetupUpdateId = content_id;
  var query_key = querys;
  var levels = levels_create;
  
  $.ajax({
      url:'cate_group/categories_create.php',
        type:'post',
        data:{menuName:menu_name,menuUrl:menu_url,menuSetupUpdateId:menu_SetupUpdateId,level:levels,queryKeys:query_key},
        success:function(result){
          $(".right_container .levels_create").show();
          $('.levels_create').html(result);
          levels_create_center();
          close_but();
        }
  });
}



function category_post(){
  var cates = document.getElementById("cate").value;
  var menu_urls = document.getElementById("menu_url").value;
  var menu_queryKeys = document.getElementById("menu_query_Keys").value;
  var user_call_id = document.getElementById("call_id").value;
  var level_range_id = document.getElementById("level_range_id").value;
  if(menu_queryKeys == 'Update_query'){
    var update_ids = document.getElementById("update_ids").value;
  }
  
  var menuSubId = document.getElementById("menu_sub_id").value;
  var menuLevel = document.getElementById("menu_level").value;
  var media_slug = document.getElementById("media_slug").value;
  var categories_status = document.getElementById("categories_status").value;
  //alert(menuLevel)
  if($('.navigation_validates').valid() == true){
    $.ajax({
            url:'cate_group/categories_post.php',
            type:'post',
            data:{
              cate_name: cates,
              menuUrl:menu_urls,
              updateIds:update_ids,
              sub_id:menuSubId,
              levels:menuLevel,
              menuQueryKeys:menu_queryKeys,
              
              level_range_id:level_range_id,
              media_slug:media_slug,
              
              categories_status:categories_status,
              user_call_id:user_call_id
            },
            success:function(result){
              $('.levels_create').html(result);

            }
      });
  }
}



//Category Post Ends

function role_create(){
  var rolesCreate = document.getElementById("roles_create").value;
  // var menu_urls = document.getElementById("menu_url").value;
  // var menuSubId = document.getElementById("menu_sub_id").value;
  // var menuLevel = document.getElementById("menu_level").value;
  $.ajax({
          url:'roles/roles_update.php',
          type:'post',
          data:{roles_Create: rolesCreate},
          success:function(result){
            $('.table_role').html(result);
            setTimeout(function() {
                    $('.dashb_con .dashb_right .dashb_content .right_container .table_role .roles_ins').fadeOut('fast');
              }, 5000);
          }
      });
}

function groupcreate(){
  var group_name = document.getElementById("group_name").value;
  var group_type = document.getElementById("group_type").value;
  // var menuSubId = document.getElementById("menu_sub_id").value;
  // var menuLevel = document.getElementById("menu_level").value;
  if($('.cate_groups').valid() == true){
    //alert();
    $.ajax({
          url:'cate_group/categories_update.php',
          type:'post',
          data:{
            group_names: group_name,
            group_types: group_type,
          },
          success:function(result){
            $('.categories_show').html(result);
           /* setTimeout(function() {
                    $('.dashb_con .dashb_right .dashb_content .right_container .table_role .roles_ins').fadeOut('fast');
              }, 5000);*/
          }
      });
  }
}

function rangecreate(){
  var range_id = document.getElementById("range_id").value;
  var range_name = document.getElementById("range_name").value;
  var range_type = document.getElementById("range_type").value;
  var range_type_list = document.getElementById('range_type').options[document.getElementById('range_type').selectedIndex].text;
  var range_status = document.getElementById("range_status").value;
  // var menuSubId = document.getElementById("menu_sub_id").value;
  // var menuLevel = document.getElementById("menu_level").value;
  if($('.range_groups').valid() == true){
    //alert();
    $.ajax({
          url:'range_group/range_update.php',
          type:'post',
          data:{
            range_id: range_id,
            range_name: range_name,
            range_type: range_type,
            range_type_list: range_type_list,
            range_status: range_status,
          },
          success:function(result){
            $('.categories_show').html(result);
           /* setTimeout(function() {
                    $('.dashb_con .dashb_right .dashb_content .right_container .table_role .roles_ins').fadeOut('fast');
              }, 5000);*/
          }
      });
  }
}

function getSubCate(){

  var categories_type = document.getElementById("categories_type").value;
  //alert(roles_view)
  $.ajax({
    url:"range_group/getCateType.php",
    type:'post',
    data:{categories_type:categories_type},
    success:function(result){
      $('.range_ajax').html(result);

    }
  }); 
}

$(document).ready(function(){
  $(document).on("click",".current",function(){
    var rolesId = document.getElementById("role_id").value;
    var level =  $(this).parent().prev().prev().prev().prev().prev().val();
    var page_id = $(this).parent().prev().prev().prev().prev().html();
    var page_name = $(this).parent().prev().prev().prev().html();
    var page_url = $(this).parent().prev().prev().val();
    var page_sub = $(this).parent().prev().val();
    var page_view = "No";
    var page_insert = "No";
    var page_update = "No";
    var page_delete = "No";
    var Approval = "No";
    //alert(page_sub)
    $.ajax({
      url:"manage_user/assign_roles.php",
      type:'post',
      data:{role_Id:rolesId,pageId:page_id,pageName:page_name,pageUrl:page_url,pageSub:page_sub,pageView:page_view,pageInsert:page_insert,pageUpdate:page_update,pageDelete:page_delete,levels:level,approvals:Approval},
      success:function(result){
        $('.assign_reply').html(result);
         setTimeout(function() {
                    $('.dashb_con .dashb_right .dashb_content .right_container .assign_reply .reply_assign').fadeOut('fast');
              }, 10000);
      }
    });
    
    
  });
});

function select_roles(){

  var roles_view = document.getElementById("role_ids").value;
  //alert(roles_view)
  $.ajax({
    url:"manage_user/select_roles.php",
    type:'post',
    data:{roles_ajax:roles_view},
    success:function(result){
      $('.roles_views').html(result);

    }
  }); 
}



$(document).ready(function(){
  $(document).on("click",".premission_assign",function(){
    var rolesId = document.getElementById("role_id_name").value;
    //var cate_id = $(this).parent().prev().prev().prev().prev().prev().prev().html();
    var page_id = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().val();
    var cate_id = $(this).parent().prev().prev().prev().prev().prev().prev().prev().val();
    var page_name = $(this).parent().prev().prev().prev().prev().prev().prev().html();
    //var change_view = $(this).parent().prev().prev().prev().prev().children().next().children('.view_permission').val();
    var change_view = ($(this).parent().prev().prev().prev().prev().prev().children().next().children('.view_permission').is(':checked'))?"Yes":"No";
    var change_insert = ($(this).parent().prev().prev().prev().prev().children().next().children('.insert_permissions').is(':checked'))?"Yes":"No";
    var change_update = ($(this).parent().prev().prev().prev().children().next().children('.update_permissions').is(":checked"))?"Yes":"No";
    var change_delete = ($(this).parent().prev().prev().children().next().children('.delete_permission').is(':checked'))?"Yes":"No";
    var change_approval = ($(this).parent().prev().children().next().children('.approval_perimission').is(':checked'))?"Yes":"No";
    //alert(change_approval)
    $.ajax({
      url:"roles_view.php",
      type:'post',
      data:{role_Id:rolesId,pageId:page_id,changeView:change_view,changeInsert:change_insert,changeUpdate:change_update,changeDelete:change_delete,changeApproval:change_approval},
      success:function(result){
        $('.view_info').html(result);
         //window.location.reload();
         //location.reload(true);
         //customs_load();
         //console.log(result);
      }
    }); 
    
  });
});

/*User create starts*/
function select_levels(){
  var emp_level_select = document.getElementById("emp_level_select").value;
  //alert(roles_view)
  
    $.ajax({
      url:"ajax/user/level_select.php",
      type:'post',
      data:{emp_level_select:emp_level_select},
      success:function(result){
        $('.right_container .user_create .feilds_box .input_box .feild_action input#emp_id').val(result);

      }
    }); 
  
}

/*User create ends*/


/*For Slug Create Ends*/
var slug = function(str) {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  today = '-'+mm + '-' + dd + '-' + yyyy;
  var $slug = '';
  var trimmed = $.trim(str);
  $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
  replace(/-+/g, '-').
  replace(/^-|-$/g, '');
  if(str != ""){
    return $slug.toLowerCase()+today;
  }
}

var slugwithoutdate = function(str) {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  today = '-'+mm + '-' + dd + '-' + yyyy;
  var $slug = '';
  var trimmed = $.trim(str);
  $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
  replace(/-+/g, '-').
  replace(/^-|-$/g, '');
  if(str != ""){
    return $slug.toLowerCase();
  }
}

$(document).ready(function(){
  $(document).on("keyup",".right_container .levels_create .level_form .form_setup .textarea #cate",function(){
      var takedata = $('.right_container .levels_create .level_form .form_setup .textarea #cate').val()
      $('.right_container .levels_create .level_form .form_setup .menu_url .media_slug').val(slugwithoutdate(takedata));
      // var domain = $('.yourdomain').val().toLowerCase();
      // $('.website').text(domain)   
  });
});

/*For Slug Create Ends*/


/*For Media Upload*/
// for media page to file upload
$(document).on("change",".media_image_banner",function(){

    // var fileName = e.target.files[0].type;
    // alert('The file "' + fileName +  '" has been selected.');
    var file_data = $('.media_image_banner').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //alert(form_data); 
    $.ajax({
        url: 'navigation_c/media/file_upload.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            //alert(php_script_response); // <-- display response from the PHP script, if any
            //document.getElementById('up').innerHTML = php_script_response;
            $('.file_out').html(php_script_response);
        }
     });
});


$(document).on("change",".media_image_bannerdocup",function(){

    // var fileName = e.target.files[0].type;
    // alert('The file "' + fileName +  '" has been selected.');
    var file_data = $('.media_image_bannerdocup').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //alert(form_data); 
    $.ajax({
        url: 'navigation_c/media/file_update_upload.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            //alert(php_script_response); // <-- display response from the PHP script, if any
            //document.getElementById('up').innerHTML = php_script_response;
            $('.file_outs').html(php_script_response);
        }
     });
});

$(document).on("change",".media_image_thumb",function(){

    // var fileName = e.target.files[0].type;
    // alert('The file "' + fileName +  '" has been selected.');
    var file_data = $('.media_image_thumb').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //alert(form_data); 
    $.ajax({
        url: 'courses_c/media/file_upload.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            //alert(php_script_response); // <-- display response from the PHP script, if any
            //document.getElementById('up').innerHTML = php_script_response;
            $('.file_out').html(php_script_response);
        }
     });
});

$(document).on("change",".media_image_banner_c",function(){

    // var fileName = e.target.files[0].type;
    // alert('The file "' + fileName +  '" has been selected.');
    var file_data = $('.media_image_banner_c').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //alert(form_data); 
    $.ajax({
        url: 'courses_c/media/file_up_banner.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            //alert(php_script_response); // <-- display response from the PHP script, if any
            //document.getElementById('up').innerHTML = php_script_response;
            $('.file_out_banner').html(php_script_response);
        }
     });
});

$(document).on("change",".media_image_thumbup",function(){

    // var fileName = e.target.files[0].type;
    // alert('The file "' + fileName +  '" has been selected.');
    var file_data = $('.media_image_thumbup').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //alert(form_data); 
    $.ajax({
        url: 'courses_c/media/file_update_upload.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            //alert(php_script_response); // <-- display response from the PHP script, if any
            //document.getElementById('up').innerHTML = php_script_response;
            $('.file_outs').html(php_script_response);
        }
     });
});

$(document).on("change",".media_image_banner_up",function(){

    // var fileName = e.target.files[0].type;
    // alert('The file "' + fileName +  '" has been selected.');
    var file_data = $('.media_image_banner_up').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //alert(form_data); 
    $.ajax({
        url: 'courses_c/media/file_update_banner.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            //alert(php_script_response); // <-- display response from the PHP script, if any
            //document.getElementById('up').innerHTML = php_script_response;
            $('.file_outs_banner').html(php_script_response);
        }
     });
});
/*For Media Upload*/


/*For Navigation Select Starts*/
$(document).ready(function(){
  $(document).on("click",".right_container .department_head .select_design .select_design_head",function(){
    $(this).next('.filter_drop').slideToggle();
  });

  $(document).on("click",".right_container .department_head .select_design .filter_drop .filter_select .first_l",function(){
    var menu_id  = $(this).attr('parent_id');
    var menu_sub_id  = $(this).attr('sub_id');
    var menu_cate_gro  = $(this).attr('cate_gro');
    var level  = $(this).attr('level');
    var menu_slug  = $(this).attr('menu_slug');
    var menu_names  = $(this).html();
    //alert(menu_name);
    $(".right_container .department_head .select_design .select_design_head .filter_h .head").html(menu_names);
    $(".right_container .department_head .select_design .select_design_head .filter_h .parent_val").val(menu_id);
    $(".right_container .department_head .select_design .select_design_head .filter_h .sub_val").val(menu_sub_id);
    $(".right_container .department_head .select_design .select_design_head .filter_h .cate_group_val").val(menu_cate_gro);
    $(".right_container .department_head .select_design .select_design_head .filter_h .level").val(level);
    $(".right_container .department_head .select_design .select_design_head .filter_h .menu_slug").val(menu_slug);
    $('.filter_drop').slideUp();
  }); 

  
});



$(document).ready(function(){
  $(document).on("click",".right_container .department_head .select_design_s .select_design_head_s",function(){
    $(this).next('.filter_drop_s').slideToggle();
  });

  $(document).on("click",".right_container .department_head .select_design_s .filter_drop_s .filter_select_s .first_l",function(){
    var menu_id  = $(this).attr('parent_id');
    var menu_sub_id  = $(this).attr('sub_id');
    var menu_cate_gro  = $(this).attr('cate_gro');
    var level  = $(this).attr('level');
    var menu_slug  = $(this).attr('menu_slug');
    var menu_names  = $(this).html();
    //alert(menu_name);
    /*$(".right_container .department_head .select_design .select_design_head .filter_h .head").html(menu_names);
    $(".right_container .department_head .select_design .select_design_head .filter_h .parent_val").val(menu_id);
    $(".right_container .department_head .select_design .select_design_head .filter_h .sub_val").val(menu_sub_id);
    $(".right_container .department_head .select_design .select_design_head .filter_h .cate_group_val").val(menu_cate_gro);
    $(".right_container .department_head .select_design .select_design_head .filter_h .level").val(level);
    $(".right_container .department_head .select_design .select_design_head .filter_h .menu_slug").val(menu_slug);*/
    $(this).parent().parent().parent().parent().prev().children().children('.head').html(menu_names);
    $(this).parent().parent().parent().parent().prev().children().children('.parent_val').val(menu_id);
    $(this).parent().parent().parent().parent().prev().children().children('.sub_val').val(menu_sub_id);
    $(this).parent().parent().parent().parent().prev().children().children('.cate_group_val').val(menu_cate_gro);
    $(this).parent().parent().parent().parent().prev().children().children('.level').val(level);
    $(this).parent().parent().parent().parent().prev().children().children('.menu_slug').val(menu_slug);
    
    $('.filter_drop_s').slideUp();
  }); 

  
});

/* For Navigation select Ends*/


/*For Course Create Starts*/
function course_create(){
  
  //var social_head_select = document.getElementById('social_head_select').value;
  //var campLoc = camp_register.camp_reg.value;
  //camp_register
    var parent_val = document.getElementById('parent_val').value;
    var sub_val = document.getElementById('sub_val').value;
    var cate_group_val = document.getElementById('cate_group_val').value; 
    var menu_slug = document.getElementById('menu_slug').value; 
    var cate_level_val = document.getElementById('level').value; 
    var head_services = document.getElementById('head_services').innerHTML;
    var email_id = document.getElementById('email_id').value;
    var mobile = document.getElementById('mobile').value; 
    var overall_priority = document.getElementById('overall_priority').value;
    var dept_priority = document.getElementById('dept_priority').value;    
    //var social_status_select = document.getElementById('social_status_select').value;
    var meta_title = document.getElementById('meta_title').value;
    var meta_description = document.getElementById('meta_description').value;
    var meta_keyword = document.getElementById('meta_keyword').value;
    var sfile_image = document.getElementById('sfile_image').value;
    var sfile_image_banner = document.getElementById('sfile_image_banner').value;
    var social_upost_id = document.getElementById('social_upost_id').value;
   if($('.course_check').valid() == true){
    $('.right_container .department_head .social_create_out').show();
    $('.right_container .department_head .social_overlay').show();
    
    //alert(parent_val + "-" +sub_val + "-" +cate_group_val + "-" +head_services  + "-" + social_upost_id+ "-" + sfile_image+ "-" + sfile_image_banner);
    $.ajax({
          url:'courses_c/courses_post.php',
          type:'post',
          data:{
            parent_val: parent_val,
            sub_val:sub_val,
            cate_group_val:cate_group_val,
            menu_slug:menu_slug,
            cate_levelVal:cate_level_val,
            head_services:head_services,
            email_id:email_id,
            mobile:mobile,
            overall_priority:overall_priority,
            dept_priority:dept_priority,
            meta_title:meta_title,
            meta_description:meta_description,
            meta_keyword:meta_keyword,
            sfile_image:sfile_image,
            sfile_image_banner:sfile_image_banner,
            socialUpostId:social_upost_id
          },
          success:function(result){
            $('.social_create_out').html(result);
            load_data(1);
            /*setTimeout(function() {
                 $('.right_container .social_media_create .social_create_out').hide();
                 $('.right_container .social_media_create .social_overlay').hide();
              }, 10000);*/
          }
      });
   }
}

function media_size(){
    if (window.matchMedia('(max-height: 768px)').matches) {                
        $(".update_con .update_center .update .media_type_update .media_cont ").css({"max-height":"400px","overflow-y":"auto"})
    } else{
       $(".update_con .update_center .update .media_type_update .media_cont ").css({"max-height":"650px","overflow-y":"auto"})
    }
}
media_size();
$(window).resize(function(){
   media_size();
});

function media_sizes(){
    if (window.matchMedia('(max-height: 768px)').matches) {                
        $(".table_details_cen  .update_con .update_center .update .media_type_update .media_cont ").css({"max-height":"400px","overflow-y":"auto"})
    } else{
       $(".table_details_cen  .update_con .update_center .update .media_type_update .media_cont ").css({"max-height":"650px","overflow-y":"auto"})
    }
}

media_sizes();

$(window).resize(function(){
   media_sizes();
});

function update_course(article_id,articles_slug){
  var articlesId = article_id;
  //var article_post_id = article_post_id;
  var articlesSlug = articles_slug;
  
  $('.table_details_cen  .update_con .update_center .update').css({"display":"block"});
  $.ajax({
    url:"courses_c/courses_update.php",
    type:'post',
    data:{
      articlesId:articlesId,
      //article_postId:article_post_id,
      articlesSlug:articlesSlug,
    },
    success:function(result){
      $('.table_details_cen  .update_con .update_center .update').html(result);
      media_sizes();
    }
  });
}

/*Course Fees Update Starts*/
function update_course_fee(article_id,articles_slug){
  var articlesId = article_id;
  //var article_post_id = article_post_id;
  var articlesSlug = articles_slug;
  
  $('.table_details_cen  .update_con .update_center .update').css({"display":"block"});
  $.ajax({
    url:"courses_fee_c/courses_fee_update.php",
    type:'post',
    data:{
      articlesId:articlesId,
      //article_postId:article_post_id,
      articlesSlug:articlesSlug,
    },
    success:function(result){
      $('.table_details_cen  .update_con .update_center .update').html(result);
      media_sizes();
    }
  });
}
/*Course Fees Update Ends*/

$(document).on("click",".department_head .social_create_out .social_close",function(){  
    $(this).parent().hide();
    $(this).parent().prev().hide(); 
});

$(document).on("click",".update_center .update .social_close",function(){ 
    $(this).parent().hide();  
});

function updateCourseRecord(article_id){
  
  var articlesId = article_id;
  var sfile_image = document.getElementById('sfile_images').value;
  var sfile_images_banner = document.getElementById('sfile_images_banner').value;
  var overall_prioritys = document.getElementById('overall_prioritys').value;
  var dept_prioritys = document.getElementById('dept_prioritys').value;    
  var email = document.getElementById('email').value;
  var Phone = document.getElementById('Phone').value;
  var meta_titles = document.getElementById('meta_titles').value;
  var meta_descriptions = document.getElementById('meta_descriptions').value;
  var meta_keywords = document.getElementById('meta_keywords').value;
  var socialUpostId = document.getElementById('social_upost_id').value;
  //alert(overall_prioritys+  " " +dept_prioritys+  " " +email+  " " +Phone+  " " +meta_titles+  " " +meta_descriptions+  " " +meta_keywords)
  $.ajax({
    url:"courses_c/courses_update_status.php",
    type:'post',
    data:{
      articlesId:articlesId,
      sfileImage:sfile_image,
      sfile_images_banner:sfile_images_banner,      
      overall_prioritys:overall_prioritys,
      dept_prioritys:dept_prioritys,
      email:email,
      Phone:Phone,
      meta_title:meta_titles,
      meta_description:meta_descriptions,
      meta_keywords:meta_keywords,
      social_Upost_Id:socialUpostId
    },
    success:function(result){
      $('.table_details_cen .table_details .info_media_contents').html(result);
      //$('.right_container .department_head .table_details_con .table_details_cen .table_details .media_search_group').html(result);
      $('.table_details_cen  .update_con .update_center .update').css({"display":"none"});     
        load_data(1);
    }
  });
}

function updateCourseFeeRecord(article_id){
  
  var articlesId = article_id;
  var Prices = document.getElementById('Prices').value;
  var sposted_dates = document.getElementById('sposted_dates').value;
  var sexpiry_dates = document.getElementById('sexpiry_dates').value;
  var price_type_sel = document.getElementById('price_type_sel').value;    
  var price_descrips = document.getElementById('price_descrips').value;
  var status_sel = document.getElementById('status_sel').value;
  var socialUpostId = document.getElementById('social_upost_id').value;
  //alert(price_type_sel)
  //alert();
  $.ajax({
    url:"courses_fee_c/course_fee_up_status.php",
    type:'post',
    data:{
      articlesId:articlesId,
      Prices:Prices,
      sposted_dates:sposted_dates,      
      sexpiry_dates:sexpiry_dates,
      price_type_sel:price_type_sel,
      price_descrips:price_descrips,
      status_sel:status_sel,
      social_Upost_Id:socialUpostId
    },
    success:function(result){
      $('.table_details_cen .table_details .info_media_contents').html(result);
      //$('.right_container .department_head .table_details_con .table_details_cen .table_details .media_search_group').html(result);
      $('.table_details_cen  .update_con .update_center .update').css({"display":"none"});     
        load_data(1);
    }
  });
}

function course_approved(article_id,articles_slug){
  var articlesId = article_id;
  //var article_post_id = article_post_id;
  var articlesSlug = articles_slug;
  
  $('.services_app  .update_con .update_center .update').css({"display":"block"});
  $.ajax({
    url:"courses_c/course_app.php",
    type:'post',
    data:{
      articlesId:articlesId,
      //article_postId:article_post_id,
      articlesSlug:articlesSlug,
    },
    success:function(result){
      $('.services_app  .update_con .update_center .update').html(result);
      media_size();

    }
  });
}

function coursestatusupdate(article_id,statusupdates){
  var articlesId = article_id;
  var statusUpdates = statusupdates;
  var remarksBlogM = document.getElementById('remarks_blog_m').value;
  $.ajax({
    url:"courses_c/course_status_up.php",
    type:'post',
    data:{
      articlesId:articlesId,
      status_updates:statusUpdates,
      remarks_BlogM:remarksBlogM
    },
    success:function(result){
      //$('.right_container .socail_media_list .selected_media').html(result);
      $('.services_app_cen .services_app .table_design .info_media_contents').html(result);
      $('.services_app .update_con .update_center .update').css({"display":"none"});

    }
  });
}
/*For Course Create Ends*/

/*Course Fees starts*/
/*For Course Create Starts*/
function courseFee_create(){
  
  //var social_head_select = document.getElementById('social_head_select').value;
  //var campLoc = camp_register.camp_reg.value;
  //camp_register
    var parent_val = document.getElementById('parent_val').value;
    var sub_val = document.getElementById('sub_val').value;
    var cate_group_val = document.getElementById('cate_group_val').value; 
    var menu_slug = document.getElementById('menu_slug').value; 
    var cate_level_val = document.getElementById('level').value; 
    var head_services = document.getElementById('head_services').innerHTML;
    var course_fees = document.getElementById('course_fees').value;
    var price_type = document.getElementById('price_type').value; 
    var fee_content = document.getElementById('fee_content').value;
    var sposted_date = document.getElementById('sposted_date').value;  
    //var social_status_select = document.getElementById('social_status_select').value;
    var sexpiry_date = document.getElementById('sexpiry_date').value;
    // var fee_status = document.getElementById('fee_status').value;
    var social_upost_id = document.getElementById('social_upost_id').value;
   if($('.course_fee_check').valid() == true){
    $('.right_container .department_head .social_create_out').show();
    $('.right_container .department_head .social_overlay').show();
    
    //alert(course_fees + "-" +price_type + "-" +fee_content + "-" +sposted_date  + "-" + sexpiry_date);
    $.ajax({
          url:'courses_fee_c/courses_fee_post.php',
          type:'post',
          data:{
            parent_val: parent_val,
            sub_val:sub_val,
            cate_group_val:cate_group_val,
            menu_slug:menu_slug,
            cate_levelVal:cate_level_val,
            head_services:head_services,
            course_fees:course_fees,
            price_type:price_type,
            fee_content:fee_content,
            sposted_date:sposted_date,
            sexpiry_date:sexpiry_date,
            socialUpostId:social_upost_id
          },
          success:function(result){
            $('.social_create_out').html(result);
            load_data(1);
            // setTimeout(function() {
            //      $('.right_container .social_media_create .social_create_out').hide();
            //      $('.right_container .social_media_create .social_overlay').hide();
            //   }, 10000);
          }
      });
   }
}

/*Course Fees Ends*/


/*For Course Batch Create Starts*/
function course_batch_create(){
  
  //var social_head_select = document.getElementById('social_head_select').value;
  //var campLoc = camp_register.camp_reg.value;
  //camp_register
    var batch_name = document.getElementById('batch_name').value;
    var batch_content = document.getElementById('batch_content').value; 
    var sbatch_mode = document.getElementById('sbatch_mode').value;
    var sStartTime = document.getElementById('sStartTime').value;  
    var sEndTime = document.getElementById('sEndTime').value;
    var seat_count = document.getElementById('seat_count').value; 
    var ssession_c = document.getElementById('ssession_c').value;
    var patient_take_id = document.getElementById('patient_take_id').value;  
    var dura_hrs = document.getElementById('dura_hrs').value;
    var dura_days = document.getElementById('dura_days').value; 
    var dura_mnt = document.getElementById('dura_mnt').value;
    var scourse_level = document.getElementById('scourse_level').value;  
    //var social_status_select = document.getElementById('social_status_select').value;
    var smodeofTraining = document.getElementById('smodeofTraining').value;
    // var fee_status = document.getElementById('fee_status').value;
    var social_upost_id = document.getElementById('social_upost_id').value;
   if($('.course_batch_check').valid() == true){
    $('.right_container .department_head .social_create_out').show();
    $('.right_container .department_head .social_overlay').show();
    
    //alert(course_fees + "-" +price_type + "-" +fee_content + "-" +sposted_date  + "-" + sexpiry_date);
    $.ajax({
          url:'course_batch_c/courses_batch_post.php',
          type:'post',
          data:{
            batch_name:batch_name,
            batch_content:batch_content,
            sbatch_mode:sbatch_mode,
            sStartTime:sStartTime,
            sEndTime:sEndTime,
            seat_count:seat_count,
            ssession_c:ssession_c,
            patient_take_id:patient_take_id,
            dura_hrs:dura_hrs,
            dura_days:dura_days,
            dura_mnt:dura_mnt,
            scourse_level:scourse_level,
            smodeofTraining:smodeofTraining,
            socialUpostId:social_upost_id
          },
          success:function(result){
            $('.social_create_out').html(result);
            load_data(1);
            // setTimeout(function() {
            //      $('.right_container .social_media_create .social_create_out').hide();
            //      $('.right_container .social_media_create .social_overlay').hide();
            //   }, 10000);
          }
      });
   }
}

/*Course Fees Update Starts*/
function update_course_batch(article_id,articles_slug){
  var articlesId = article_id;
  //var article_post_id = article_post_id;
  var articlesSlug = articles_slug;
  
  $('.table_details_cen  .update_con .update_center .update').css({"display":"block"});
  $.ajax({
    url:"course_batch_c/courses_batch_update.php",
    type:'post',
    data:{
      articlesId:articlesId,
      //article_postId:article_post_id,
      articlesSlug:articlesSlug,
    },
    success:function(result){
      $('.table_details_cen  .update_con .update_center .update').html(result);
      media_sizes();
    }
  });
}
/*Course Fees Update Ends*/

function updateCoursebatchRecord(article_id){
  
  var articlesId = article_id;
  var ucontent = document.getElementById('ucontent').value;
  var ubatch_mode_type = document.getElementById('ubatch_mode_type').value;
  var uStartTimes = document.getElementById('uStartTimes').value;
  var uEndTimes = document.getElementById('uEndTimes').value;    
  var useat_count = document.getElementById('useat_count').value;
  var bat_running_days = document.getElementById('patient_take_ids').value;
  var ubatch_session = document.getElementById('ubatch_session').value;
  var udurations_hrs = document.getElementById('udurations_hrs').value;
  var udurations_days = document.getElementById('udurations_days').value;
  var udurations_mnt = document.getElementById('udurations_mnt').value;
  var ucourse_level = document.getElementById('ucourse_level').value;
  var umode_of_training = document.getElementById('umode_of_training').value;
  var status_sel = document.getElementById('status_sel').value;
  var social_upost_id = document.getElementById('social_upost_id').value;
  //alert(bat_running_days)
  //alert();
  $.ajax({
    url:"course_batch_c/course_batch_up_status.php",
    type:'post',
    data:{
      articlesId:articlesId,
      ucontent:ucontent,
      ubatch_mode_type:ubatch_mode_type,      
      uStartTimes:uStartTimes,
      uEndTimes:uEndTimes,
      useat_count:useat_count,
      bat_running_days:bat_running_days,
      ubatch_session:ubatch_session,
      udurations_hrs:udurations_hrs,
      udurations_days:udurations_days,
      udurations_mnt:udurations_mnt,
      ucourse_level:ucourse_level,
      umode_of_training:umode_of_training,
      status_sel:status_sel,
      social_upost_id:social_upost_id
    },
    success:function(result){
      $('.table_details_cen .table_details .info_media_contents').html(result);
      //$('.right_container .department_head .table_details_con .table_details_cen .table_details .media_search_group').html(result);
      $('.table_details_cen  .update_con .update_center .update').css({"display":"none"});     
      load_data(1);
    }
  });
}

/*Course Batch Fees Ends*/

/*For Course Create Starts*/
function courseDescrip_create(){
  
  //var social_head_select = document.getElementById('social_head_select').value;
  //var campLoc = camp_register.camp_reg.value;
  //camp_register
    var parent_val = document.getElementById('parent_val').value;
    var sub_val = document.getElementById('sub_val').value;
    var cate_group_val = document.getElementById('cate_group_val').value; 
    var menu_slug = document.getElementById('menu_slug').value; 
    var cate_level_val = document.getElementById('level').value; 
    var head_services = document.getElementById('head_services').innerHTML;
    var descrip_type = document.getElementById('descrip_type').value;
    var post_type = document.getElementById('post_type').value; 
    var product_descrip = document.getElementById('product_descrip').value;
    var descrip_status = document.getElementById('descrip_status').value;
    var social_upost_id = document.getElementById('social_upost_id').value;
    if(parent_val != ""){


       if($('.course_descrip_check').valid() == true){
        $('.right_container .department_head .social_create_out').show();
        $('.right_container .department_head .social_overlay').show();
        
        //alert(parent_val + "-" +menu_slug + "-" +sub_val + "-" +cate_group_val  + "-" + head_services);
        $.ajax({
              url:'course_description_c/course_descrip_post.php',
              type:'post',
              data:{
                parent_val: parent_val,
                sub_val:sub_val,
                cate_group_val:cate_group_val,
                menu_slug:menu_slug,
                cate_levelVal:cate_level_val,
                head_services:head_services,
                descrip_type:descrip_type,
                post_type:post_type,
                product_descrip:product_descrip,
                descrip_status:descrip_status,
                socialUpostId:social_upost_id
              },
              success:function(result){
                $('.social_create_out').html(result);
                load_data(1);
                // setTimeout(function() {
                //      $('.right_container .social_media_create .social_create_out').hide();
                //      $('.right_container .social_media_create .social_overlay').hide();
                //   }, 10000);
              }
          });
       }
     }else{
      alert("Please Select the course");
     }
}

function update_course_descrip(article_id,articles_slug){
  var articlesId = article_id;
  //var article_post_id = article_post_id;
  var articlesSlug = articles_slug;
  
  $('.table_details_cen  .update_con .update_center .update').css({"display":"block"});
  $.ajax({
    url:"course_description_c/course_descrip_update.php",
    type:'post',
    data:{
      articlesId:articlesId,
      //article_postId:article_post_id,
      articlesSlug:articlesSlug,
    },
    success:function(result){
      $('.table_details_cen  .update_con .update_center .update').html(result);
      media_sizes();
    }
  });
}

function updateCourseDescriptRecord(article_id){
  
  var articlesId = article_id;
  var udescription_type = document.getElementById('udescription_type').value;
  var upost_type = document.getElementById('upost_type').value;
  var uproduct_descrips = document.getElementById('uproduct_descrips').value;
  var ustatus_sel = document.getElementById('ustatus_sel').value;
  var socialUpostId = document.getElementById('social_upost_id').value;
  //alert(price_type_sel)
  //alert();
  $.ajax({
    url:"course_description_c/course_descrip_up_status.php",
    type:'post',
    data:{
      articlesId:articlesId,
      udescription_type:udescription_type,
      upost_type:upost_type,      
      uproduct_descrips:uproduct_descrips,
      ustatus_sel:ustatus_sel,
      social_Upost_Id:socialUpostId
    },
    success:function(result){
      $('.table_details_cen .table_details .info_media_contents').html(result);
      //$('.right_container .department_head .table_details_con .table_details_cen .table_details .media_search_group').html(result);
      $('.table_details_cen  .update_con .update_center .update').css({"display":"none"});     
        load_data(1);
    }
  });
}

/*Course Fees Ends*/

/*Course List Level categories Starts*/
function select_list_levels(){
  var parent_val = document.getElementById('parent_val').value;
  var sub_val = document.getElementById('sub_val').value;
  var cate_group_val = document.getElementById('cate_group_val').value; 
  var menu_slug = document.getElementById('menu_slug').value; 
  var cate_level_val = document.getElementById('level').value; 
  var head_services = document.getElementById('head_services').innerHTML;
  var list_levels = document.getElementById("list_levels").value;
  //alert(roles_view)
  if(parent_val != "" && list_levels != ""){
    $.ajax({
      url:"course_list_c/level_form_create.php",
      type:'post',
      data:{
        parent_val: parent_val,
        sub_val:sub_val,
        cate_group_val:cate_group_val,
        menu_slug:menu_slug,
        cate_levelVal:cate_level_val,
        head_services:head_services,
        list_levels:list_levels,
      },
      success:function(result){
        $('.levels_ajax').html(result);

      }
    }); 
  }else{
    alert("Please select the course");
  }
}

function courselist_create(){
  
  //var social_head_select = document.getElementById('social_head_select').value;
  //var campLoc = camp_register.camp_reg.value;
  //camp_register
    var parent_val = document.getElementById('parent_val').value;
    var menu_level = document.getElementById('menu_level').value; 
    menu_sub_ids = 0;
    if(menu_level != 1){
      var menu_sub_ids = document.getElementById('descrip_type').value;
    }
    
    
    var menu_slug = document.getElementById('menu_slug').value; 
    var head_services = document.getElementById('head_services').innerHTML;
    var list_type = document.getElementById('list_type').value;
    var post_type = document.getElementById('post_type').value; 
    var product_list = document.getElementById('product_list').value;
    var list_status = document.getElementById('list_status').value;
    var social_upost_id = document.getElementById('social_upost_id').value;
    if(parent_val != ""){
//alert(menu_sub_ids);

       if($('.course_level_check').valid() == true){
        $('.right_container .department_head .social_create_out').show();
        $('.right_container .department_head .social_overlay').show();
        
        //alert(parent_val + "-" +menu_slug + "-" +sub_val + "-" +cate_group_val  + "-" + head_services);
        $.ajax({
              url:'course_list_c/course_list_post.php',
              type:'post',
              data:{
                parent_val: parent_val,
                menu_sub_ids:menu_sub_ids,
                menu_level:menu_level,
                menu_slug:menu_slug,
                head_services:head_services,
                list_type:list_type,
                post_type:post_type,
                product_list:product_list,
                list_status:list_status,
                socialUpostId:social_upost_id
              },
              success:function(result){
                $('.social_create_out').html(result);
                load_data(1);
                // setTimeout(function() {
                //      $('.right_container .social_media_create .social_create_out').hide();
                //      $('.right_container .social_media_create .social_overlay').hide();
                //   }, 10000);
              }
          });
       }
     }else{
      alert("Please Select the course");
     }
}

function update_course_list(article_id,articles_slug){
  var articlesId = article_id;
  //var article_post_id = article_post_id;
  var articlesSlug = articles_slug;
  
  $('.table_details_cen  .update_con .update_center .update').css({"display":"block"});
  $.ajax({
    url:"course_list_c/course_list_update.php",
    type:'post',
    data:{
      articlesId:articlesId,
      //article_postId:article_post_id,
      articlesSlug:articlesSlug,
    },
    success:function(result){
      $('.table_details_cen  .update_con .update_center .update').html(result);
      media_sizes();
    }
  });
}

function updateCourseListRecord(article_id){
  
  var articlesId = article_id;
  var uproduct_lists = document.getElementById('uproduct_lists').value;
  var ustatus_sel = document.getElementById('ustatus_sel').value;
  var socialUpostId = document.getElementById('social_upost_id').value;
  //alert(price_type_sel)
  //alert();
  $.ajax({
    url:"course_list_c/course_list_up_status.php",
    type:'post',
    data:{
      articlesId:articlesId, 
      uproduct_lists:uproduct_lists,
      ustatus_sel:ustatus_sel,
      social_Upost_Id:socialUpostId
    },
    success:function(result){
      $('.table_details_cen .table_details .info_media_contents').html(result);
      //$('.right_container .department_head .table_details_con .table_details_cen .table_details .media_search_group').html(result);
      $('.table_details_cen  .update_con .update_center .update').css({"display":"none"});     
        load_data(1);
    }
  });
}

/*Course List Level categories Ends*/



/*Course List Level categories Starts*/
function select_faq_levels(){
  var parent_val = document.getElementById('parent_val').value;
  var sub_val = document.getElementById('sub_val').value;
  var cate_group_val = document.getElementById('cate_group_val').value; 
  var menu_slug = document.getElementById('menu_slug').value; 
  var cate_level_val = document.getElementById('level').value; 
  var head_services = document.getElementById('head_services').innerHTML;
  var list_levels = document.getElementById("list_levels").value;
  //alert(roles_view)
  if(parent_val != "" && list_levels != ""){
    $.ajax({
      url:"course_faq_c/level_form_create.php",
      type:'post',
      data:{
        parent_val: parent_val,
        sub_val:sub_val,
        cate_group_val:cate_group_val,
        menu_slug:menu_slug,
        cate_levelVal:cate_level_val,
        head_services:head_services,
        list_levels:list_levels,
      },
      success:function(result){
        $('.levels_ajax').html(result);

      }
    }); 
  }else{
    alert("Please select the course");
  }
}

function coursefaq_create(){
  
  //var social_head_select = document.getElementById('social_head_select').value;
  //var campLoc = camp_register.camp_reg.value;
  //camp_register
    var parent_val = document.getElementById('parent_val').value;
    var menu_level = document.getElementById('menu_level').value; 
    menu_sub_ids = 0;
    if(menu_level != 1){
      var menu_sub_ids = document.getElementById('descrip_type').value;
    }
    
    
    var menu_slug = document.getElementById('menu_slug').value; 
    var head_services = document.getElementById('head_services').innerHTML;
    var faq_type = document.getElementById('faq_type').value;
    var post_type = document.getElementById('post_type').value; 
    var product_faq = document.getElementById('product_faq').value;
    var faq_status = document.getElementById('faq_status').value;
    var social_upost_id = document.getElementById('social_upost_id').value;
    if(parent_val != ""){
//alert(menu_sub_ids);

       if($('.course_level_check').valid() == true){
        $('.right_container .department_head .social_create_out').show();
        $('.right_container .department_head .social_overlay').show();
        
        //alert(parent_val + "-" +menu_slug + "-" +sub_val + "-" +cate_group_val  + "-" + head_services);
        $.ajax({
              url:'course_faq_c/course_faq_post.php',
              type:'post',
              data:{
                parent_val: parent_val,
                menu_sub_ids:menu_sub_ids,
                menu_level:menu_level,
                menu_slug:menu_slug,
                head_services:head_services,
                faq_type:faq_type,
                post_type:post_type,
                product_faq:product_faq,
                faq_status:faq_status,
                socialUpostId:social_upost_id
              },
              success:function(result){
                $('.social_create_out').html(result);
                load_data(1);
                // setTimeout(function() {
                //      $('.right_container .social_media_create .social_create_out').hide();
                //      $('.right_container .social_media_create .social_overlay').hide();
                //   }, 10000);
              }
          });
       }
     }else{
      alert("Please Select the course");
     }
}

function update_course_faq(article_id,articles_slug){
  var articlesId = article_id;
  //var article_post_id = article_post_id;
  var articlesSlug = articles_slug;
  
  $('.table_details_cen  .update_con .update_center .update').css({"display":"block"});
  $.ajax({
    url:"course_faq_c/course_faq_update.php",
    type:'post',
    data:{
      articlesId:articlesId,
      //article_postId:article_post_id,
      articlesSlug:articlesSlug,
    },
    success:function(result){
      $('.table_details_cen  .update_con .update_center .update').html(result);
      media_sizes();
    }
  });
}

function updateCoursefaqRecord(article_id){
  
  var articlesId = article_id;
  var uproduct_faqs = document.getElementById('uproduct_faqs').value;
  var ustatus_sel = document.getElementById('ustatus_sel').value;
  var socialUpostId = document.getElementById('social_upost_id').value;
  //alert(price_type_sel)
  //alert();
  $.ajax({
    url:"course_faq_c/course_faq_up_status.php",
    type:'post',
    data:{
      articlesId:articlesId, 
      uproduct_faqs:uproduct_faqs,
      ustatus_sel:ustatus_sel,
      social_Upost_Id:socialUpostId
    },
    success:function(result){
      $('.table_details_cen .table_details .info_media_contents').html(result);
      //$('.right_container .department_head .table_details_con .table_details_cen .table_details .media_search_group').html(result);
      $('.table_details_cen  .update_con .update_center .update').css({"display":"none"});     
        load_data(1);
    }
  });
}

/*Course List Level categories Ends*/


function batchMapping_create(){
  
  //var social_head_select = document.getElementById('social_head_select').value;
  //var campLoc = camp_register.camp_reg.value;
  //camp_register
  // For All categories 
    var parent_val = document.getElementById('parent_val').value;    
    var cate_group_val = document.getElementById('cate_group_val').value; 
    var menu_slug = document.getElementById('menu_slug').value; 
    var head_services = document.getElementById('head_services').innerHTML;
  // For Blog
    var parent_val_s = document.getElementById('parent_val_s').value;
    var level_s = document.getElementById('level_s').value;    
    var head_services_s = document.getElementById('head_services_s').innerHTML;   
  
     var sposted_date = document.getElementById('sposted_date').value;  
    //var social_status_select = document.getElementById('social_status_select').value;
    var sexpiry_date = document.getElementById('sexpiry_date').value;

    
    var descrip_status = document.getElementById('descrip_status').value;
    var social_upost_id = document.getElementById('social_upost_id').value;
    if(parent_val != "" && parent_val_s != ""){


       if($('.batch_mapping_check').valid() == true){
        $('.right_container .department_head .social_create_out').show();
        $('.right_container .department_head .social_overlay').show();
        
        //alert(parent_val + "-" +menu_slug + "-" +cate_group_val  + "-" + head_services+ "-" +parent_val_s + "-" +menu_slug_s + "-" +cate_group_val_s  + "-" + head_services_s);
        $.ajax({
              url:'course_mapping_c/course_mapping_post.php',
              type:'post',
              data:{
                parent_val: parent_val,                
                cate_group_val:cate_group_val,
                menu_slug:menu_slug,
                head_services:head_services,
                parent_val_s: parent_val_s,
                level_s: level_s,
                head_services_s:head_services_s,                
                sposted_date:sposted_date,
                sexpiry_date:sexpiry_date,
                descrip_status:descrip_status,
                socialUpostId:social_upost_id
              },
              success:function(result){
                $('.social_create_out').html(result);
                load_data(1);
                // setTimeout(function() {
                //      $('.right_container .social_media_create .social_create_out').hide();
                //      $('.right_container .social_media_create .social_overlay').hide();
                //   }, 10000);
              }
          });
       }
     }else{
      alert("Please Select the Category or Course name");
     }
}

function batch_mapping(article_id,articles_slug){
  var articlesId = article_id;
  //var article_post_id = article_post_id;
  var articlesSlug = articles_slug;
  
  $('.table_details_cen .update_con .update_center .update').css({"display":"block"});
  $.ajax({
    url:"course_mapping_c/batch_mapping_update.php",
    type:'post',
    data:{
      articlesId:articlesId,
      //article_postId:article_post_id,
      articlesSlug:articlesSlug,
    },
    success:function(result){
      $('.table_details_cen .update_con .update_center .update').html(result);
      media_sizes();
    }
  });
}

function updateBatchMappingRecord(article_id){
  
  var articlesId = article_id;
  var useat_count = document.getElementById('useat_count').value;
  var uposted_dates = document.getElementById('uposted_dates').value;
  var uexpiry_dates = document.getElementById('uexpiry_dates').value;
  var ustatus_sel = document.getElementById('ustatus_sel').value;
  var socialUpostId = document.getElementById('social_upost_id').value;
  //alert(price_type_sel)
  //alert();
  $.ajax({
    url:"course_mapping_c/batch_mapping_up_status.php",
    type:'post',
    data:{
      articlesId:articlesId, 
      useat_count:useat_count,
      uposted_dates:uposted_dates,
      uexpiry_dates:uexpiry_dates,
      ustatus_sel:ustatus_sel,
      social_Upost_Id:socialUpostId
    },
    success:function(result){
      $('.table_details_cen .table_details .info_media_contents').html(result);
      //$('.right_container .department_head .table_details_con .table_details_cen .table_details .media_search_group').html(result);
      $('.table_details_cen  .update_con .update_center .update').css({"display":"none"});     
        //load_data(1);
    }
  });
}



