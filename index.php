<?php
// $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$url = array("");
if (isset($_GET['url'])) {
    $url =  explode('/', $_GET['url']);
}
switch ($url[0]) {
    case '':
        include './Views/home.php';
        break;
    case 'login':
        include './Views/login.php';
        break;
    case 'register':
        include './Views/register.php';
        break;
    case 'accounts':
        include './Views/accounts.php';
        break;
    case 'panel':
        include './Views/panel.php';
        break;
    case 'logout':
        include './Views/logout.php';
        break;
    case 'operation':
        include './Views/operation.php';
        break;
    case 'account':
        if(!empty($url[1])){
            include './Views/account.php';
        }else{
            include './Views/panel.php';
        }
        break;
    default:
        include './Views/404.php';
        break;
}
