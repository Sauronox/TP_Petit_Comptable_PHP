<?php 

class Account
{
    private $accountId;
    private $userId;
    private $accountName;
    private $accountType;
    private $accountBalance;
    private $accountCurrency;

    public function __construct($accountId,$userId,$accountName, $accountType, $accountBalance, $accountCurrency){
        $this->accountId = $accountId;
        $this->userId = $userId;
        $this->accountName = $accountName;
        $this->accountType = $accountType;
        $this->accountBalance = $accountBalance;
        $this->accountCurrency = $accountCurrency;
    }
    public function getAccountId(){
        return $this->accountId;
    }
    public function getAccountName(){
        return $this->accountName;
    }
    public function getUserId(){
        return $this->userId;
    } 
    public function getAccountType(){
        return $this->accountType;
    }
    public function getAccountBalance(){
        return $this->accountBalance;
    }
    public function getAccountCurrency(){
        return $this->accountCurrency;
    }

    public function setAccountName($newName){
        $this->accountName = $newName;
    }
    public function setAccountType($newType){
        $this->accountName = $newType;
    }
    public function setAccountCurrency($newCurrency){
        $this->accountName = $newCurrency;
    }
    public function setAccountBalance($newBalance){
        $this->accountName = $newBalance;
    }
}