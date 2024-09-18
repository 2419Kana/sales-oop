<?php
     session_start();

     require '../classes/Product.php';
 
     $product_obj = new Product;
     $product = $product_obj->getProduct($_GET['id']);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
               <h1 class="h3">Sales OOP</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name']?></span>
                <form action="../actions/logout.php" method="post" class="d-flex">
                    <button class="text-danger bg-transparent border-0" type="submit">Log out</button>
                </form>
            </div>
        </div>
    </nav>  
    <main class="card w-50 mx-auto my-auto">
        <div class="card-body">
            <h2 class="text-warning fw-bold"><i class="fa-solid fa-pen-to-square me-1"></i> Edit Product</h2>

            <form action="../actions/edit-product.php?id=<?=$product['id']?>" method="post">
                <div class="mb-2">
                    <label for="product-name" class="form-label">Product Name</label>
                     <input type="text" name="product_name" id="product-name" class="form-control" value="<?=$product['product_name']?>"required autofocus> 
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" value="<?=$product['price']?>" class="form-control">
                    </div>
                    <div class="col mb-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" value="<?=$product['quantity']?>" class="form-control">
                    </div>
                </div>
               
                <div class="mb-2">
                    <button type="submit" class="w-100 btn btn-warning">Update</button>
                </div>
            </form>
        </div>
       
    </main>
</body>
<html>