<?php

    echo "<h1>" . get_admin_page_title() . "</h1>";

    require __DIR__ . '/vendor/autoload.php';
    use Automattic\WooCommerce\Client;
    
    $woocommerce = new Client(
      'http://localhost/woocommerce_site/',
      'ck_f05265aebab2c3dc01aa047b34961f56412db138',
      'cs_f1c5b16a37189ef48588a6b3822c5344922c7646',
      [
        'version' => 'wc/v3',
      ]
    );
    
    
    echo json_encode($woocommerce->get('products')); 

    ?>




