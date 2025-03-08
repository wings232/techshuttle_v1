<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techshuttle | Home</title>    
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/root.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fonts.css"/>    
    <link rel="stylesheet" href="css/animation.css"/> 
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <div class='container'> <!--container Starts -->
        <div class='header_con'><!--header_con Starts -->
            <?php include "header.php"; ?>
        </div><!--header_con Ends -->

        <section class="main-banner">
            <?php  include "banner.php"; ?>
        </section>


        <div class="course_t_con"><!--course_t_con Starts -->
            <?php include "course_index.php"; ?>
        </div><!--course_t_con Ends -->


        <div class="about_in_con"><!--about_in_con Starts -->
            <?php include "about.php"; ?>       
        </div><!--about_in_con Ends -->

        
        <div class="blog_t_con"><!--blog_t_con Starts -->
            <?php include "blog_index.php"; ?>      
        </div><!--blog_t_con Starts -->


        <div class="certi_cor_con"><!--certi_cor_con Starts -->
            <?php include "certi_index.php"; ?>
        </div><!--certi_cor_con Ends -->

        <div class="footer_con"><!--footer_con Starts -->
            <?php include "footer.php"; ?>  
        </div><!--footer_con Ends -->

    </div><!--container Ends -->
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>
