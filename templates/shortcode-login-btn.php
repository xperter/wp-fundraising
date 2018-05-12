<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'wp_fundraising_login_btn','wp_fundraising_login_btn_shortcode_html' );
function wp_fundraising_login_btn_shortcode_html() {
    ob_start(); ?>

    <a href="" data-toggle="modal" data-target=".<?php echo wf_login_signup_modal_class();?>">
        <?php esc_html_e('Log In','wp-fundraising');?>
    </a>
    <?php
    return ob_get_clean();
}