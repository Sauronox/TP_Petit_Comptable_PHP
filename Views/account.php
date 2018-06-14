<?php 
require_once './Models/Database.php';
require_once './Models/AccountModels.php';
session_start();
$get = explode("/",$_GET['url']);
if(preg_match('#^[0-9]+$#',$get[1])){
    echo "number";
    $bdd = createConnection();
    $selectAccount = $bdd->prepare('SELECT * FROM accounts WHERE id = :id');
    if($selectAccount->rowCount() == 0) {return "Error";}
    else {$data =  $selectAccount->fetch();}
    function updatevalue(){
        if(isset($_POST['Update'])){

        }
    }

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
    <title><?php $data['name']?></title>
</head>
<body>
    <nav id="top-navbar">
            <div id="navbar___logo"></div>
            <a href="login" id="change">Logout</a>
    </nav>
    <div id="container">
        </div>
            <span>Account n°<?= $data['id']?></span>
        </div>
        </div>
            <span><?= $data['name']?></span>
        </div>
        </div>
            <span><?= $data['type']?></span>
        </div>
        </div>
            <span><?= $data['balance']?></span>
        </div>
        </div>
            <span><?= $data['currency']?></span>
        </div>
    </div>
    <div id="container">
        <form action="" method="post">
            <input type="text" name="name" id="" placeholder="<?=$data['name']?>"><br>
            <input type="submit" value="Update">
        </form> 

         <form action="" method="post">
            <select id="type" name="type">
                <option value="cheque">Compte chèque</option> 
                <option value="pel">PEL</option>
                <option value="livret">Livret A</option>
                <option value="autre">Autre</option>
            </select>
            <input type="submit" value="Update">
        </form> 
        <form action="" method="get">
            <input type="number" name="balance"><br>
            <input type="submit" value="Update">
        </form>
        <form action="" method="post">
            <select id="type" name="currency">
                <option value="euro">EUR</option> 
                <option value="dollar">USD</option>
                <option value="yen">YEN</option>
            </select>
            <input type="submit" value="Update">
        </form>
    </div>
    <?php ?>
    <?php ?>
</body>
</html>