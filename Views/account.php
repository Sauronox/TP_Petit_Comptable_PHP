<?php 
require_once './Models/Database.php';
require_once './Models/AccountModels.php';
session_start();
updateAccount();

$get = explode("/",$_GET['url']);
$op = selectOprationAccount($get[1]);
if(preg_match('#^[0-9]+$#',$get[1])){
    $bdd = createConnection();
    $selectAccount = $bdd->prepare('SELECT * FROM accounts WHERE id = :id');
    $selectAccount->execute(array(
        "id" => $get[1]
    ));
    if($selectAccount->rowCount() == 0) {return "Error";header("location: ./404");}
    else {    $data = $selectAccount->fetch();}
    // updateAccount();
}else{
    header("location: panel");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav id="top-navbar">
            <div id="navbar___logo"></div>
            <a href="login" id="change">Logout</a>
    </nav>
    <div id="container">
        <div>
            <span>Account n°<?= $data['id']?></span>
        </div>
        <div>
            <span><?= $data['name']?></span>
        </div>
        <div>
            <span><?= $data['type']?></span>
        </div>
        <div>
            <span><?= $data['balance']?> <?= $data['currency']?></span>
        </div>
    </div>
    <div id="container">
        <form action="" method="post">
            <input type="text" name="name" id="" placeholder="<?=$data['name']?>">
            <input type="hidden" name="id" value="<?= $data['id']?>">
            <input type="submit" value="Update">
        </form> 

         <form action="" method="post">
            <select name="type">
                <option value="cheque">Compte chèque</option> 
                <option value="pel">PEL</option>
                <option value="livret A">Livret A</option>
                <option value="autre">Autre</option>
            </select>
            <input type="hidden" name="id" value="<?= $data['id']?>">
            <input type="submit" value="Update">
        </form> 
        <form action="" method="post">
            <input type="number" name="balance">
            <input type="hidden" name="id" value="<?= $data['id']?>">
            <input type="submit" value="Update">
        </form>
        <form action="" method="post">
            <select name="currency">
                <option value="euro">EUR</option> 
                <option value="dollar">USD</option>
                <option value="yen">YEN</option>
            </select>
            <input type="hidden" name="id" value="<?= $data['id']?>">
            <input type="submit" value="Update">
        </form>
    </div>
        <table>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>amount</th>
                <th>category</th>
                <th>Payement Methode</th>
            </tr>
            <tr>
            <?php foreach ($op as $value):?>
                <th><?= $value['id']?></th>
                <th><?= $value['name'] ?></th>
                <th><?= $value['amount'] ?></th>
                <th><?= $value['id_category'] ?></th>
                <th><?= $value['payment_methode'] ?></th>
            <?php endforeach;?>  
            </tr>
        </table>
    <div>
    </div>
</body>
</html>