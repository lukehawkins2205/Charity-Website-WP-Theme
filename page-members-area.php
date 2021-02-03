<?php

if(!is_user_logged_in()){
    wp_redirect(esc_url(site_url('/')));
    exit;
}
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
                                <h3>View the latest lodge posts</h3>
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
                <div><h5 class="breadcrumb-size"><a class="breadcrumb-custom" href="<?php echo site_url('/'); ?>">Home</a> / <?php the_title() ?></h5></div>
            </div>
        </div>
    </div>
    <br>













	<?php

    $args = array(
	    'post_type' => 'announcement',
	    'order' => 'DESC',
	    'posts_per_page' => '1'
    );

    $pageQuery = new WP_Query($args);

    while($pageQuery->have_posts()){

	    $pageQuery->the_post(); ?>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-primary" role="alert">
	                <?php the_content() ?>
                </div>
            </div>
        </div>
    </div>


	    <?php
    }

?>




<div class="container">
    <div class="row">
        <div class="col">
            <ul class="list-group list-group-flush" style="margin-left: 0px">
                <a class="li-link" href="<?php echo  esc_url(site_url('/Private-Lodge-Articles')); ?>">
                    <li class="list-group-item btn-enlarge-animation">
                         <div class="row pl-3 pr-3">
                            <div class="col-xs-1 col-li-icon"><i class="far fa-newspaper fa-3x"></i></div>
                            <div class="col-xs-11 d-flex align-items-center li-font">Articles</div>
                        </div>
                    </li>
                </a>
                <a class="li-link" href="<?php echo  esc_url(site_url('/Private-Lodge-Events')); ?>">
                    <li class="list-group-item btn-enlarge-animation">
                        <div class="row pl-3 pr-3">
                            <div class="col-xs-1 col-li-icon"><i class="far fa-calendar-alt fa-3x"></i></div>
                            <div class="col-xs-11 d-flex align-items-center li-font">Events</div>
                        </div>
                    </li>
                </a>
            </ul>
        </div>
    </div>
</div>


  
    <?php
}

get_footer();

?>