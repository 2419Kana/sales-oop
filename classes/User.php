<?php
    require_once "Database.php";

    class User extends Database 
    {
        public function store($request){
            // $request holds all the data from the form. This ewill cathch the value of $_POST from actions/register.php

            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $password = $request['password'];

            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (first_name, last_name, username, `password`) VALUE ('$first_name', '$last_name', '$username', '$password')";
            // this password is reserved keyword -> use `` to make it not reserved keyword

            if($this->conn->query($sql)){
                header('location:../views'); // go to index.php(login page)
                exit; // same as die
            } else {
                die('Error in creating the user: '.$this->conn->error);
            }
        }

        public function login($request){
            // $request is an array.(username =>'admin', password => 'password')
            $username = $request['username'];
            $password = $request['password'];
            
            $sql ="SELECT * FROM users WHERE username = '$username'";

            // $sql = l.35の $sql ="SELECT * FROM users WHERE username = '$username'";
            $result = $this->conn->query($sql);

            if($result->num_rows == 1){

                $user = $result->fetch_assoc();

                if(password_verify($password, $user['password'])){
                    // if $password = $user['password'], session starts
                    session_start();

                    // comes from line.35
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];

                    header('location: ../views/dashboard.php');
                    exit;
                } else {
                    die('Password is icorrect');
                }
            } else {
                die('Username not found');
            }
        }

        public function logout(){

            session_start();
            // remove stored data. clear all the data inside of the session
            session_unset();
            // close the session
            session_destroy();
    
            header('location: ../views');
            exit;
        }

        public function getAllProducts()
        {
            // 何を入れるかはdepends on requirement
            $sql = "SELECT id, product_name, price, quantity FROM products";
    
            if($result = $this->conn->query($sql)){
                return $result;
            } else {
                die('Error retrieving all users:'. $this->con->error);
            }
        }
    

        
       public function getUser() {
        // This method will get the details of the logged in user.

        $id = $_SESSION['id'];

        $sql = "SELECT * FROM users WHERE id = $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        } else {
            die('Error in retrieving the user:'.$this->conn->error);
        }
    }
    
        
    }
?>