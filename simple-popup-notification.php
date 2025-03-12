<?php

namespace RYSE\GitHubUpdaterDemo;

/**
 * Plugin Name:       Simple Popup Notification
 * Plugin URI:        https://github.com/sanjaygalaxy1133/simple-popup-notification
 * Description:       A lightweight plugin to display customizable notification popups on the frontend. Users can manage popup content and styles from the admin settings. Once closed, the popup will not reappear for the user until the cookie expires.
 * Version:           1.2
 * Author:            Galaxy Weblinks
 * Author URI:        https://www.galaxyweblinks.com/
 * License:           GPLv2
 * Update URI:        https://github.com/sanjaygalaxy1133/simple-popup-notification
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-popup-notification
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if(!defined('SPN_PLUGINURL')){
    define('SPN_PLUGINURL', plugin_dir_url(__FILE__));
}

if(!defined('SPN_PLUGINPATH')){
    define('SPN_PLUGINPATH', plugin_dir_path(__FILE__));
}

// require_once SPN_PLUGINPATH . 'includes/class-simple-popup-notification.php';
require_once SPN_PLUGINPATH . 'includes/admin/class-simple-popup-notification-admin.php';
require_once SPN_PLUGINPATH . 'includes/frontend/class-simple-popup-notification-frontend.php';
// require_once SPN_PLUGINPATH . 'includes/class-simple-popup-notification-functions.php';

