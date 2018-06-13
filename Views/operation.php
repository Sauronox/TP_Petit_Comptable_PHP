<?php
require_once './Models/AccountModels.php';
session_start();
if(isset($_SESSION['user'])){
    header("location: panel");
}else{
    addOperationForm();
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
    <title>Operation</title>
</head>
<body>
<nav id="top-navbar">
        <div id="navbar___logo"></div>
        <a href="./panel" id="change">panel</a>
</nav>

<div id="container">
    <form method="POST" action="">
            <label> Choisir le Compte</label><br>
            <select name="idAccount">
                <option value=""></option>
            </select>
            <input type="text" name="name" placeHolder="Nom" required><br>
            <input type="number" name="amount" id="">
            <select name="category" id="">
                <option value=""></option>
            </select>
            <select name="paiement" id="">
                <option value="CB">Carte Bancaire</option>
                <option value="CH">Chèque</option>
                <option value="Virement">Virement</option>
                <option value="Prelevement">Prélevement</option>
            </select>

            <input type="submit" name="submit">
    </form>
</div>
</body>
</html>