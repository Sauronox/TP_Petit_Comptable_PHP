<?php
    function createConnection() {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=users','root','root');
        }catch(Exception $e) {
            echo $e->getMessage();
        }
        return $bdd;
    }