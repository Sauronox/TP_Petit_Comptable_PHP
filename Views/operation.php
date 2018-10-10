<?php
require_once './Models/OperationModels.php';
require_once './Models/AccountModels.php';
require_once './Entity/User.php';

session_start();
if(!isset($_SESSION['user'])){
    header("location: login");
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
        <div>
            <label> Choisir le Compte</label><br>
            <select name="idAccount">
                <?php foreach(getAllAccounts() as $key => $value):?>
                    <option value="<?= htmlspecialchars($value['id']); ?>"><?= htmlspecialchars($value['name']); ?></option>
                    <option value=""><?php $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label> Nom de l'opération (32 caractère)</label><br>
            <input type="text" name="name" placeHolder="Nom" required><br>
        </div>
        <div>
            <label>Montant</label><br>
            <input type="number" step="0.01" name="amount" id="">
        </div>
        <div>
            <label> Catégorie de l'opération</label><br>
            <select name="category" id="">
                <?php foreach (getAllCategory() as $key => $value): ?>
                    <option value="<?= $value['id']?>"><?= $value['name']?> - <?= $value['type']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label> Mode de paimement</label><br>
            <select name="paiement">
                <option value="CB">Carte Bancaire</option>
                <option value="CH">Chèque</option>
                <option value="Virement">Virement</option>
                <option value="Prelevement">Prélevement</option>
            </select>
        </div>
            <br><input type="submit" name="submit">
    </form>
    <div>
</div>
</body>
</html>