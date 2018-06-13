<?php

require_once './Models/Database.php';
require_once './Entity/User.php';

function addUser($user,$password){
    $bdd = createConnection();
    $passwHash = hash('sha256', $password);
    $insertUser = $bdd->prepare('INSERT INTO users (email,password) VALUES (:email,:password)');
    $insertUser->execute(array(
        "email" => $user,
        "password" => $passwHash
    ));

    if($insertUser->rowCount() == 0) {return "error";}
    else {
        $_SESSION['user'] = new User($user,$password);
        loginUser($user, $passwHash);
        header('Location: ./panel');
    }
} 
function addUserForm(){
    if (isset($_POST['submit'])) { 
        $email = $_POST['email'];
        echo filter_var($email, FILTER_VALIDATE_EMAIL) ? addUser($_POST['email'],$_POST['password']) : "$email is not a valid email address";
    }
}

function loginUser($email,$password){
    $bdd = createConnection();
    isset($_COOKIE['user']) ? $passwHash = $password : $passwHash = hash('sha256', $password);
    $selectUser = $bdd->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
    $selectUser->execute(array(
        "email" => $email,
        "password" => $passwHash
    ));
    $data = $selectUser->fetch();
    $duration = 7*24*3600;

    if($selectUser->rowCount() == 0){return "Error";}
    else {$_SESSION['user'] = new User($email,$password) ; header("location: ../Views/panel.php");$arrUser = array($email,$passwHash);if(!isset($_COOKIE['user'])){setcookie("user", json_encode($arrUser), time() +$duration, "/");}} 
}

function loginUserForm(){
    if(isset($_POST['submit'])){
        echo filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? loginUser($_POST['email'],$_POST['password']) : $_POST['email']." is not a valid email address";
    }
}

function getCookieUser(){
    // echo $_COOKIE['user'];
    if(isset($_COOKIE['user'])){
        $cookie = json_decode($_COOKIE['user'], true);
        loginUser($cookie[0],$cookie[1]);
        var_dump($cookie);
    }else{
        echo "Erreur";
    }
}