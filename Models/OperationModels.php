<?php 
require_once './Models/Database.php'; 

function addAccount($idUser, $name, $amount, $category,$paiement_solution){
    $bdd = createConnection();
    $insertAccount = $bdd->prepare('INSERT INTO accounts (idUser,type,balance,currency) VALUES (:name,:type,:balance,:currency)');
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
        addAccount($_POST['idAccount'], $_POST['name'], $_POST['amount'], $_POST['category'],$_POST['paiement']);
    }else{
        return "Error on account creation , invalid value";
    }
}