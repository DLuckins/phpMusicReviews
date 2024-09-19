<?php
include_once("../controllers/ReviewController.php");
include ('../config/app.php');
include_once ('../models/Review.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review;
    $author=mysqli_real_escape_string($db->conn,$_POST['author']);
    $name=mysqli_real_escape_string($db->conn,$_POST['name']);
    $img=$_FILES['image'];
    $imgSize=$img['size'];
    $imgName=$img['name'];
    $imgLocation=$img['tmp_name'];
    $type=mysqli_real_escape_string($db->conn,$_POST['selected']);
    $review=mysqli_real_escape_string($db->conn,$_POST['review']);
    $raiting=mysqli_real_escape_string($db->conn,$_POST['raiting']);
    $imgExt = explode('.',$imgName);
    $imgActExt = strtolower(end($imgExt));
    $allow = array('png','jpg','jpeg');
    if($author && $name && $type && $review && $img && $raiting){
        if(in_array($imgActExt,$allow)){
        if($imgSize<1000000){
        if(!is_nan($raiting)){
        $imgNameNew=str_replace(' ', '_', $name) . '.'.$imgActExt;
        $imgDestination = '../covers/'.$imgNameNew;
        move_uploaded_file($imgLocation,$imgDestination);
        $reviewObject = new Review($author,$name,$imgDestination,$review,$type,$raiting);

    try{
    $reviewObject->save();
    $response = [
        'status' => 'success',
        'message' => 'Review added successfully'
    ];
    header("Location: /");
    echo json_encode($response);
    }
    catch(Exception $e){
        $response = [
            'status' => 'error',
            'message' => 'The review with this name already exists'
        ];
        //header("Location: /add-review");
        echo json_encode($e->getMessage());
    }
}
}
else{
    $response = [
        'status' => 'error',
        'message' => 'Image is too big ' . $imgSize
    ];
    //header("Location: /add-review");
    echo json_encode($response);
}
        }
else{
    $response = [
        'status' => 'error',
        'message' => 'Incorrect image format'
    ];
    //header("Location: /add-review");
    echo json_encode($response);
}
    }
else{
    $response = [
        'status' => 'error',
        'message' => 'Incrorrect data'
    ];
    //header("Location: /add-review");
    echo json_encode($response);
}
}