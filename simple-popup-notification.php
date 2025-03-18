<?php

/**
 * Plugin Name:       Simple Popup Notification
 * Plugin URI:        https://github.com/sanjaygalaxy1133/simple-popup-notification
 * Description:       A lightweight plugin to display customizable notification popups on the frontend. Users can manage popup content and styles from the admin settings. Once closed, the popup will not reappear for the user until the cookie expires.
 * Version:           2.0
 * Author:            Galaxy Weblinks
 * Author URI:        https://www.galaxyweblinks.com/
 * License:           GPLv2
 * Update URI:        https://github.com/sanjaygalaxy1133/simple-popup-notification
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-popup-notification
*/

namespace RYSE\GitHubUpdaterDemo;

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

// Include the GitHub Updater
if ( file_exists( __DIR__ . '/GitHub-Updater/github-updater.php' ) ) {
    require_once __DIR__ . '/GitHub-Updater/github-updater.php';
}

// Add the GitHub Updater
add_filter( 'github_updater_repo_info', function( $repo_info, $item ) {
    if ( $item->slug === 'simple-popup-notification' ) {
        $repo_info['url'] = 'https://github.com/sanjaygalaxy1133/simple-popup-notification';
        $repo_info['slug'] = 'simple-popup-notification';
        $repo_info['branch'] = 'main'; // or the branch you want to use
    }
    return $repo_info;
}, 10, 2 );