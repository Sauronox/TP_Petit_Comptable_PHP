<?php

class Account 
{

    // private $id;

    private $email;

    private $name;

    private $password;

    private $PlainPassword;

    function __constructeur($id,$email,$password){
        // $this->id = $id;
        $this->email = $email;
        $this->generateName($email);
        $this->encryptPassword($password);
    }

    // public function getId(){
    //     return $this->id;
    // }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        return $this->email = $email;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        return $this->name = $anme;
    }
    private function generateName($email){
        $str = explode("@",$email);
        $this->name = $str[0];
    }

    public function setPassword(){

    }
    public function getPassword(){
        return $this->password;
    }

    private function encryptPassword($password){
        $salt = substr($this->email,0,3);
        $this->password = hash('sha256', $salt.$password);
    }

}
