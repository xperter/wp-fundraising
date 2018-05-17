<?php
// add CAPTCHA header script to WordPress header
add_action( 'wp_head', 'header_script' );

/** reCAPTCHA header script */
function header_script() {
echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
}

/** Output the reCAPTCHA form field. */
function display_captcha() {
echo '<div class="g-recaptcha" data-sitekey="6LcxwFkUAAAAAD0UE3XiJ6wROZqgh9nRPWteVqbr"></div>';
}


// adds the CAPTCHA to the login form



add_action( 'wf_login_recaptcha', 'display_captcha'  );
add_action( 'wf_registration_recaptcha','display_captcha' );
add_action( 'campaign_form_captcha','display_captcha' );









//
///**
// * Send a GET request to verify CAPTCHA challenge
// *
// * @return bool
// */
//function captcha_verification() {
//
//    $response = isset( $_POST['g-recaptcha-response'] ) ? esc_attr( $_POST['g-recaptcha-response'] ) : '';
//
//    $remote_ip = $_SERVER["REMOTE_ADDR"];
//
//    // make a GET request to the Google reCAPTCHA Server
//    $request = wp_remote_get(
//        'https://www.google.com/recaptcha/api/siteverify?secret=y6LcxwFkUAAAAAEnsq6CihIEZedKLPYjf6X9xfyfJ&response=' . $response . '&remoteip=' . $remote_ip
//    );
//
//    // get the request response body
//    $response_body = wp_remote_retrieve_body( $request );
//
//    $result = json_decode( $response_body, true );
//
//    return $result['success'];
//}
//
//
//// authenticate the CAPTCHA answer
//add_filter( 'wp_fundraising_security_check', 'validate_captcha', 10, 2 );
//add_filter( 'wp_authenticate_user', 'validate_captcha', 10, 2 );
//
///**
// * Verify the CAPTCHA answer
// *
// * @param $user string login username
// * @param $password string login password
// *
// * @return WP_Error|WP_user
// */
//function validate_captcha( $user, $password ) {
//
//    if ( isset( $_POST['g-recaptcha-response'] ) && !captcha_verification() ) {
//        return new WP_Error( 'empty_captcha', '<strong>ERROR</strong>: Please retry CAPTCHA' );
//    }
//
//    return $user;
//}
//
//
//// authenticate the CAPTCHA answer
//add_action( 'registration_errors', 'validate_captcha_registration_field', 10, 3 );
//
///**
// * Verify the captcha answer
// *
// * @param $user string login username
// * @param $password string login password
// *
// * @return WP_Error|WP_user
// */
//function validate_captcha_registration_field( $errors, $sanitized_user_login, $user_email ) {
//    if ( isset( $_POST['g-recaptcha-response'] ) && !captcha_verification() ) {
//        $errors->add( 'failed_verification', '<strong>ERROR</strong>: Please retry CAPTCHA' );
//    }
//
//    return $errors;
//}