<?php

class User
{
    private $_userId;
    private $_userEmail;
    private $_userName;
    private $_userPassword;
    private $_usserDateCreation;

    public function __construct($id, $email, $password, $dateCreation)
    {
        $this->setId($id);
        $this->setEmail($email);
        $this->generateName($email);
        $this->setPassword($password);
        $this->setDateCreation($dateCreation);
    }

    public function getId()
    {
        return $this->_userId;
    }
    public function setId($id){
        $this->_userId = $id;
    }
    
    public function getEmail()
    {
        return $this->_userEmail;
    }
    public function setEmail($email)
    {
        $this->_userEmail = $email;
    }

    public function getName()
    {
        return $this->_userName;
    }
    public function setName($name)
    {
         $this->_userName = $anme;
    }
    private function generateName($email)
    {
        $str = explode("@", $email);
        $this->_userName = $str[0];
    }

    public function setPassword($password){
        $this->_userPassword = $password;
    }
    public function getPassword()
    {
        return $this->_userPassword;
    }

    public function getDateCreation()
    {
        return $this->_usserDateCreation;
    }
    public function setDateCreation($dateCreation)
    {
        $this->_usserDateCreation = $dateCreation;
    }
}