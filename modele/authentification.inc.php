<?php

include_once "bd.utilisateur.inc.php";

function login($username, $user_password) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByUsername($username);
    $mdpBD = $util["user_password"];

    if (trim($mdpBD) == trim(crypt($username, $user_password))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["username"] = $username;
        $_SESSION["user_password"] = $user_password;
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["username"]);
    unset($_SESSION["user_password"]);
}

function getUsernameLoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["username"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["username"])) {
        $util = getUtilisateurByUsername($_SESSION["username"]);
        if ($util["username"] == $_SESSION["username"] && $util["user_password"] == $_SESSION["user_password"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

// if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
//     // prog principal de test
//     header('Content-Type:text/plain');


//     // test de connexion
//     login("test@bts.sio", "sio");
//     if (isLoggedOn()) {
//         echo "logged";
//     } else {
//         echo "not logged";
//     }

//     // deconnexion
//     logout();
// }
?>