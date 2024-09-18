<?php
require_once "Database.php";

class Product extends Database{

    public function store($request){
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "INSERT INTO products (product_name, price, quantity) VALUE ('$product_name', '$price', '$quantity')";

        if($this->conn->query($sql)){
            header('location:../views/dashboard.php');
            exit;
        } else {
            die('Error in adding the product: '.$this->conn->error);
        }
    }

    public function getProduct($id){

        $sql = "SELECT * FROM products WHERE id = $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        } else {
            die('Error in retrieving the product:'.$this->conn->error);
        }
    }

    public function update($request, $id){
        // $request comes from <form>
        // $id identify what do you want to update
    
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "UPDATE products SET product_name='$product_name',
        price='$price',
        quantity='$quantity' WHERE id=$id";

        if($this->conn->query($sql)){
            header('location: ../views/dashboard.php');
            exit;
        } else {
            die('Error editing the product'. $this->conn->error);
        }
    }

    public function delete($product_id){
        session_start();
        $id = $_SESSION['id'];

        $sql="DELETE FROM products WHERE id = '$product_id'";

        if($this->conn->query($sql)){
            header('location: ../views/dashboard.php');
        } else {
            die('Error in deleting the product:'. $this->conn->error);
        }
    }
}

?>