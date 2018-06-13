<?php 
require_once './Models/Database.php'; 

function addAccount($name, $type, $balance, $currency){
    $bdd = createConnection();
    $insertAccount = $bdd->prepare('INSERT INTO accounts (name,type,balance,currency) VALUES (:name,:type,:balance,:currency)');
    $insertAccount->execute(array(
        "name" => $name,
        "type" => $type,
        "balance" => $balance,
        "currency" => $currency
    ));

    if($insertAccount->rowCount() == 0) {return "error";}
    else {header("location: ./panel");echo"Account created";}
} 

function addAccountForm(){
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $balance = $_POST['balance'];
        $currency = $_POST['currency'];
        addAccount($name, $type, $balance, $currency);
    }else{
        return "Error on account creation , invalid value";
    }
}