<?php 


add_action('rest_api_init', 'lodgePostSearch');

function lodgePostSearch(){
    register_rest_route('lodge/v1','postSearch',array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'lodgePostSearchResults'
    ));
}

function lodgePostSearchResults($data){

	$headerStringValue = $_SERVER['HTTP_X_CUSTOM_HEADER'];

	if(is_user_logged_in() AND $headerStringValue === 'lodge-private'){
		$args = array(
			'post_type' => 'post',
			'post_status' => 'private',
			'order' => 'DESC',
            's' => sanitize_text_field($data['title']),
            'posts_per_page' => 8,
            'paged' => $data['offset']
		);
	}else{
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'order' => 'DESC',
            's' => sanitize_text_field($data['title']),
            'posts_per_page' => 8,
            'paged' => $data['offset']
		);
	}
    
    $events = new WP_Query($args);

    $eventResults = array();

    while($events->have_posts()){
        $events->the_post();

       

        array_push($eventResults,array(
            
            'title' => get_the_title(),
            'permalink' => get_permalink(),
            'image' => get_field('header_image'),
            'excerpt' => get_field('small_text'),
        ));
    }
    

    return $eventResults;
}














add_action('rest_api_init', 'lodgeInitialPostLoad');

function lodgeInitialPostLoad(){
    register_rest_route('lodge/v1','initialPostLoad',array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'lodgeInitialPostLoadResults'
    ));
}

function lodgeInitialPostLoadResults($data){

	$headerStringValue = $_SERVER['HTTP_X_CUSTOM_HEADER'];

	if(is_user_logged_in() AND $headerStringValue === 'lodge-private'){
		$args = array(
			'post_type' => 'post',
            'post_status' => 'private',
            'posts_per_page' => 8,
            'paged' => $data['offset']
		);
	}else{
		$args = array(
			'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 8,
            'paged' => $data['offset']
		);
	}

    $events = new WP_Query($args);

    $eventResults = array();

    while($events->have_posts()){
        $events->the_post();


        array_push($eventResults,array(
            
            'title' => get_the_title(),
            'permalink' => get_permalink(),
            'image' => get_field('header_image'),
            'excerpt' => get_field('small_text'),
        ));
    }
    

    return $eventResults;
}