<?php
require_once './Models/UserModels.php';
session_start();
if(!isset($_SESSION['user'])){
    header("location: ./");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">

    <title>Panel</title>
</head>
<body>
    <a href="./logout.php">Logout</a>

</body>
</html>