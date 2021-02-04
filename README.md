# Charity Website

Hi! This is a website that I developed for a local charity. They needed an online presence but also required a central repository for members to keep up to date with the latest news from their charity. The perfect solution for this was to build a website with a CMS attached to it. 


## Technologies

 - Javascript ES6
 - Jquery
 - HTML
 - CSS
 - PHP
 - Webpack
 - Wordpress
 - NPM

## Libraries

 - FontAwesome
 - Bootstrap 4
 - Babel
 - React
 - AOS

## API

 - Wordpress API
 - Facebook API
 - Google Maps API

# Showcase
## **Authentication**

> Members of the charity can login to the website to access private
> content that is not visible to the public.

After authentication, a **X-WP-Nonce** is generated server side and is retrieved as a **variable** in **header.php** (This travels across all pages). For security, this is placed in the **header** of **AJAX** calls when making a request to the **REST API** for **validation**.

## Using **AJAX** to load searched WordPress content

> Located on the events and articles page. Depending on the **URL**, **React** **state** changes to either show a **calendar** or **input field** for text search

Example AJAX function:

    $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', lodgeData.nonce);
                },
                url: `${lodgeData.root_url}//wp-json/lodge/v1/search?date=${selectedYear}${selectedMonth}&offset=${pageOn}`,
                headers: { 'X-CUSTOM-HEADER': 'lodge-private' },
                type: 'GET',
                success: (returnedPosts) => {
                    this.setState(prevState => ({
                        singleValue: {
                            ...prevState.singleValue,
                            posts: returnedPosts,
                            prevPageOn: this.state.singleValue.pageOn,
                            hasRunGetDate: true,
                            month: selectedMonth,
                            year: selectedYear
                        }
                    }), () => {
                        if(returnedPosts.length === 0){
                            $('#next-btn').css({'display': 'none'})
                        }else{
                            $('#next-btn').css({'display': 'block'})
                        }
                    })
                },
                error: (data) => {
                    console.log('error with get post', data)
                }
            })
After making the **REST API** call, an **event hook** configured in **PHP** retrieves the **parameters** from within the **URL** to **validate** the user and customize the **JSON** data.

Example of **event hook**:

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



## **Sending emails via SMTP**

> Using the **CSS framework Bootstrap 4**, I created a **modal** that
> displayed a form when clicked. Once submitted, an **event handler** in
> **Javascript** prevents the **default behaviour** and constructs an **AJAX** call to the wordpress **REST API**.


                $('#myemailform').on('submit', (e) => {
                    e.preventDefault();
                    var ajaxurl = $('#input-ajax').val();

                  var data = {
	                'action': 'cvf_send_message',
	                'name': $('#input-name').val(),
	                'email': $('#input-email').val(),
	                'message': $('#input-message').val()
                  };

                    $.ajax({
                        type: "POST",
                        url: ajaxurl,
                        data: data,
                        success: (data) => {
                            $('.join-email-success').css({'display': 'block'});
                        }
                    });
                });



After making the **REST API** call, an **event hook** configured in **PHP** retrieves the data from within the body of the request and constructs a **HTML** email which is then sent to the desired location via **SMTP**

## **Compatible across all browsers**
This was possible by using **Babel**
## **Designed Mobile first**
CSS framework **Bootstrap 4** was used to structure the website so that it can be dynamic across all devices with ease.
## **Custom Post Types**
**Posts** with **date**, **location** and **time** properties.

## **Custom Comments**
The charity required a guest book for other charities to comment on. From this information, I created **filter hooks** to modify the **comment form defaults**.

 

```
