<?php
    require_once "./config/constante.php";
    try {
        
       $PDO= new PDO("mysql:host=localhost;dbname=mydatabase", USER , PASSWORD);
       $PDO->exec("SET NAMES UTF8");
       $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       //echo" Connexion reussite";
    } catch (PDOException $e) {
       echo" Erreur ".$e->getMessage(). "a la ligne ". $e->getline(). " dans le fichier ".$e->getFile();
    }
   
?>