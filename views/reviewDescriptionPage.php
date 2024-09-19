<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php
    include ('./config/app.php');
    include('./controllers/ReviewController.php');
    $controller = new ReviewController();
    $data = $controller->get($_GET["id"]);
    ?>
    <div class = "top">
        <h1 id ="topName"></h1>
        <div>
        <a href="/"><button>Return</button></a>
        </div>
    </div>
<div class=reviewCont>
<div id="reviewDesc">
    <div id="imgCont">
    <img id="coverBig">
    <progress max="100" id ="progress"></progress>
    <p id="raiting"></p>
    </div>
    <div id="reviewCont">
    <p id="reviewText"></p>
    </div>
</div>
</div>
<script src="./index.js"></script>
<script>
    var data=<?php echo json_encode($data);?>;
    const reviewCover = document.getElementById('coverBig');
    const reviewName = document.getElementById('topName');
    const progress = document.getElementById('progress');
    const id = document.getElementById('raiting');
    const review = document.getElementById('reviewText');
    reviewName.innerHTML="Review of "+data["author"]+"'s "+data["type"]+" - "+data['name'];
    reviewCover.src=data['imgPath'];
    progress.value=data['raiting'];
    id.textContent=data['raiting'];
    review.textContent=data['review'];
                 
</script>
</body>
</html>