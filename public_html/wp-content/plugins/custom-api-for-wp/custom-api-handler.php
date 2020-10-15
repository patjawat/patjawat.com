<?php

function custom_api_wp_show_success_message() {
    remove_action( 'admin_notices', 'custom_api_success_message' );
    add_action( 'admin_notices', 'custom_api_error_message' );
}

function custom_api_wp_show_error_message() {
    remove_action( 'admin_notices','custom_api_error_message');
    add_action( 'admin_notices','custom_api_success_message');
}

function custom_api_wp_empty_or_null( $value ) {
    if( ! isset( $value ) || empty( $value ) ) {
        return true;
    }
    return false;
}


function custom_api_success_message() {
    $class = "error";
    $message = get_option('custom_api_wp_message');
    echo "<div class='" . $class . "'> <p>" . $message . "</p></div>";
}

function custom_api_error_message() {
    $class = "updated";
    $message = get_option('custom_api_wp_message');
    echo "<div class='" . $class . "'><p>" . $message . "</p></div>";
}

function check_internet_connection() {
    return (bool) @fsockopen('test.miniorange.in', 443, $iErrno, $sErrStr, 5);
}

function get_timestamp() {
    $url = get_option ( 'host_name' ) . '/moas/rest/mobile/get-timestamp';
    $headers = array( 'Content-Type' => 'application/json', 'charset' => 'UTF - 8', 'Authorization' => 'Basic' );
    $args = array(
        'method' =>'POST',
        'body' => array(),
        'timeout' => '5',
        'redirection' => '5',
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => $headers,

    );
    
    $response = wp_remote_post( $url, $args );
    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();
        echo "Something went wrong: $error_message";
        exit();
    }
    
    return wp_remote_retrieve_body($response);
}


function custom_api_send_email_alert($email,$phone,$message){

    if(!check_internet_connection())
        return;
    $url = get_option( 'host_name' ) . '/moas/api/notify/send';
    $defaultCustomerKey = "16555";
 $defaultApiKey = "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";

    $customerKey = $defaultCustomerKey;
    $apiKey =  $defaultApiKey;

    $currentTimeInMillis = get_timestamp();
    $stringToHash 		= $customerKey .  $currentTimeInMillis . $apiKey;
    $hashValue 			= hash("sha512", $stringToHash);
    $customerKeyHeader 	= "Customer-Key: " . $customerKey;
    $timestampHeader 	= "Timestamp: " .  $currentTimeInMillis;
    $authorizationHeader= "Authorization: " . $hashValue;
    $fromEmail 			= $email;
    $subject            = "Feedback: Custom API for WP";
    $site_url=site_url();

    global $user;
    $user         = wp_get_current_user();
    $query        = '[Custom API for WP] : ' . $message;

    $content='<div >Hello, <br><br>First Name :'.$user->user_firstname.'<br><br>Last  Name :'.$user->user_lastname.'   <br><br>Company :<a href="'.$_SERVER['SERVER_NAME'].'" target="_blank" >'.$_SERVER['SERVER_NAME'].'</a><br><br>Phone Number :'.$phone.'<br><br>Email :<a href="mailto:'.$fromEmail.'" target="_blank">'.$fromEmail.'</a><br><br>Query :'.$query.'</div>';

    $fields = array(
        'customerKey'	=> $customerKey,
        'sendEmail' 	=> true,
        'email' 		=> array(
            'customerKey' 	=> $customerKey,
            'fromEmail' 	=> $fromEmail,
            'bccEmail' 		=> 'oauthsupport@xecurify.com',
            'fromName' 		=> 'miniOrange',
            'toEmail' 		=> 'oauthsupport@xecurify.com',
            'toName' 		=> 'oauthsupport@xecurify.com',
            'subject' 		=> $subject,
            'content' 		=> $content
        ),
    );
    $field_string = json_encode($fields);
    $headers = array( 'Content-Type' => 'application/json');
    $headers['Customer-Key'] = $customerKey;
    $headers['Timestamp'] = $currentTimeInMillis;
    $headers['Authorization'] = $hashValue;
    $args = array(
        'method' =>'POST',
        'body' => $field_string,
        'timeout' => '5',
        'redirection' => '5',
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => $headers,

    );
    
    $response = wp_remote_post( $url, $args );
    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();
        echo "Something went wrong: $error_message";
        exit();
    }
}

function custom_api_authentication_is_customer_registered()
{
    $email             = get_option('custom_api_authentication_admin_email');
    // $phone 			= get_option('mo_api_authentication_admin_phone');
    $customerKey     = get_option('custom_api_authentication_admin_customer_key');
    // if( ! $email || ! $phone || ! $customerKey || ! is_numeric( trim( $customerKey ) ) ) {
    if (!$email || !$customerKey || !is_numeric(trim($customerKey))) {

        return 0;
    } else {
        return 1;
    }
}
