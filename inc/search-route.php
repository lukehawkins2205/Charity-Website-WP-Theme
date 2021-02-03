<?php 


add_action('rest_api_init', 'lodgeRegisterSearch');

function lodgeRegisterSearch(){
    register_rest_route('lodge/v1','search',array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'lodgeSearchResults'
    ));
}

function lodgeSearchResults($data){

	$headerStringValue = $_SERVER['HTTP_X_CUSTOM_HEADER'];

	if(is_user_logged_in() AND $headerStringValue === 'lodge-private'){
		$args = array(
			'post_type' => 'event',
			'post_status' => 'private',
			'order' => 'DESC',
            'paged' => $data['offset'],
			'meta_query' => array(
				array(
					'key' => 'event_date',
					'value' => $data['date'],
					'compare' => 'LIKE',
				)
			)
		);
	}else{
		$args = array(
			'post_type' => 'event',
			'post_status' => 'publish',
			'order' => 'DESC',
			'paged' => $data['offset'],
			'meta_query' => array(
				array(
					'key' => 'event_date',
					'value' => $data['date'],
					'compare' => 'LIKE',
				)
			)
		);
	}

	
    $events = new WP_Query($args);

    $eventResults = array();

    while($events->have_posts()){
    	$events->the_post();

    	$eventDate = new DateTime(get_field('event_date'));

    	array_push($eventResults,array(
    		
    		'title' => get_the_title(),
    		'permalink' => get_permalink(),
    		'image' => get_field('header_image'),
    		'eventDate' => $eventDate->format('F j, Y'),
		    'eventTime' => get_field('event_time'),
    		'location' => get_field('location'),
    		'excerpt' => get_field('small_text'),
    	));
    }
    

    return $eventResults;
}