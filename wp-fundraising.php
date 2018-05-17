<?php
/**
 * Plugin Name: WP Fundraising -  Donation and Crowdfunding Platform
 * Plugin URI:https://xpeedstudio.com
 * Description: The ultimate WooCommerce supported fundraising Donation and Crowdfunding toolkit
 * Author: XpeedStudio
 * Version:1.0.1
 * License: GPL2+
 * Text Domain: wp-fundraising
 * Domain Path: /languages/
 */
if ( ! defined( 'ABSPATH' ) ) exit;

define('WP_FUNDRAISING_DIR_PATH', plugin_dir_path(__FILE__));
define('WP_FUNDRAISING_DIR_URL', plugin_dir_url(__FILE__));
define('WP_FUNDRAISING_VERSION', '1.0');

require_once WP_FUNDRAISING_DIR_PATH.'inc/init.php';