<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include 'config/app.php';
    ?>
    <div class = "top">
        <h1>Add review</h1>
        <div>
        <a href="/"><button>Cancel</button></a>
        <button type="submit" form="review_form" name="add_review">Save</button>
        </div>
    </div>
    <div class="review-div">
    <form action="fordb/form.php" method="post" onsubmit="return validateForm()" id="review_form" enctype="multipart/form-data">
    <label for="author">Author</label>
    <input type="text" name="author" placeholder="author" id="author"></input>
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="name" id="name"></input>
    <label for="image">Album cover</label>
    <input type="file" name="image" placeholder="image" id="image" autocomplete="off"></input>
    <label for="reviewType">Type</label>
    <select id="reviewType" name="reviewType" value="Type Switcher" onchange="changeType(event);" autocomplete="off">
        <option value="none" selected disabled hidden>Type Switcher</option>
        <option value="Album">Album</option>
        <option value="EP">EP</option>
        <option value="Single">Single</option>
    </select>
    <input type="hidden" name="selected" id="selected"></input>
    <label for="review">Review</label>
    <textarea name="review" placeholder="review" id="review"></textarea>
    <label for="raiting">Raiting</label>
    <input type="number" name="raiting" placeholder="raiting" id="raitingInput"></input>
    <p class="error" id="error"></p>
    </form>
    </div>
    <script src="add.js"></script> 
</body>
</html>