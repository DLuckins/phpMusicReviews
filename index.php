<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
    '/'=>'./views/index.php',
    '/add-review'=> './views/addReview.php',
    '/sign-up'=> './views/registration.php',
    '/sign-in'=> './views/login.php',
    '/profile'=> './views/profile.php'
];
$routespdp = [
    '/'=>'./views/reviewDescriptionPage.php',
];
if(array_key_exists($uri,$routes)){
    if(isset($_GET['id'])){
        require $routespdp[$uri];
    }
    elseif(isset($_SESSION['user_id'])){
        if($uri == "/sign-up" ||$uri =="/sign-in"){
            header("Location: /profile");
        }
        else {
            require $routes[$uri];
        }
    }
    else{
        if($uri == "/profile" ||$uri =="/add-review"){
            header("Location: /sign-in");
        }
        else{
            require $routes[$uri];
        }
    }
}
else{
    http_response_code(404);

    echo "Not Found";

    die();
}