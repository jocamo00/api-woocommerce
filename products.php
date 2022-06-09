<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

echo "<h1>" . get_admin_page_title() . "</h1>";

/*$url = 'http://localhost/woocommerce_site/';
$key = 'ck_f05265aebab2c3dc01aa047b34961f56412db138';
$secret = 'cs_f1c5b16a37189ef48588a6b3822c5344922c7646';

require __DIR__ . '/vendor/autoload.php';
use Automattic\WooCommerce\Client;

$woocommerce = new Client(
  $url, $key, $secret,
  [
    'version' => 'wc/v3',
  ]
);

echo json_encode($woocommerce->get('products')); */
/*$data = file_get_contents('http://localhost/wordpress_site/');
$data = json_decode($data, true);*/

?>
    <p>pruebas</p>

    <div class="container">
      <form method="post">
        <div class="form-group">
          <label for="txtUrl">Url</label>
          <input type="text" id="txtUrl" name="txtUrl">
          <label for="txtKey">Url</label>
          <input type="text" id="txtKey" name="txtKey">
          <label for="txtSecret">Url</label>
          <input type="text" id="txtSecret" name="txtSecret">
          <input type="submit" value="save">
        </div>
      </form>
    </div>

    <?php
      $txtUrl = $_POST['txtUrl'];
      $txtKey = $_POST['txtKey'];
      $txtSecret = $_POST['txtSecret'];


      $table_name = $wpdb->prefix . 'credentials';

      $wpdb->insert( 
        $table_name, 
        array( 
          'Url' => $txtUrl, 
          'Key' => $txtKey, 
          'Secret' => $txtSecret, 
        ) 
      );


      require __DIR__ . '/vendor/autoload.php';
      use Automattic\WooCommerce\Client;

      $woocommerce = new Client(
        $txtUrl, $txtKey, $txtSecret,
        [
          'version' => 'wc/v3',
        ]
      );

      echo json_encode($woocommerce->get('products')); 


    ?>

</body>
</html>






