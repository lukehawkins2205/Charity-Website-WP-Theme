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
                                <h1>- <?php the_title() ?> -</h1>
                            </div>
                            <div>
                                <h3>Sign our book if you have visited the Lodge of Brevity</h3>
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

<!-- Comment Form - Start -->
  <section>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10 col-xl-8 d-xl-flex justify-content-xl-center align-items-xl-center">
                    <div class="card" style="border-radius: 0;">
                        <div class="card-body">
                           <?php 
                            comment_form();
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Comment Form - End -->
<!-- Comments - Start -->
 <section class="block-section">
        <div class="container">
            <div class="row block-row-head">
                <div class="col">
                    <div class="block-head-wrap">
                        <h1 class="heading-font" style="font-family: 'Crimson Text', serif;color: white ;font-size: 35px;border-left-style: none;">Visitors</h1>
                    </div>
                </div>
            </div>
            <div class='comment-wrap'>
            <?php // Arguments for the query
$args = array('status' => 'approve');

// The comment query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );

// The comment loop
if ( !empty( $comments ) ) {
    foreach ( $comments as $comment ) { ?>

         <div class="row d-flex justify-content-center comment-row">
                <div class="col-12 col-sm-12 col-md-11 col-lg-8 col-xl-8">
                    <div class="card mt-4" style="border-radius: 0;">
                        <div class="card-body box-shadow comment-card">
                            <div class="row comment-card-padding">
                                <div class="col-2 d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center"><i style="color: #192644;" class="fas fa-user-tie fa-3x"></i></div>
                                <div class="col">
                                    <h6 class="font-comment-author">Guest: <?php comment_author() ?></h6>
                                    <h6 class="d-inline event-p-date events-date-wrap">Lodge: <?php echo get_comment_meta( $comment->comment_ID, 'lodge_number', true ); ?></h6>
                                    <h6 class="font-comment-date">Date: <?php comment_date();?></h6>
                                    <p class="font-p"><?php echo $current_comment = get_comment_text(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    }
} else {
    echo 'No comments found';
} 

?>



        </div>
    </section>
<!-- Comments - End -->








  
    <?php
}

get_footer();

?>