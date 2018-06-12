<?php
require_once '../Models/UserModels.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($_SESSION['user'])){
        header("location: /Views/panel.php");
    }else{
        if(!isset($_COOKIE['user'])){loginUserForm();}
        else {getCookieUser();var_dump($_SESSION);} 
    }
    ?>
    <form method="POST" action="">
            <p>
                <span>Login</span>
            </p>
            <input type="email" name="email" placeHolder="email" required><br>
            <input type="text" name="password" placeHolder="Password" required><br>
            <input type="submit" name="submit">
    </form>
</body>
</html>