<?php
require_once './Models/AccountModels.php';
session_start();
if(!isset($_SESSION['user'])){
    header("location: login");
}else{
    addAccountForm();
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
    <title>Accounts</title>
</head>
<body>
<nav id="top-navbar">
        <div id="navbar___logo"></div>
        <a href="login" id="change">Logout</a>
</nav>

<div id="container">
    <form method="POST" action="">
            <span> Entrez le nom du compte <br>
                <input type="text" name="name" placeHolder="Nom" required><br>
            </span>
            <span>Type du compte<br>
            <select id="type" name="type">
                <option value="cheque">Compte chèque</option> 
                <option value="pel">PEL</option>
                <option value="livret">Livret A</option>
                <option value="autre">Autre</option>
            </select>
            </span>
            <span>Solde du compte<br>
            <input type="number" name="balance">
            </span>
            <span>Devise du compte<br>
            <select id="type" name="currency">
                <option value="euro">EUR</option> 
                <option value="dollar">USD</option>
                <option value="yen">YEN</option>
            </select>
            </span>
            <input type="submit" name="submit">
    </form>
</div>
</body>
</html>