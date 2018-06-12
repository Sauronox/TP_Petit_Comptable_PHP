<?php
require_once '../Models/UserModels.php';
session_start();
if(!isset($_SESSION['user'])){
    header("location: /Views/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel</title>
</head>
<body>
    <?php 
    var_dump($_COOKIE['user']);
    // setcookie("user","",time()-3600);
    ?>
    <a href="../Routes/logout.php">Logout</a>
</body>
</html>