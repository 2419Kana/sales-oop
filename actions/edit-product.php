<?php

    require '../classes/Product.php';
 
    $product = new Product();

    // press edit button in edit-user.php/views->redirect to form ->edit-product.actions ->update function
    
    $product->update($_POST, $_GET['id']);

?>