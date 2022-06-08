<?php

/*
* Plugin name: API Woocommerce
* Description: Woocommerce api test plugin
* Version: 0.0.1
*/

function Activate() {

}

function Deactivate() {

}



register_activation_hook(__FILE__, 'Activate');
register_deactivation_hook(__FILE__, 'Deactivate');



// Administration menu
add_action('admin_menu', 'createMenu');

function createMenu() {
    add_menu_page(
        'API Woocommerce', //title page
        'API Woocommerce', //title menu
        'manage_options', //capability
        plugin_dir_path(__FILE__).'admin/products.php', //slug
        null, //content function
        plugin_dir_url(__FILE__).'admin/img/api.png', //image url
        '1' //menu position
    );
}

function ShowContent() {
    echo '<h1>API Woocommerce Products</h1>';
}