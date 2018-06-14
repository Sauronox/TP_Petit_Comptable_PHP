<?php 
require_once './Models/Database.php'; 

function addOperation($idAccount, $name, $amount, $category,$paiement_solution){
    $bdd = createConnection();
    $insertOperation = $bdd->prepare('INSERT INTO operation (id_accounts,name,amount,id_category,payment_methode) VALUES (:id_accounts,:name,:amount,:category,:payment)');
    try{
        $bdd->beginTransaction();
        $insertOperation->execute(array(
            "id_accounts" => $idAccount,
            "name" => $name,
            "amount" => $amount,
            "category" => $category,
            "payment" => $paiement_solution
        ));
        $bdd->commit(); 
    }catch(PDOExecption $e){
        echo "Error : ".e;
    }
    
    if($insertOperation->rowCount() == 0) {return "error";}
    else { header("location: panel");}
} 

function addOperationForm(){
    if (isset($_POST['submit'])) {
        addOperation($_POST['idAccount'], $_POST['name'], $_POST['amount'], $_POST['category'],$_POST['paiement']);
    }else{
        return "Error on account creation , invalid value";
    }
}

function getAllCategory(){
    $bdd = createConnection();
    $selectAllCategory = $bdd->prepare('SELECT * FROM category');
    $selectAllCategory->execute();
    return $selectAllCategory->fetchAll();
}
