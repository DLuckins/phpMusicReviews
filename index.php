<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
    '/'=>'./views/index.php',
    '/add-review'=> './views/addReview.php',
    '/sign-up'=> './views/registration.php',
    '/sign-in'=> './views/login.php'
];
$routespdp = [
    '/'=>'./views/reviewDescriptionPage.php',
];
if(array_key_exists($uri,$routes)){
    if(isset($_GET['id'])){
        require $routespdp[$uri];
    }
    else{
        require $routes[$uri];
    }
}
else{
    http_response_code(404);

    echo "Not Found";

    die();
}