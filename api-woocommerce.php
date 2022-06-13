<?php

/*
* Plugin name: API Woocommerce
* Description: Plugin API Woocommerce
* Author: Jose Carreres
*/

if ( ! defined ('WPINC')) {
    die;
}

// activate plugin
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


// deactivate plugin
    function Deactivate() {
        flush_rewrite_rules();
    }

    
    register_activation_hook(__FILE__, 'Activate');
    register_deactivation_hook(__FILE__, 'Deactivate');


// Administration menu
    add_action('admin_menu', 'CreateMenu');

    function CreateMenu() {
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


// Add Bootstrap
    function AddBootstrapJS($hook) {
        if($hook != "api-woocommerce/products.php") {return;}
        wp_enqueue_script('bootstrapJS', plugins_url('admin/bootstrap/js/bootstrap.min.js', __FILE__),array('jquery'));
    }
    add_action('admin_enqueue_scripts', 'AddBootstrapJS');


    function AddBootstrapCSS($hook) {
        if($hook != "api-woocommerce/products.php") {return;}
        wp_enqueue_style('bootstrapCSS', plugins_url('admin/bootstrap/css/bootstrap.min.css', __FILE__));
    }
    add_action('admin_enqueue_scripts', 'AddBootstrapCSS');


// Add my JS
    function AddJS($hook) {
        if($hook != "api-woocommerce/products.php") {return;}
        wp_enqueue_script('externalJS', plugins_url('admin/js/products.js', __FILE__),array('jquery'));
    }
    add_action('admin_enqueue_scripts', 'AddJS');



