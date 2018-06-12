<?php

require_once 'database.php';

function addUser($user,$password){
    $bdd = createConnection();
    $insertUser = $bdd->prepare('INSERT INTO accounts (username,password) VALUES (:username,:password)');
    $insertUser->execute(array(
        "username" => $user,
        "password" => hash('sha256', $password)
    ));

    if($insertUser->rowCount() == 0) {return "error";}
    else {return "Account $user has been created";}
} 
function addUserForm(){
    if (isset($_POST['submit'])) { 
        $email = $_POST['email'];
        echo filter_var($email, FILTER_VALIDATE_EMAIL) ? addUser($_POST['email'],$_POST['password']) : "$email is not a valid email address";
    }
}

function loginUser($email,$password){
    $bdd = createConnection();
    $selectUser = $bdd->prepare('SELECT * FROM accounts WHERE username=:username AND password=:password');
    $selectUser->execute(array(
        "username" => $email,
        "password" => hash('sha256', $password)
    ));
    $data = $selectUser->fetch();

    if($selectUser->rowCount() == 0){return "Error";}
    else {$_SESSION['idUser'] = $data['id'];$_SESSION['nameUser'] = $data['username']; header("location: ../panel.php");}

}

function loginUserForm(){
    if(isset($_POST['submit'])){
        echo filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? loginUser($_POST['email'],$_POST['password']) : $_POST['email']." is not a valid email address";
    }
}