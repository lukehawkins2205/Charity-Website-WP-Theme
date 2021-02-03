# Charity Website

Hi! This is a website that I developed for a local charity. They wanted an online presence but also a central repository for members to keep up to date with the latest news from their charity. 


# Technologies

 - Javascript ES6
 - Jquery
 - HTML
 - CSS
 - PHP
 - React
 - Webpack bundler
 - Wordpress CMS
 - NPM
 - Node.js
 - Google Maps API
 - Facebook Page API

# Libraries

 - FontAwesome
 - Bootstrap 4
 - Babel
 - React
 - AOS

# Features
## **Authentication**

> Members of the charity can login to the website to access private
> content that is not visible to the public.

After authentication, a **X-WP-Nonce** is generated server side in **functions.php** and is retrieved as a **variable** in **header.php**. This is placed in the **header** of **AJAX** calls when making a request to the **API** for **validation**.

## **Fetching posts via AJAX**

> There are two pages that take advantage of using **AJAX**. That is the
> events page and articles page.  Technically, its one **HTML** document
> (**page-articles.php**) which utilizes **React** for **state
> management**
> (**assets\src\js\components\search-page-component\index.js**).

**Events page**
When 'events' is identified in the URL, the state of the **search-page-component** changes to display the calendar.

Transferring the date from the **MonthPicker** component (child) to **search-page-component** (Parent), A callback was needed due to this being the location of the AJAX calls

**Inside search-page-component** (Parent): 
   

     <MonthPicker  date={this.getDate.bind(this)}></MonthPicker>

**Inside MonthPicker** component (child) 

    handleAMonthChange = (year, month) => {
        let newState = {
            singleValue: {
                year: year,
                month: month
            },
        }
        this.props.date(newState.singleValue);
    }

Example of AJAX call in search-page-component

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

**Articles Page**
When 'articles' is identified in the URL, the state of the **search-page-component** changes to display a **HTML input tag**. Once the user clicks to search, an **event handler** retrieves the value and makes an **AJAX call**. 

> Page uses AJAX to make a call to the CMS API using custom query params
> located in **search-route.php** to retrieve the filtered posts.

Example of custom query

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


## **SMTP**

> On the homepage, you will find a **bootstrap** modal that displays a
> **HTML form** for users that are interested in joining the charity. Once filled out, this will send an email to the desired email address.

When the form is submitted, it is passed to an **event handler** which retrieves the values and makes an **AJAX** call to the **CMS API**. Within **functions.php**, **cvf_send_message()** retrieves this data and constructs a **HTML** **email template** with the passed information and sends it to the configured destination via **SMTP**. 

Event handler Location: assets\src\js\old\index.js
SMTP function: functions.php


## **Compatible across all browsers**
This was possible by using **Babel**
## **Designed Mobile first**
CSS framework **Bootstrap** was used to structure the website which dynamically adjust the website to the device it is used on. 
## **Custom Post Types**
The charity desired to be able to post events so a custom post type that has date properties has been created to manipulate that. 
## **Custom Comments**
The charity required a guest book for members of different charities could sign it. The basic comments wp functions have been manipulated to only display on the guestbook page.

 

```
