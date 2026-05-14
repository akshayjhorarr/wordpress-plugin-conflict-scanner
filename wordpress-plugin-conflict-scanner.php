<?php
/**
 * Plugin Name: WordPress Plugin Conflict Scanner
 * Plugin URI: https://github.com/YOUR_USERNAME/wordpress-plugin-conflict-scanner
 * Description: Troubleshooting toolkit for detecting common WordPress plugin conflict scenarios.
 * Version: 1.0
 * Author: YOUR NAME
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'admin/dashboard.php';

add_action('admin_enqueue_scripts', 'wpcs_admin_styles');

function wpcs_admin_styles() {

    wp_enqueue_style(
        'wpcs-admin-css',
        plugin_dir_url(__FILE__) . 'assets/admin.css'
    );
}