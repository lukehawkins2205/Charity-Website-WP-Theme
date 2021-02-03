 <?php get_header(); ?>

    


    <!-- Start: heading -->
   <div class="head-bck-image head-wrap">
        <section class="head-section box-shadow">
            <div class="container-fluid d-flex justify-content-center align-items-center head-container">
                <div class="row head-cont-row">
                    <div class="col-12 d-flex justify-content-center align-items-center ie-width-100">
                        <div class="d-flex d-md-flex head-title-wrap">
                            <h1 id="title2" class="text-center d-lg-flex heading-title" >Lodge of Brevity 9903</h1>
                        </div>
                    </div>
                    <div class="col d-flex d-lg-flex justify-content-center align-items-center">
                        <div class="d-md-flex justify-content-md-end head-title-wrap head-image-wrap"data-aos="fade-up" data-aos-duration="1000">
                            <img class="ie-width-100" src="<?php echo get_template_directory_uri(); ?>/img/BREVITY-LOGO.png">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End: heading -->
    
    <!-- Start: intro -->
    <section class="intro-section-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="intro-wrap" >
                        <h1 class="heading-font">Freemason Lodge</h1>
                        <p class="font-p">The Lodge of Brevity No 9903 was Consecrated in Southampton on Friday, 13 th March 2015 by the Provincial Grand Master RW Bro Michael Wilks<br></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: intro -->
 
    <!-- Start: panel-right -->
 <?php

$args = array(
    'post_type' => 'page',
    'meta_query' => array(
        array(
            'key' => 'homepage_priority',
            'value' => '1'
        )
    )
);
$pageQuery = new WP_Query($args);

while($pageQuery->have_posts()){

    $pageQuery->the_post(); ?>

    <section class="panel-section">
        <div class="container-fluid cont-fluid">
            <div class="row cont-fluid-row">
                <div class="col-12 col-sm-12 col-md-6 d-xl-flex justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start panel-image-col">
                    <div class="panel-image-col-div">
                        <div class="d-xl-flex d-flex justify-content-end panel-image-col-div-background">
                            <div class="panel-image-wrap box-shadow"><img class="panel-image" src="<?php the_field('header_image'); ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex d-md-flex justify-content-start justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start">
                    <div class="text-left panel-div-content-right-wrap">
                        <div class="panel-div-content-right">
                            <h1 class="panel-heading" data-aos="fade-up" data-aos-duration="1000"><?php the_title() ?>
                            </h1>
                            <p class="font-p" data-aos="fade-up" data-aos-duration="1000"><?php the_field('homepage_small_text'); ?><br>
                            </p>
                            <div data-aos="fade-up" data-aos-duration="1000">
                                <a class="btn-enlarge-animation customButtom" href="<?php the_permalink() ?>">
                                    <span class="btn-text">Read More</span>
                                    <span class="btnArrow"><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}

?>

<!-- Start: panel-left -->

<?php


$args = array(
    'post_type' => 'page',
    'meta_query' => array(
        array(
            'key' => 'homepage_priority',
            'value' => '2'
        )
    )
);

$pageQuery = new WP_Query($args);

while($pageQuery->have_posts()){

    $pageQuery->the_post(); ?>

    <section class="panel-section">
        <div class="container-fluid cont-fluid">
            <div class="row cont-fluid-row">
                <div class="col d-flex d-md-flex justify-content-end justify-content-md-end justify-content-lg-end justify-content-xl-end">
                    <div class="text-right panel-div-content-left-wrap">
                        <div class="panel-div-content-left">
                            <h1 class="panel-heading" data-aos="fade-up" data-aos-duration="1000">
                                <?php the_title() ?>
                            </h1>
                            <p class="font-p" data-aos="fade-up" data-aos-duration="1000">
                                <?php the_field('homepage_small_text'); ?>
                            </p>
                            <div data-aos="fade-up" data-aos-duration="1000">
                                <a class="btn-enlarge-animation customButtom" href="<?php the_permalink() ?>">Read More<span class="btnArrow">
                                   <i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 d-xl-flex justify-content-start justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start panel-image-col">
                    <div class="panel-image-col-div">
                        <div class="d-xl-flex d-flex justify-content-start panel-image-col-div-background">
                            <div class="panel-image-wrap box-shadow">
                                <img class="panel-image" src="<?php the_field('header_image'); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php
}

