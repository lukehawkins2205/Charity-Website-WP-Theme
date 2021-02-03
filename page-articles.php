<?php 
/* 
Template Name: template-search
*/
?>


<?php get_header();

while(have_posts(  )){
    the_post(); ?>




     <!-- Start: heading -->
    <!-- Start: heading -->
    <div class="page-head head-wrap">
        <section class="page-head-section box-shadow">
            <div class="container">
                <div class="row">
                    <div class="col head-col head-font">
                        <div>
                            <div>
                                <h1>- <?php the_title() ?> -</h1>
                            </div>
                            <div>
                                <h3>Search Our Archives</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    </div>

     <!-- End: heading -->
     <!-- End: heading -->
   <!-- Start: Events -->
    <div class="container">
        <br>
        <div class="row">
            <div class="col">
                <div><h5 class="breadcrumb-size"><a class="breadcrumb-custom" href="<?php

                        if(is_page('Private Lodge Articles') OR is_page('Private Lodge Events') ){
	                        echo site_url('/members-area');
                        }else{
	                        echo site_url('/');
                        }
                        ?>">Home</a> / <?php the_title() ?></h5></div>
            </div>
        </div>
    </div>
    <br>


    <div>
        <div id="searchPageComponent"></div>
    </div>


    <?php
}

get_footer();

?>