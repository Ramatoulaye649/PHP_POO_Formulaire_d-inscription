<?php
session_start();

// Détruire toutes les données de session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion (par exemple, login.php)
header("location: login.php");
exit(); // Quitter le script après la redirection.
?>