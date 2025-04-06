<div class="header_center"><!--header_center Starts -->
    <div class="header"><!--header Starts -->
        <div class='logo_search'><!--logo_search Starts -->
            <div class='logo'><!--logo Starts -->
                <img src='images/logo_01.png'/>
            </div><!--logo Ends -->
            <div class='cate_m'><!--cate_m Starts -->
                <?php include "menu.php"; ?>
            </div><!--cate_m Ends -->
            <div class='search'>
                <div class='s_bar'>
                    <div class='search_box'>
                        <input type='text' placeholder="What do you want to learn?"/>
                    </div>
                    <div class='button'>
                        <button class="search_submit" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class='login'>
<?php
//$flag = 0;
    if($user_session == ""){
?>
                <div class="login_b">
                    <div class='login_tabs'>
                        <div class="image">
                            <i class='fas fa-user-alt'></i>
                        </div>
                        <div class="name">
                            Login
                        </div>
                    </div>
                </div>
<?php
    }  
    if($user_session != ""){

?>

                <div class="login_b">
                    <ul>
                        <li class="login_list"><span class='head_ellipsis'><i class='fas fa-user-alt'></i><?php echo $user_name; ?></span>
                            <div class='kmh_headbar_sublist'><!--fz_headbar_sublist Starts-->
                                <ul>                                
                                    <li><a href='students_portal.php'>Dashboard</a></li>
                                    <li><a class='last' href='ajax/portal/sign_off.php'>Log Out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php
    }  
?>
            </div>
        </div><!--logo_search Ends -->
    </div><!--header Ends -->
</div><!--header_center Ends -->