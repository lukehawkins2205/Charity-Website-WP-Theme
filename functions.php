<?php

require get_theme_file_path('/inc/search-route.php');
require get_theme_file_path('/inc/search-route-article.php');







function twynhamLodgeFiles (){

    wp_enqueue_style( 'Footer', get_stylesheet_directory_uri() . '/css/Footer-Basic.css', array(), 20141119 );



	wp_enqueue_style( 'finalCss', get_template_directory_uri() . '/assets/build/css/main.css', array (), true);
	wp_enqueue_script( 'finalScript', get_template_directory_uri() . '/assets/build/js/main.js', array (), 1.1, true);


	wp_localize_script('finalScript', 'lodgeData', array(
		'root_url' => get_site_url(),
		'nonce' => wp_create_nonce('wp_rest')
	));
     

    
}

add_action('wp_enqueue_scripts', 'twynhamLodgeFiles');







function namegoeshere(){
	add_theme_support('title-tag');
}

add_action('after_setup_theme', 'namegoeshere');



function lodge_custom_rest(){
    register_rest_field('event','eventDate',array(
        'get_callback' => function(){
            return get_field('event_date');
        }
    ));
}

add_action('rest_api_init', 'lodge_custom_rest');



add_filter( 'comment_form_defaults', 'change_comment_form_defaults');
function change_comment_form_defaults( $default ) {
    $commenter = wp_get_current_commenter();    
    $default[ 'fields' ][ 'email' ] .= '<p class="comment-form-author">' .
        '<label for="lodge_number">'. __('Lodge Number') . '</label>
        <span class="required">*</span>
        <input id="lodge_number" name="lodge_number" size="30" type="text" /></p>';
    return $default;
}



add_action( 'comment_post', 'save_comment_meta_data' );
function save_comment_meta_data( $comment_id ) {
    add_comment_meta( $comment_id, 'lodge_number', $_POST[ 'lodge_number' ] );
}


add_filter( 'preprocess_comment', 'verify_comment_meta_data' );
function verify_comment_meta_data( $commentdata ) {
    if ( ! isset( $_POST['lodge_number'] ) )
        wp_die( __( 'Error: please fill the required field (lodge Number).' ) );
    return $commentdata;
}


add_filter('comment_form_default_fields', 'website_remove');
function website_remove($fields)
{
if(isset($fields['url']))
unset($fields['url']);
unset( $fields['cookies'] );
return $fields;
}


function custom_comment_form_defaults( $defaults ) {
  $defaults['title_reply'] = __( 'Sign Here' );
  $defaults['submit_button'] =  '<button type="submit" class="btn-custom">Sign     <i class="fas fa-pen-fancy"></i></button>';
  $defaults['comment_notes_before'] = __( '' );
  $defaults['comment_notes_after'] = __( '' );
  return $defaults;
}
add_filter( 'comment_form_defaults', 'custom_comment_form_defaults' );





add_action('wp_ajax_cvf_send_message', array('CVF_Posts', 'cvf_send_message') );
add_action('wp_ajax_nopriv_cvf_send_message', array('CVF_Posts', 'cvf_send_message') );
add_filter('wp_mail_content_type', array('CVF_Posts', 'cvf_mail_content_type') );

class CVF_Posts {
   
    public static function cvf_send_message() {
       
        if (isset($_POST['message'])) {
           
            $to = 'email@outlook.com';
            $headers = 'From: ' . $_POST['name'] . ' <"' . $_POST['email'] . '">';
            $subject = "New Member Enquiry | Name: " . $_POST['name'];
           
            ob_start();
           
            echo '
                <h2>Message:</h2>' .
                wpautop($_POST['message']) . '
                <br />
                <h2>Contact Email:</h2>' .
                wpautop($_POST['email']) . '
                <br />
                --
                <p><a href = "' . home_url() . '">lodgeofbrevity9903.co.uk</a></p>
            ';
           
            $message = ob_get_contents();
           
            ob_end_clean();

            $mail = wp_mail($to, $subject, $message, $headers);
           
            if($mail){
                echo 'success';
            }
        }else{

	        $to = 'email@outlook.com';
	        $headers = 'From: ' . $_POST['name'] . ' <"' . $_POST['email'] . '">';
	        $subject = "Event Submission | Name: " . $_POST['name'];

	        ob_start();

	        echo '
                <h2>Event:</h2>' .
	             wpautop($_POST['event']) . '
                <br />
                <h2>Contact Email:</h2>' .
	             wpautop($_POST['email']) . '
                <br />
                <h2>Additional information:</h2>' .
	             wpautop($_POST['moreInfo']) . '
                <br />
                --
                <p><a href = "' . home_url() . '">lodgeofbrevity9903.co.uk</a></p>
            ';

	        $message = ob_get_contents();

	        ob_end_clean();

	        $mail = wp_mail($to, $subject, $message, $headers);

	        if($mail){
		        echo 'success';
	        }
        }
       
        exit();
       
    }
       
    public static function cvf_mail_content_type() {
        return "text/html";
    }
}




// Redirect subscriber accounts out of admin onto Homepage < Moved to PLUGIN
/*function my_restrict_wpadmin_access() {
	if ( ! defined('DOING_AJAX') || ! DOING_AJAX ) {
		$user = wp_get_current_user();

		if ( isset( $user->roles ) && is_array( $user->roles ) ) {
			if ( in_array('subscriber', $user->roles) ) {
				$data_login = get_option('axl_jsa_login_wid_setup');
				wp_redirect( site_url('/members-area') );
				die;
			}
		}
	}
}
add_action( 'admin_init', 'my_restrict_wpadmin_access' ); */



add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar(){

	$currentUser = wp_get_current_user();

	if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber' ){
		show_admin_bar(false);

	}
}

//customize login screen
add_filter('login_headerurl', 'headerURL');

function headerURL(){
	return esc_url(site_url('/'));
}


//change CSS on backend wordpress
add_action('login_enqueue_scripts', 'loginCSS');

function loginCSS(){
	wp_enqueue_style( 'finalCss', get_template_directory_uri() . '/assets/build/css/main.css', array (), true);
}


function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/BREVITY-LOGO.png);
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
