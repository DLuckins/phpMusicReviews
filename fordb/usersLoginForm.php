<?php
include_once("../controllers/UserController.php");
include ('../config/app.php');
include_once ('../models/User.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user;
    $email=mysqli_real_escape_string($db->conn,$_POST['email']);
    $password=mysqli_real_escape_string($db->conn,$_POST['password']);
    if($email&&$password){
        try{
                    $controller=new UserController;
                    $user= $controller->getUser($email,$password);
                    if($user){
                        header("Location: /");
                        echo json_encode($response);
                        }
                    else{
                        header("Location: /sign-in");
                    }
                    }
                    catch(Exception $e){
                        echo json_encode($e->getMessage());
                        header("Location: /sign-in");
                        }
    }
    else{
        header("Location: /sign-in");
    }
}