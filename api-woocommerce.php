<?php

/*
* Plugin name: API Woocommerce
* Description: Woocommerce api test plugin
* Version: 0.0.1
*/

function Activate() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'credentials';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        `CredentialsId` INT NOT NULL AUTO_INCREMENT,
        `Url` VARCHAR(80) NULL,
        `Key` VARCHAR(80) NULL,
        `Secret` VARCHAR(80) NULL,
        PRIMARY KEY (`CredentialsId`)) $charset_collate;";
        
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );
}

function Deactivate() {

}



register_activation_hook(__FILE__, 'Activate');
register_deactivation_hook(__FILE__, 'Deactivate');



// Administration menu
add_action('admin_menu', 'createMenu');

function createMenu() {
    add_menu_page(
        'API Woocommerce Products', //title page
        'API Woocommerce', //title menu
        'manage_options', //capability
        plugin_dir_path(__FILE__).'/products.php', //slug
        null, //content function
        plugin_dir_url(__FILE__).'admin/img/api.png', //image url
        '1' //menu position
    );
}

