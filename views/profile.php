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
    $data = $controller->getByUserId($_SESSION['user_id']);
    ?>
    <div class = "top">
        <h1>My reviews</h1>
        <div>
        <a href="/add-review"><button>ADD</button></a>
        <a href="/logout"><button>LOGOUT</button></a>
        </div>
    </div>
<div id="reviewList"></div>
<script src="./index.js"></script>
<script>
    var data=<?php echo json_encode($data);?>;
        const reviewList = document.getElementById('reviewList');
                data.forEach(review => {
                    const reviewDiv=document.createElement('div');
                    reviewDiv.className="reviewListItem";
                    const nameP=document.createElement('p');
                    nameP.textContent=review['name'];
                    nameP.className="review-name";
                    reviewDiv.appendChild(nameP);
                    const albumCover=document.createElement('img')
                    albumCover.src=review['imgPath'];
                    albumCover.className="cover";
                    reviewDiv.appendChild(albumCover);
                    const progress=document.createElement('progress')
                    progress.value=review['raiting'];
                    progress.max=100;
                    reviewDiv.appendChild(progress);
                    const progressP=document.createElement('p');
                    progressP.className="raiting";
                    progressP.textContent=review['raiting'];
                    reviewDiv.appendChild(progressP);
                    reviewDiv.addEventListener("click", (event) => {
                        document.location.href="/?id="+review['id'];
                    });
                    reviewList.appendChild(reviewDiv);
                });
                function changeColor(e) {
                    if(e.target.parentElement.style.opacity!=0.5){
                        e.target.parentElement.style.opacity=0.5;
                    }
                    else{
                        e.target.parentElement.style.opacity=1;
                    }
                }
                
</script>
</body>
</html>
