<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>

<?php echo "<h1 class='text-center mt-2 mb-3'>" . get_admin_page_title() . "</h1>"; ?>
    
    <div class="container" id="formData"></div>
    <div class="container" id="searchData"></div>
    <div class="container" id="tableData"></div>
    <div class="container d-flex justify-content-between invisible" id="pagination"></div>


<?php

  if (isset($_POST['btnSave'])) {
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

  } else {
    $InputUrl='';
    $InputKey='';
    $InputSecret='';
  }  

?>


</body>
</html>






