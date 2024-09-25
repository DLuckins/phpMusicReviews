<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once ($_SERVER['DOCUMENT_ROOT'].'/models/Review.php');
class ReviewController
{
    private $conn;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    public function create($data){
        $correctData = "'" . implode("','", $data) . "'";
        $correctData=$correctData.",'".$_SESSION['user_id']."'";
        $querry="INSERT INTO reviews (author,`name`,`type`,imgPath,review,raiting,idusers) VALUES ($correctData)";
        $result = $this->conn->query($querry);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    // public function deleteSelected($data){
    //     foreach($data as $productSku){
    //         $querry="DELETE FROM products WHERE sku='$productSku'";
    //         $result = $this->conn->query($querry);
    //     }
    //     if($result){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }
    public function getAll(){
        $querry="SELECT * FROM reviews";
        $result = $this->conn->query($querry);
        if($result){
            $rows=$result->fetch_all(MYSQLI_ASSOC);
            $reviews = array();
            foreach ($rows as $row) {
                    $reviewObject=new Review($row['author'],$row['name'],$row['imgPath'],$row['review'],$row['type'],$row['raiting'],$row['idreviews']);
                    $review = $reviewObject->getDataFormated();
                $reviews[]=$review;
            }
            return $reviews;
        }
        else{
            return false;
        }
    }
    public function get($id){
        $querry="SELECT * FROM reviews WHERE idreviews= '".$id."'";
        $result = $this->conn->query($querry);
        $review=null;
        if($result){
            $rows=$result->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
                    $reviewObject=new Review($row['author'],$row['name'],$row['imgPath'],$row['review'],$row['type'],$row['raiting'],$row['idreviews']);
                    $review = $reviewObject->getDataFormated();
            }
            return $review;
        }
        else{
            return false;
        }
    }
    public function getByUserId($id){
        $querry="SELECT * FROM reviews WHERE idusers= '".$id."'";
        $result = $this->conn->query($querry);
        $review=null;
        if($result){
            $rows=$result->fetch_all(MYSQLI_ASSOC);
            $reviews = array();
            foreach ($rows as $row) {
                    $reviewObject=new Review($row['author'],$row['name'],$row['imgPath'],$row['review'],$row['type'],$row['raiting'],$row['idreviews']);
                    $review = $reviewObject->getDataFormated();
                $reviews[]=$review;
            }
            return $reviews;
        }
        else{
            return false;
        }
    }
}
?>