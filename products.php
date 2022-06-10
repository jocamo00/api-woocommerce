<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php echo "<h1 class='text-center'>" . get_admin_page_title() . "</h1>"; ?>

    <div class="container" id="formData"></div>
    <div id="app"></div>

    <?php
      use Automattic\WooCommerce\Client;

      if (isset($_POST['btnSave'])){
        $InputUrl = $_POST['InputUrl'];
        $InputKey = $_POST['InputKey'];
        $InputSecret = $_POST['InputSecret'];

          $table_name = $wpdb->prefix . 'credentials';

          $wpdb->insert( 
            $table_name, 
            array( 
              'Url' => $InputUrl, 
              'Key' => $InputKey, 
              'Secret' => $InputSecret, 
            ) 
          );
        
        function pruebaAPI( $url, $key, $secret) {
          require __DIR__ . '/vendor/autoload.php';
        
          $woocommerce = new Client(
            $url, $key, $secret,
            [
              'wp_api' => true,
              'version' => 'wc/v3',
            ]
          );

          echo json_encode($woocommerce->get('products')); 
        }

        pruebaAPI($InputUrl, $InputKey, $InputSecret);
        
      
      } else {
        $InputUrl='';
        $InputKey='';
        $InputSecret='';
      }


    ?>


</body>
</html>






