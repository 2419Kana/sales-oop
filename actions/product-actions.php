<?php
 include "../classes/Product.php";

 // Create an Object
 $product = new Product;

 // Call the method
 $product->store($_POST);
 // $_POST holds all the data from the form in views/index.php
 // $_POST['username']; // mary 
?>