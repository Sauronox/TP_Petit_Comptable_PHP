<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Route it up!
switch ($request_uri[0]) {
    // Home page
    case '/':
        require './Views/index.php';
        break;
    // About page
    case '/login':
        require './Views/login.php';
        break;
    // Everything else
    default:
        header('HTTP/1.0 404 Not Found');
        require './Views/404.php';
        break;
}

?>