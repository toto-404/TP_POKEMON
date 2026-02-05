<?php

include_once "bd.inc.php";

function getUtilisateurs() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from users");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByUsername($username) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from users where username=:username");
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($username, $user_password) {
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($user_password, "sel");
        $req = $cnx->prepare("insert into users (username, user_password) values(:username,:user_password)");
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':user_password', $mdpUCrypt, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


// if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
//     // prog principal de test
//     header('Content-Type:text/plain');

//     echo "getUtilisateurs() : \n";
//     print_r(getUtilisateurs());

//     echo "getUtilisateurByMailU(\"mathieu.capliez@gmail.com\") : \n";
//     print_r(getUtilisateurByMailU("mathieu.capliez@gmail.com"));

//     echo "addUtilisateur('mathieu.capliez3@gmail.com', 'azerty', 'mat') : \n";
//     addUtilisateur("mathieu.capliez3@gmail.com", "azerty", "mat");
// }
// ?>