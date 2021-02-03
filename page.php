<?php get_header();

while(have_posts(  )){
    the_post(); ?>
    




     <!-- Start: heading -->
    <div class="page-head head-wrap">
        <section class="page-head-section box-shadow">
            <div class="container">
                <div class="row">
                    <div class="col head-col">
                        <div>
                            <div class="head-font">
                                <h1>- <?php the_title() ?> -</h1>
                            </div>
                            <div class="head-p">
                                <h5>The Lodge of Brevity No 9903 was Consecrated in Southampton on Friday, 13 th March 2015 by the Provincial Grand Master RW Bro Michael Wilks</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    </div>

     <!-- End: heading -->

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


    
<div class="container">
                     <div class="row" data-aos="fade-up" data-aos-duration="1000">
                        <div class="col-sm-12 col-md-8 mb-2">
                            <div class="text">
                                <?php the_content() ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                        <div class="row d-flex justify-content-xl-start">
                            <div class="col-12">
                                <div class="intro-wrap mb-5">
                                    <h1 class="heading-font" data-aos="fade-up" data-aos-duration="1000">Latest Articles</h1>
                                    </div>
                                 </div>
                        <div class="col-12">
                            
                            <?php


                            $args = array(
                                'post_status' => 'publish',
                                'posts_per_page' => '4',
                                'order' => 'DESC',
                                );

                            $pageQuery = new WP_Query($args);

                            while($pageQuery->have_posts()){

                             $pageQuery->the_post(); ?>

                            <div class="card-enlarge-animation col-12 mb-5">
                                <a class="card-link-wrap" href="<?php the_permalink() ?>">
                                    <div class="card card-wrap box-shadow" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="card-image-wrap">
                                            <img class="card-image" src="<?php the_field('header_image'); ?>">
                                        </div>
                                     <div class="card-body text-center d-flex align-items-center flex-column">
                                     <div class="ie-width-100">
                                     <h4 class="font-link"><?php the_title() ?></h4>
                                    <div>
                                    <p class="card-text font-p"><?php the_field('small_text'); ?></p>
                                </div>
                                <br>
                                </div>
                                <div class="mt-auto card-link font-link">
                                 - Read More -
                                 </div>
                                 <br>
                                </div>
                                </div>
                                 </a>
                             </div>

                            <?php }
                            ?>

                        </div>
                    </div>
             </div>
        </div>
   
<div onclick="window.onScrollUp()" class="scroll-up-icon"><i class="fas fa-chevron-circle-up fa-4x"></i></div>

    <?php
}

get_footer();

?>