<?php
session_start();

if (!isset($_SESSION["username"])) {
    // Si l'utilisateur n'est pas authentifié, redirigez-le vers la page de connexion.
    header("Location: login.php");
    exit(); // Assurez-vous de quitter le script après la redirection.
}
?>

