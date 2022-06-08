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

function Delete() {

}

echo 'Holaaaa';

register_activation_hook(__FILE__, 'Activate');
register_deactivation_hook(__FILE__, 'Deactivate');