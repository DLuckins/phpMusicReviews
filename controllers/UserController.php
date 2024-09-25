<?php
session_start();
include_once ($_SERVER['DOCUMENT_ROOT'].'/models/User.php');
class UserController
{
    private $conn;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    public function create($data){
        $correctData = "'" . implode("','", $data) . "'";
        $querry="INSERT INTO users (username,email,password) VALUES ($correctData)";
        $result = $this->conn->query($querry);
        if($result){
            return $this->conn->insert_id;
        }
        else{
            return false;
        }
    }
    public function getUser($email, $password){
        $querry="SELECT * FROM users WHERE email= '".$email."' AND password='".$password."'";
        $result = $this->conn->query($querry);
        $user=null;
        if($result){
            $rows=$result->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
                    $userObject=new User($row['username'],$row['email'],$row['password']);
                    $_SESSION['user_id'] = $row['idusers'];
                    $user = $userObject->getDataFormated();
            }
            return $user;
        }
        else{
            return false;
        }
    }
}
?>