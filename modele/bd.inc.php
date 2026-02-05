<?php
$login = "root";
$mdp = "";
$bd ="pokedex";
$serveur = "127.0.0.1";

try{
    $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
catch(PDOException $e){
    echo "Erreur de connexion PDO";
    die();
    }
?>