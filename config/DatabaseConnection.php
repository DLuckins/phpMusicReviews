<?php
class DatabaseConnection{
    public $conn;
    public function __construct() {
        try{
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        return $this->conn= $conn;
        }
        catch(mysqli_sql_exception){
            return null;
        }
    }
    public function CloseCon()
    {
        $this->conn -> close();
    }
}
    ?>