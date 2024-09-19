<?php
class Review
{
    protected $author;
    protected $name;
    protected $review;
    protected $type;
    protected $imgPath;
    protected $raiting;
    protected $id;

    public function __construct($author,$name,$imgPath,$review,$type,$raiting,$id=null){
        $this->author=$author;
        $this->name=$name;
        $this->imgPath=$imgPath;
        $this->review=$review;
        $this->type=$type;
        $this->raiting=$raiting;
        $this->id=$id;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor($author){
        $this->author=$author;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    }
    public function getReview(){
        return $this->review;
    }
    public function setReview($review){
        $this->review=$review;
    }
    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type=$type;
    }

    public function save(){
    $controller = new ReviewController();
    $data = [
        'author'=> $this->author,
        'name'=> $this->name,
        'type'=> $this->type,
        'imgPath'=> $this->imgPath,
        'review'=> $this->review,
        'raiting'=> $this->raiting
    ];
    $result = $controller->create($data);
    if(!$result){
        echo("something went wrong");
    }

    }
    public function getDataFormated(){
        $data = [
            'author'=> $this->author,
            'name'=> $this->name,
            'type'=> $this->type,
            'imgPath'=> $this->imgPath,
            'review'=> $this->review,
            'raiting'=> $this->raiting,
            'id'=> $this->id
        ];
        return $data;
    }
}