<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["username"]) && isset($_POST["user_password"])){
    $username=$_POST["username"];
    $user_password=$_POST["user_password"];
}
else
{
    $username="";
    $user_password="";
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees
login($username,$user_password);

if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "$racine/controleur/controleurPrincipal.php";
}
else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "authentification";
    // include "$racine/vue/entete.html.php";
    include "$racine/vue/inscription.html.php";
    // include "$racine/vue/vueAuthentification.php";
    // include "$racine/vue/pied.html.php";
}

?>