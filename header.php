<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
            <title>Lodge Of Brevity 9903</title>
            <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/BREVITY-LOGO.png">
        <?php wp_head(); ?>
    </head>
    <body style="background-color: #efefef">
        <!-- Start: Navigation Clean -->
    <nav class="navbar box-shadow" style="color: white" id="navbar">
        <div id="navbar-cont" class="navbar-cont container" class="container">
            <a href="<?php echo site_url() ?>">
                <img id="nav-logo" class="nav-logo" src="<?php echo get_template_directory_uri(); ?>/img/BREVITY-LOGO.png">
            </a>
            <div class="header-menu">
            <span onclick="window.onOpenNav()">
                <div class="d-flex justify-content-center align-items-center">
                    <i class="burgerMenu fas fa-bars fa-2x"></i>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                     MENU
                </div>
            </span>
            </div>
            <div class="login-icon">
                <div class="dropdown">
                    <div class=" dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(is_user_logged_in()){?>
	                        <a class="dropdown-item" href="<?php echo wp_logout_url() ?>">Log Out</a>
                            <a class="dropdown-item" href="<?php echo  esc_url(site_url('/members-area')); ?>">Members Area</a>
                      <?php  }else{?>
	                        <a class="dropdown-item" href="<?php echo esc_url(site_url('/wp-login.php')) ?>">Login</a>
                     <?php   } ?>
                    </div>
                </div>
            </div>
            <div id="mySidenav" class="sidenav box-shadow">
                <a href="javascript:void(0)" class="closebtn" onclick="window.onCloseNav()">&times;</a>
               

                <a class="nav-link-custom" href="<?php echo get_home_url() ?>">
                    <p style='font-family: "Palatino", serif;'>Home</p>  
                </a>
            
	            <?php if(is_user_logged_in()){?>
                <a class="nav-link-custom" href="<?php echo  esc_url(site_url('/members-area')); ?>">
                    <p style='font-family: "Palatino", serif;'>Members Area</p>
                </a>
                   
	            <?php   } ?>


<?php 

                $pageQuery = new WP_Query(array('post_type' => 'page',
                                                'post_status' => 'publish',
                                                'posts_per_page' => 10));

while($pageQuery->have_posts()){

    $pageQuery->the_post(); ?>
    <div onclick="closeNav();">
    <a class="nav-link-custom" href="<?php echo get_permalink() ?>">
      <p style='font-family: "Palatino", serif;'><?php the_title()?></p>  
        
        </a>
    
    </div>
    <?php
}

?>

              </div>
        </div>
    </nav>
    <div id="overlay"></div>
    <!-- End: Navigation Clean -->
 