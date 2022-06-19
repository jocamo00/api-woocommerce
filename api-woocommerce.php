<?php

/*
* Plugin name: API Woocommerce
* Description: Plugin API Woocommerce
* Author: Jose Carreres
*/

add_action('admin_menu', 'stp_api_add_admin_menu');
add_action('admin_init', 'stp_api_settings_init');

// Add menu page
function stp_api_add_admin_menu() {
    add_menu_page( 'Settings API Woocommerce', 'Settings API Woocommerce', 'manage_options', 'settings-api-page', 'stp_api_options_page' );
}


function stp_api_settings_init() {
    // Register configuration
    register_setting( 'stpPlugin', 'stp_api_settings' );

    // Add a section to a page
    add_settings_section(
        'stp_api_stpPlugin_section',
        __( 'Credentials section', 'wordpress' ),
        'stp_api_settings_section_callback',
        'stpPlugin'
    );

    // Defines a configuration field within a section
    add_settings_field(
        'stp_api_text_field_0',
        __( 'Url', 'wordpress' ),
        'stp_api_text_field_0_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );

    add_settings_field(
        'stp_api_select_field_1',
        __( 'Customer key', 'wordpress' ),
        'stp_api_select_field_1_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );

    add_settings_field(
        'stp_api_select_field_2',
        __( 'Customer secret', 'wordpress' ),
        'stp_api_select_field_2_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );
}

// HTML output of fields belonging to the same group
function stp_api_text_field_0_render() {
    $options = get_option( 'stp_api_settings' );
    ?><input type='text' id='stp_api_text_field_0' name='stp_api_settings[stp_api_text_field_0]' value='<?php echo $options['stp_api_text_field_0']; ?>'><?php
}

function stp_api_select_field_1_render() {
    $options = get_option( 'stp_api_settings' );
    ?><input type='text' id='stp_api_text_field_1' name='stp_api_settings[stp_api_text_field_1]' value='<?php echo $options['stp_api_text_field_1']; ?>'><?php
}
function stp_api_select_field_2_render() {
    $options = get_option( 'stp_api_settings' );
    ?><input type='text' id='stp_api_text_field_2' name='stp_api_settings[stp_api_text_field_2]' value='<?php echo $options['stp_api_text_field_2']; ?>'><?php
}

function stp_api_settings_section_callback() {
    echo __( 'Configuration of this section', 'wordpress' );
}

// Generate html
function stp_api_options_page( $hook ) {
    ?>
    <form action='options.php' method='post'>

    <?php echo "<h1 class='text-center mt-2 mb-3'>" . get_admin_page_title() . "</h1>"; ?>

        <?php
        settings_fields( 'stpPlugin' );
        do_settings_sections( 'stpPlugin' );
        submit_button();
        ?>


        <button type="button" class="btn btn-success mt-2" name="btnProducts" id="btnProducts">Load Products</button>

    </form>
    
    <div class="container" id="searchData"></div>
    <div class="container" id="tableData"></div>
    <div class="container d-flex justify-content-between invisible" id="pagination"></div>
    <?php
}


// Add Bootstrap
function AddBootstrapJS($hook) {
    if($hook != "toplevel_page_settings-api-page") {return;}
    wp_enqueue_script('bootstrapJS', plugins_url('admin/bootstrap/js/bootstrap.min.js', __FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts', 'AddBootstrapJS');


function AddBootstrapCSS($hook) {
    if($hook != "toplevel_page_settings-api-page") {return;}
    wp_enqueue_style('bootstrapCSS', plugins_url('admin/bootstrap/css/bootstrap.min.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'AddBootstrapCSS');


// Add my JS
function AddJS($hook) {
    if($hook != "toplevel_page_settings-api-page") {return;}
    wp_enqueue_script('externalJS', plugins_url('admin/js/api-woocommerce.js', __FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts', 'AddJS');