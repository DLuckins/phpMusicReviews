<?php
include_once("../controllers/UserController.php");
include ('../config/app.php');
include_once ('../models/User.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user;
    $email=mysqli_real_escape_string($db->conn,$_POST['email']);
    $username=mysqli_real_escape_string($db->conn,$_POST['username']);
    $password=mysqli_real_escape_string($db->conn,$_POST['password']);
    $passwordConf=mysqli_real_escape_string($db->conn,$_POST['passwordConf']);
    if($email&&$username&&$password&&$passwordConf){
        if(($password==$passwordConf)){
            if(strlen($password)>=8){
                if(strlen($username)>=4){
                    $userObject = new User($username,$email,$password);
                    try{
                        $user = $userObject->save();
                        echo $user;
                        // $response = [
                        //     'status' => 'success',
                        //     'message' => 'Review added successfully'
                        // ];
                        // echo json_encode($response);
                        }
                    catch(Exception $e){
                        echo json_encode($e->getMessage());
                        }
                }
            }
        }
    }
}