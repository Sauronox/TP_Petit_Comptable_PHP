<?php
    function createConnection() {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=petitcomptable','root','root');
        }catch(Exception $e) {
            echo $e->getMessage();
        }
        return $bdd;
    }