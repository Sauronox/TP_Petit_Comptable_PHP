<?php 
require_once './Models/Database.php'; 
require_once './Entity/User.php';
require_once './Entity/Account.php';

function addAccount($name, $type, $balance, $currency){
    if (getMaxAccount() < 10) {
        $bdd = createConnection();
        $insertAccount = $bdd->prepare('INSERT INTO accounts (idUser,name,type,balance,currency) VALUES (:idUser,:name,:type,:balance,:currency)');
        $insertAccount->execute(array(
        "idUser" => $_SESSION['user']->getId(),
        "name" => $name,
        "type" => $type,
        "balance" => intval($balance),
        "currency" => $currency
    ));

        if ($insertAccount->rowCount() == 0) {
            return "error";
        } else {
            header("location: accounts");
        }
    }else{
        echo "Vous ne pouvez pas créer plus de 10 comptes";
    }
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

function getMaxAccount(){
    $bdd = createConnection();
    $selectAllAccount = $bdd->prepare('SELECT * FROM accounts WHERE idUser = :idUser');
    $selectAllAccount->execute(array(
        "idUser" => $_SESSION['user']->getId()
    ));
    return $selectAllAccount->rowCount();
}

function getAllAccounts(){
    $bdd = createConnection();
    $selectAllAccount = $bdd->prepare('SELECT * FROM accounts WHERE idUser = :idUser');
    $selectAllAccount->execute(array(
        "idUser" => $_SESSION['user']->getId()
    ));
    $data = $selectAllAccount->fetchAll();

    if($selectAllAccount->rowCount() == 0) {}
    else {return $data;}
}

function deleteAccount(){
    if(isset($_POST['Supprimer'])){
            $bdd = createConnection();
            $selectAllAccount = $bdd->prepare('DELETE FROM accounts WHERE id = :id');
            $selectAllAccount->execute(array(
                "id" => $_POST['account']
            ));  
            if($selectAllAccount->rowCount() == 1) {return "Error";}
            else {return "Account deleted";}
    }
}

function updateAccount(){
    if(isset($_POST['Update'])){
        $bdd = createConnection();
        $selectAllAccount = $bdd->prepare('UPDATE accounts SET name = :name, type = :type, balance = :balance, currency = :currency WHERE id = :id');
        $selectAllAccount->execute(array(
            "id" => $_POST['id'],
            "name" => $_POST['name'],
            "type" => $_POST['type'],
            "balance" => $_POST['balance'],
            "currency" => $_POST['currency']
        ));  
        if($selectAllAccount->rowCount() == 1) {return "Error";}
        else {return "Account modified";hreader("location: ./panel");}
}   
}