?>
<!-- End: panel-left -->


<!-- End: panel-right -->



    <!-- Start: Join -->
 <section class="block-section">
     <div class="container">
         <div class="row block-row-head">
             <div class="col d-flex justify-content-center justify-content-sm-center guest-row-head">
                 <div class="block-head-wrap">
                     <h1 class="heading-font-white" data-aos="fade-up" data-aos-duration="1000">Interested in Joining?</h1>
                 </div>
             </div>
         </div>
         <div class="row d-flex d-sm-flex justify-content-center justify-content-sm-center justify-content-lg-center justify-content-xl-center block-row-card">
             <div class="col-11 col-sm-10 col-md-6 col-lg-5 col-xl-5">
                 <div class="card guest-card">
                     <div class="card-body text-center box-shadow guest-card-body">
                         <div class="wm-icon-wrap" data-aos="fade-up" data-aos-duration="1000">
                             <i class="fas fa-user-tie fa-4x"></i>
                         </div>
                         <br>
                         <div  data-aos="fade-up" data-aos-duration="1000">
                             <button type="button" class="btn-enlarge-animation customButtom" data-toggle="modal" data-target="#myModal">
                                 Sign Up Here
                                 <span class="btnArrow">
                                    <i class="fas fa-pen-fancy"></i>
                                </span>
                             </button>
                         </div>
                         <br>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>


 <!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
     <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <div class="intro-wrap">
                     <h1 class="heading-font" data-aos="fade-up" data-aos-duration="1000">Fill in The Details Below</h1>
                 </div>
             </div>
             <div class="modal-body">
                 <form method="post" id="myemailform" name="myemailform" action="">
                     <label id="label-name" for="fname">Name</label>
                     <textarea required id="input-name"  name="fname"></textarea>
                     <label id="label-email" for="femail">Email</label>
                     <textarea required id="input-email"  name="femail"></textarea>
                     <label id="label-message" for="fmessage">Why do you want to Join?</label>
                     <textarea required id="input-message" name="fmessage"></textarea>
                     <input  id="input-ajax" type="hidden" name="fajax" value="<?php echo admin_url('admin-ajax.php'); ?>">
                     <div class="text-center btn-padding">
                         <button id="input-submit" type="submit" class="btn-custom btn-enlarge-animation">Send Enquiry     <i class="fas fa-paper-plane"></i></button>
                     </div>
                 </form>
                 <div class="alert alert-success join-email-success" role="alert">
                     Your message has been sent. A Lodge member will be in touch.
                 </div>

             </div>
             <div class="modal-footer">
                 <button type="button" style="background-color: #cc0000; border: 2px solid #cc0000;" class="btn-custom btn-enlarge-animation" data-dismiss="modal">Close</button>
             </div>
         </div>

     </div>
 </div>
 <!-- End: Join -->


 <!-- Start: articles -->
 <section class="section-top">
     <div class="container">
         <div class="row d-flex justify-content-xl-start">
             <div class="col">
                 <div class="intro-wrap">
                     <h1 class="heading-font" data-aos="fade-up" data-aos-duration="1000">Latest Articles</h1>
                 </div>
             </div>
         </div>
         <div class="row news-card-row">

			 <?php


			 $args = array(
				 'posts_per_page' => '4',
				 'post_status' => 'publish',
				 'order' => 'DESC',
			 );

			 $pageQuery = new WP_Query($args);

			 while($pageQuery->have_posts()){

				 $pageQuery->the_post(); ?>

                 <div class="card-enlarge-animation col-sm-6 col-md-6 col-lg-3 news-col">
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

         <div class="row">
             <div class="col d-flex justify-content-center news-button" data-aos="fade-up" data-aos-duration="1000">
                 <a class="customButtom" href="<?php the_permalink(get_page_by_path( 'articles' )) ?>">More Articles<span class="btnArrow"><i class="fas fa-angle-right"></i></span>
                 </a>
             </div>
         </div>
 </section>
 <!-- End: Article -->


   <!-- Start: panel-right -->
   <?php 

$args = array(
 'post_type' => 'page',
 'meta_query' => array(
     array(
         'key' => 'homepage_priority',
         'value' => '3'
     )
 )
);
$pageQuery = new WP_Query($args);

 while($pageQuery->have_posts()){

 $pageQuery->the_post(); ?>

 <section class="panel-section">
     <div class="container-fluid cont-fluid">
         <div class="row cont-fluid-row">
             <div class="col-12 col-sm-12 col-md-6 d-xl-flex justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start panel-image-col">
                 <div class="panel-image-col-div">
                     <div class="d-xl-flex d-flex justify-content-end panel-image-col-div-background">
                         <div class="panel-image-wrap box-shadow">
                             <img  class="panel-image" src="<?php the_field('header_image'); ?>">
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col d-flex d-md-flex justify-content-start justify-content-sm-start justify-content-md-end justify-content-lg-end justify-content-xl-start">
                 <div class="text-left panel-div-content-right-wrap">
                     <div class="panel-div-content-right">
                         <h1 class="panel-heading" data-aos="fade-up" data-aos-duration="1000">
                             <?php the_title() ?>
                         </h1>
                         <p class="font-p" data-aos="fade-up" data-aos-duration="1000">
                             <?php the_field('homepage_small_text'); ?>
                             <br>
                         </p>
                         <div data-aos="fade-up" data-aos-duration="1000">
                             <a class="btn-enlarge-animation customButtom" href="<?php the_permalink() ?>">
                                 <span class="btn-text">Read More</span>
                                 <span class="btnArrow"><i class="fas fa-angle-right"></i></span>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <?php
}

?>


 <!-- End: panel-right -->

 


    <!-- Start: events -->
    <section class="section-top">
        <div class="container">
            <div class="row d-flex justify-content-xl-start">
                <div class="col">
                    <div class="intro-wrap">
                        <h1 class="heading-font" data-aos="fade-up" data-aos-duration="1000">Upcoming Events</h1>
                    </div>
                </div>
            </div>
            <div class="row news-card-row">


                  <?php
 

$args = array(
    'post_type' => 'event',
    'post_status' => 'publish',
    'order' => 'DESC',
    'posts_per_page' => '4'
        );

    $pageQuery = new WP_Query($args);

    while($pageQuery->have_posts()){

    $pageQuery->the_post(); ?>

            
                <div class="card-enlarge-animation col-sm-6 col-md-6 col-lg-3 news-col">
                    <a class="card-link-wrap" href="<?php the_permalink() ?>">
                    <div class="card card-wrap box-shadow" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card-image-wrap">
                            <img class="card-image" src="<?php the_field('header_image'); ?>">
                        </div>
                        <div class="card-body text-center d-flex align-items-center flex-column">
                            <div class="ie-width-100">
                            <div>
                                <h4 class="font-link"><?php the_title(); ?></h4>
                            </div>
                            <div class="card-event-date-wrap">
                                <p class="d-inline event-p-date events-date-wrap">
                                    <?php 
                                    $eventDate = new DateTime(get_field('event_date'));
                                    echo $eventDate->format('F j, Y')
                                    ?> | <?php
	                                echo get_field('event_time')
	                                ?>
                                 </p>
                            </div>
                            <div class="font-p">
                                <div>
                                    <p class="card-text font-p">
                                        <span>Location:</span>
                                        <?php the_field('location'); ?>
                                    </p>
                                </div>
                                <br>
                               <p class="card-text font-p"><?php the_field('small_text'); ?></p>
                                <br>
                            </div>
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

            <div class="row">
                <div class="col d-flex justify-content-center news-button" data-aos="fade-up" data-aos-duration="1000"><a class="customButtom" href="<?php the_permalink(get_page_by_path( 'events' )) ?>">More Events<span class="btnArrow"><i class="fas fa-angle-right"></i></span></a></div>
            </div>
       
    </section>
    <!-- End: events -->







 <!-- Start: guest -->
 <section class="block-section">
     <div class="container">
         <div class="row block-row-head">
             <div class="col d-flex justify-content-center justify-content-sm-center guest-row-head">
                 <div class="block-head-wrap">
                     <h1 class="heading-font-white" data-aos="fade-up" data-aos-duration="1000">Guest Book</h1>
                 </div>
             </div>
         </div>
         <div class="row d-flex d-sm-flex justify-content-center justify-content-sm-center justify-content-lg-center justify-content-xl-center block-row-card">
             <div class="col-11 col-sm-10 col-md-7 col-lg-6 col-xl-6">
                 <div class="card guest-card">
                     <div class="card-body text-center box-shadow guest-card-body">
                         <div class="wm-icon-wrap" data-aos="fade-up" data-aos-duration="1000">
                             <img class="guest-icon" src="<?php echo get_template_directory_uri(); ?>/img/book.jpg"></div>
                         <div class="guest-p-wrap">
                             <h4 data-aos="fade-up" data-aos-duration="1000">Sign our guest book if you have visited the Lodge of Brevity</h4>
                         </div>
                         <div class="guest-button" data-aos="fade-up" data-aos-duration="1000">
                             <a class="btn-enlarge-animation customButtom" href="<?php the_permalink(get_page_by_path( 'guest-book' )) ?>">Sign Here<span class="btnArrow"><i class="fas fa-pen-fancy"></i></span>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End: guest -->



 <!-- Start: Values -->
 <section class="block-section-values">
     <div class="container">
         <div class="row block-row-head" data-aos="fade-up" data-aos-duration="1000">
             <div class="col">
                 <div class="intro-wrap">
                     <h1 class="heading-font">Freemasonry Values</h1>
                 </div>
             </div>
         </div>
         <div class="row d-flex justify-content-center value-row-card">
             <div class="card-enlarge-animation col-9 col-sm-6 col-md-6 col-lg-3 values-col-card-wrap">
                 <div class="card values-card" data-aos="fade-up" data-aos-duration="1000">
                     <div class="card-body text-center values-card-body"><i class="values-image-icon fa-2x fas fa-balance-scale"></i>
                         <h4 class="card-title">Integrity<br></h4>
                         <p class="card-text">Membership provides the structure to help achieve that goal&nbsp;<br></p>
                     </div>
                 </div>
             </div>
             <div class="card-enlarge-animation col-9 col-sm-6 col-md-6 col-lg-3 values-col-card-wrap">
                 <div class="card values-card" data-aos="fade-up" data-aos-duration="1000">
                     <div class="card-body text-center values-card-body"><i class="values-image-icon fa-2x fas fa-handshake"></i>
                         <h4 class="card-title">Respect<br></h4>
                         <p class="card-text">Freemasonry brings people together irrespective of their race, religion or any other&nbsp;<br></p>
                     </div>
                 </div>
             </div>
             <div class="card-enlarge-animation col-9 col-sm-6 col-md-6 col-lg-3 values-col-card-wrap">
                 <div class="card values-card" data-aos="fade-up" data-aos-duration="1000">
                     <div class="card-body text-center values-card-body"><i class="values-image-icon fa-2x fas fa-hand-holding-water"></i>
                         <h4 class="card-title">Charity<br></h4>
                         <p class="card-text">Kindness and charitable giving are deeply ingrained within the principles of Freemasonry&nbsp;<br></p>
                     </div>
                 </div>
             </div>
             <div class="card-enlarge-animation col-9 col-sm-6 col-md-6 col-lg-3 values-col-card-wrap">
                 <div class="card values-card" data-aos="fade-up" data-aos-duration="1000">
                     <div class="card-body text-center values-card-body"><i class="values-image-icon fa-2x fas fa-users"></i>
                         <h4 class="card-title">Friendship<br></h4>
                         <p class="card-text">Freemasonry provides the common foundation for friendships between members&nbsp;<br></p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End: Values -->



    <!-- Start: panel-left -->

<?php 


$args = array(
    'post_type' => 'page',
    'meta_query' => array(
        array(
            'key' => 'homepage_priority',
            'value' => '4'
        )
    )
);

    $pageQuery = new WP_Query($args);

    while($pageQuery->have_posts()){

    $pageQuery->the_post(); ?>

    <section class="panel-section">
        <div class="container-fluid cont-fluid">
            <div class="row cont-fluid-row">
                <div class="col d-flex d-md-flex justify-content-end justify-content-md-end justify-content-lg-end justify-content-xl-end">
                    <div class="text-right panel-div-content-left-wrap">
                        <div class="panel-div-content-left">
                            <h1 class="panel-heading" data-aos="fade-up" data-aos-duration="1000">
                                <?php the_title() ?>
                            </h1>
                            <p class="font-p" data-aos="fade-up" data-aos-duration="1000">
                                <?php the_field('homepage_small_text'); ?>
                            </p>
                            <div data-aos="fade-up" data-aos-duration="1000">
                                <a class="btn-enlarge-animation customButtom" href="<?php the_permalink() ?>">
                                    <span class="btn-text">Read More</span>
                                    <span class="btnArrow"><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 d-xl-flex justify-content-start justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start panel-image-col">
                    <div class="panel-image-col-div">
                        <div class="d-xl-flex d-flex justify-content-start panel-image-col-div-background">
                            <div class="panel-image-wrap box-shadow">
                                <img class="panel-image" src="<?php the_field('header_image'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}

?>
    <!-- End: panel-left -->


 <!-- Start: Map Clean -->
 <div class="map-clean">
     <div class="container">
         <!-- Start: Intro -->
         <div class="block-row-head d-flex justify-content-center map-head-block">
             <br>
             <div class="intro-wrap">
                 <h1 class="heading-font" data-aos="fade-up" data-aos-duration="1000">Lodge Location</h1>
             </div>
             <br>
             <br>
         </div>
         <!-- End: Intro -->
     </div class="box-shadow"><iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJsUq4aT9zdEgRbOIHGOR4mF0&key=AIzaSyD5w1fWvxO9VikKRcXUT_P6fh0GM-k1KpE" allowfullscreen></iframe></div>
 <!-- End: Map Clean -->



 <!-- Start: Social-Feed -->
    <section class="">
        <div class="container">
            <div class="row d-flex d-sm-flex justify-content-center justify-content-sm-center justify-content-lg-center justify-content-xl-center">
                <div class="col-12 col-sm-12 col-md-11 col-lg-9 col-xl-9 block-col-wrap">
                    <div class="card">
                        <div class="card-body text-center box-shadow">
                            <div class="row">
                                <div class="col d-lg-flex justify-content-lg-center align-items-lg-center social-col-head">
                                    <div class="card social-message-card-wrap box-shadow">
                                        <div class="card-body">
                                            <div>
                                                <div class="row social-text-wrap">
                                                    <div class="col d-flex d-sm-flex justify-content-center align-items-center">
                                                        <div class="social-icon-wrap"><img data-aos="fade-right" data-aos-duration="1000" src="<?php echo get_template_directory_uri(); ?>/img/facebooklogo.png" style="width: 70px;"></div>
                                                    </div>
                                                </div>
                                                <div class="row social-text-wrap">
                                                    <div class="col">
                                                        <div>
                                                            <h1 class="social-text-heading">Social Media</h1>
                                                            <p class="font-p">Facebook page A page that shows the latest news on a daily update. Like this page</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="social-feed-wrap">
                                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBrevity9903&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Social-Feed -->





<?php get_footer();
?>