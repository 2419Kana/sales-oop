<?php
include "../classes/Product.php";

// Create an obj
$product = new Product;

// Call the method
$product->delete($_GET['product_id']);
?>