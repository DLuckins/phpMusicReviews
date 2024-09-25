<?php
session_start();
class User
{
    protected $username;
    protected $email;
    protected $password;
    public function __construct($username,$email,$password){
        $this->username=$username;
        $this->email=$email;
        $this->password=$password;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($name){
        $this->username=$name;
    }
    public function save(){
    $controller = new UserController();
    $data = [
        'username'=> $this->username,
        'email'=> $this->email,
        'password'=> $this->password
    ];
    $result = $controller->create($data);
    if(!$result){
        echo("something went wrong");
    }
    else{
        $_SESSION['user_id'] = $result;
    }
    return $result;
    }
    public function getDataFormated(){
        $data = [
            'username'=> $this->username,
            'email'=> $this->email,
            'password'=> $this->password
        ];
        return $data;
    }
}