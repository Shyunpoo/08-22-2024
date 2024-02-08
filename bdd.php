<?php 
    try 
    {
        $bdd = new PDO("mysql:host=mysql-chinchilla.alwaysdata.net;dbname=chinchilla_bdd", "345543", "chinchilla@8520");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>