<?php

/*
* Plugin name: API Woocommerce
* Description: Plugin API Woocommerce
* Author: Jose Carreres
*/

include('classes.php');

add_action('admin_menu', 'stp_api_add_admin_menu');
add_action('admin_init', 'stp_api_settings_init');



// Add menu page
function stp_api_add_admin_menu() {
    $add_menu = new Menu();

    add_menu_page(  $add_menu ->set_page_title('Settings API Woocommerce'), 
                    $add_menu ->set_menu_title('Settings API Woocommerce'), 
                    $add_menu ->set_capability('manage_options'), 
                    $add_menu ->set_menu_slug('settings-api-page'), 
                    $add_menu ->set_function('stp_api_options_page') 
                );
}


function stp_api_settings_init() {
    $register_setting = new Register();
    $setting_section = new Setting();

    $stp_api_text_field_0 = new Field();
    $stp_api_text_field_1 = new Field();
    $stp_api_text_field_2 = new Field();

// Register configuration
    register_setting( $register_setting ->set_option_group('stpPlugin'), 
                      $register_setting ->set_option_name('stp_api_settings') 
                    );

// Add a section to a page
    add_settings_section(
        $setting_section ->set_id('stp_api_stpPlugin_section'),
        __( $setting_section ->set_title('Credentials section'), 'wordpress' ),
        $setting_section ->set_callback('stp_api_settings_section_callback'),
        $setting_section ->set_page('stpPlugin')
    );

// Defines a configuration field within a section
    add_settings_field(
        $stp_api_text_field_0 ->set_id('stp_api_text_field_0'),
        __( $stp_api_text_field_0 ->set_title('Url'), 'wordpress' ),
        $stp_api_text_field_0 ->set_callback('stp_api_text_field_0_render'),
        $stp_api_text_field_0 ->set_page('stpPlugin'),
        $stp_api_text_field_0 ->set_section('stp_api_stpPlugin_section')
    );

    add_settings_field(
        $stp_api_text_field_1 ->set_id('stp_api_text_field_1'),
        __( $stp_api_text_field_1 ->set_title('Customer key'), 'wordpress' ),
        $stp_api_text_field_1 ->set_callback('stp_api_text_field_1_render'),
        $stp_api_text_field_1 ->set_page('stpPlugin'),
        $stp_api_text_field_1 ->set_section('stp_api_stpPlugin_section')
    );

    add_settings_field(
        $stp_api_text_field_2 ->set_id('stp_api_text_field_2'),
        __( $stp_api_text_field_2 ->set_title('Customer key'), 'wordpress' ),
        $stp_api_text_field_2 ->set_callback('stp_api_text_field_2_render'),
        $stp_api_text_field_2 ->set_page('stpPlugin'),
        $stp_api_text_field_2 ->set_section('stp_api_stpPlugin_section')
    );
}

// HTML output of fields belonging to the same group
function stp_api_text_field_0_render() {
    $options = get_option( 'stp_api_settings' );
    ?><input type='text' id='stp_api_text_field_0' name='stp_api_settings[stp_api_text_field_0]' value='<?php echo $options['stp_api_text_field_0']; ?>'><?php
}

function stp_api_text_field_1_render() {
    $options = get_option( 'stp_api_settings' );
    ?><input type='text' id='stp_api_text_field_1' name='stp_api_settings[stp_api_text_field_1]' value='<?php echo $options['stp_api_text_field_1']; ?>'><?php
}
function stp_api_text_field_2_render() {
    $options = get_option( 'stp_api_settings' );
    ?><input type='text' id='stp_api_text_field_2' name='stp_api_settings[stp_api_text_field_2]' value='<?php echo $options['stp_api_text_field_2']; ?>'><?php
}

function stp_api_settings_section_callback() {
    echo __( 'Configuration of this section', 'wordpress' );
}

// Generate html
function stp_api_options_page() {
    ?>
    <div class="container">
        <form action='options.php' method='post'>

        <?php echo "<h1 class='text-center mt-2 mb-3'>" . get_admin_page_title() . "</h1>"; ?>

            <?php
            settings_fields( 'stpPlugin' );
            do_settings_sections( 'stpPlugin' );
            submit_button();
            ?>

        </form>
        <button type="button" class="btn btn-success mt-2" name="btnProducts" id="btnProducts">Load Products</button>
        <div id="searchData"></div>
        <div id="tableData"></div>
        <div class="d-flex justify-content-between invisible" id="pagination"></div>
    </div>
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