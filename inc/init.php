<?php

if ( !defined( 'ABSPATH' ) )
	die( 'Direct access forbidden.' );

require_once WP_FUNDRAISING_DIR_PATH.'inc/class.wp-fundraising-init.php';


require_once WP_FUNDRAISING_DIR_PATH.'inc/hook/wp-fundraising-frontend-filters.php';

require_once WP_FUNDRAISING_DIR_PATH.'inc/class.wp-fundraising-template-loader.php';
require_once WP_FUNDRAISING_DIR_PATH.'inc/class.wf-wc-templating.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/class.wc-product-wp-fundraising.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/class.wc-product-wf-donation.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/class.wp-fundraising.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/class.wp-fundraising-donation.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/class.wp-fundraising-registration.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/class.wp-fundraising-frontend-campaign-form.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/class.wp-fundraising-frontend-account-form.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/class.wp-fundraising-frontend-address-form.php';


include_once WP_FUNDRAISING_DIR_PATH.'inc/config/class.menu-settings.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/wp-fundraising-core-functions.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/wp-fundraising-template-functions.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/hook/wp-fundraising-filters.php';
include_once WP_FUNDRAISING_DIR_PATH.'inc/hook/wp-fundraising-actions.php';


include_once WP_FUNDRAISING_DIR_PATH.'templates/shortcode-dashboard.php';
include_once WP_FUNDRAISING_DIR_PATH.'templates/shortcode-campaign-listing.php';
include_once WP_FUNDRAISING_DIR_PATH.'templates/shortcode-registration.php';
include_once WP_FUNDRAISING_DIR_PATH.'templates/shortcode-search.php';
include_once WP_FUNDRAISING_DIR_PATH.'templates/shortcode-submit-form.php';
include_once WP_FUNDRAISING_DIR_PATH.'templates/shortcode-donate-btn.php';
include_once WP_FUNDRAISING_DIR_PATH.'templates/shortcode-donate-modal.php';
include_once WP_FUNDRAISING_DIR_PATH.'templates/shortcode-donate-form.php';


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    register_activation_hook(__FILE__, array('WP_Fundraising_Init', 'wf_plugin_init'));
    if (class_exists('WP_FundRaising')) {
        $WP_FundRaising = WP_FundRaising::wf_get_instance();
    }
    if (class_exists('WP_FundRaising_Donation')) {
        $WP_FundRaising_Donation = WP_FundRaising_Donation::wf_donation_get_instance();
    }
}