<?php get_header();

while(have_posts(  )){
    the_post(); ?>
    




    <!-- Start: heading -->
    <div class="page-head head-wrap">
        <section class="page-head-section box-shadow">
            <div class="container">
                <div class="row">
                    <div class="col head-col head-font">
                        <div>
                            <div>
                                <h3>- Event -</h3>
                            </div>
                            <div>
                                <h1><?php the_title() ?></h1>
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
                <div><h5 class="breadcrumb-size">
                <a class="breadcrumb-custom" href="<?php echo site_url('/'); ?>">Home</a> / <a class="breadcrumb-custom" href="<?php

						global $wp_query;
						$slug = $wp_query->query_vars['name'];
                        $status = get_page_by_path($slug, OBJECT, 'event');

						if ($status->post_status == "private") {
							echo site_url('/private-lodge-events');

						} else {
							echo site_url('/event');

						}
                        ?>">Events</a> / <?php the_title() ?></h5></div>
            </div>
        </div>
    </div>
    <br>






    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                     <div class="card box-shadow event-card-cont-page" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card-body text-center">
                        <div class="row">
                                <div class="col">
                                    <div class="event-card-text-wrap">
                                         <i class="event-card-icon-cal far fa-calendar-alt fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="event-card-text-wrap">
                                         <h4 class="d-inline event-p-date events-date-wrap">Date: <?php 

                                         $eventDate = new DateTime(get_field('event_date'));
                                        echo $eventDate->format('F j, Y')
                                             ?> | <?php
	                                         echo get_field('event_time')
	                                         ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="event-card-text-wrap">
                                        <h4 class="event-card-text-location">Location</h4>
                                        <h4 class="event-date-txt "><?php the_field('location'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                   <?php

                   if(is_user_logged_in()){

	                   global $wp_query;

	                   $current_user = wp_get_current_user();
	                   $first = $current_user->first_name;
	                   $last =  $current_user->last_name;
	                   $email = $current_user->user_email;
	                   $slug = $wp_query->query_vars['name'];
	                   $url = admin_url('admin-ajax.php');

                       echo '<div class="card box-shadow event-card-cont-page" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col">
                                    <div class="event-card-text-wrap">
                                        <h4 class="event-card-text-location">Register</h4>
                                        <form method="post" id="eventInterestForm" name="eventInterestForm" action="">
                                            <input id="input-first-name" type="hidden" name="ffirst-name" value="'.$first.'">
                                            <input id="input-last-name" type="hidden" name="flast-name" value="'.$last.'">
                                            <input id="input-email" type="hidden" name="femail" value="'.$email.'">
                                            <input id="input-event" type="hidden" name="fevent" value="'.$slug.'">
                                            <input  id="input-ajax" type="hidden" name="fajax" value="'.$url.'">
                                            <textarea class="font-p" rows="5" placeholder="For dining events, please provide additional information such as guests and dietary requirements here" id="event-input-message" name="fmessage"></textarea>
                                            <div class="text-center btn-padding">
                                            <button id="input-submit" type="submit" class="btn-custom btn-enlarge-animation">I Will Be Joining     <i class="fas fa-paper-plane"></i></button>
                                            </div>
                                        </form>
                                    <div class="alert alert-success join-email-success" role="alert">
                                        Your submission to the event has been recorded. A Lodge Member will be in touch.
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                   }

                    ?>



                </div>

                



                <div class="col">
                    <div class="row d-flex justify-content-center" data-aos="fade-up" data-aos-duration="1000">
                        <div class="col">
                            <div class="text">
                            <?php the_content() ?>
                        </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
</section>


<div onclick="onScrollUp()" class="scroll-up-icon"><i class="fas fa-chevron-circle-up fa-4x"></i></div>

                    
  

 
            
     









  
    <?php
}

get_footer();

?>