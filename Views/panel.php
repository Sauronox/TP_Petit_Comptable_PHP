<?php
require_once './Models/UserModels.php';
require_once './Models/AccountModels.php';
session_start();  
// var_dump($_POST);
deleteAccount();
redirectUpdate();

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
<nav id="top-navbar">
            <div id="navbar___logo"></div>
            <a href="login" id="change">login</a>
    </nav>
    <a href="./logout">Logout</a>
    <div>
    <form action="" method="post">
        <label>Choisir un compte</label><br>
        <select name="account" id="">
        <?php foreach(getAllAccounts() as $value):?>
            <option name="<?= $value['id'] ?>" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
        <?php endforeach;?>
        </select><br>
        <input type="submit" value="Valider">
    </form>
    <button><a href="./accounts">Creer un compte</a></button
    </div>
    <div>
    <form action="" method="post">
        <span>supression d'un compte</span><br>
        <select name="account">
        <?php foreach(getAllAccounts() as $value):?>
            <option name="account" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
        <?php endforeach;?>
        </select><br>
        <input type="submit" name="Supprimer" value="Supprimer" >
    </form>
    </div>
    <div>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Type</th>
            <th>Balance</th>
            <th>Currency</th>
            <th>Editer</th>
            <th>Suprimmer</th>
        </tr>
        <tr>
        <?php foreach(getAllAccounts() as $value): ?>   
            <th><?= $value['id']?></th>
            <th><?= $value['name']?></th>
            <th><?= $value['type']?></th>
            <th><?= $value['balance']?></th>
            <th><?= $value['currency']?></th>
            <th><button href="">Editer</button></th>
            <th><button href="">Supprimer</button></th>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
</body>
</html>