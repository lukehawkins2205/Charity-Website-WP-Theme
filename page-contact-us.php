<?php
/*
Template Name: Contact-Us
*/
?>


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
                        <div class="col-sm-12 col-md-8">
                            <div class="text">
                            <?php the_content() ?>
                        </div>
                    </div>
             </div>
        </div>
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


<div onclick="window.onScrollUp()" class="scroll-up-icon"><i class="fas fa-chevron-circle-up fa-4x"></i></div>


    <?php
}

get_footer();

?>