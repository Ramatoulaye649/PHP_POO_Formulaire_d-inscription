<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- <link rel="stylesheet"  href="./build/css/demo.css"> -->
    <link rel="stylesheet"  href="./build/css/intlTelInput.css">
    <title>formulaire</title>
</head>
<body>
    
<?php
// configuration de connexion à la base de données
$serveur = "localhost"; 
$utilisateur = "root";
$motDePasse = ""; 
$baseDeDonnees = "Formulaire d'Inscription"; // Nom de la base de données MySQL

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Traitement du formulaire lorsque l'utilisateur soumet les données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["DAMIENS"];
    $prenom = $_POST["Ramatoulaye"];
    $login = $_POST["toulayedamiens@gmail.com"];
    $motDePasse = $_POST["1995_15Tl"];
    
    // Valider et traiter les données (vous pouvez ajouter plus de validation ici)
    if (empty($nom) || empty($prenom) || empty($login) || empty($motDePasse)) {
        echo "<script>alert('Inscription réussie, votre compte a été crée avec succés');</script>";
    } else {
        
        // Enregistrer des données de l'utilisateur dans une base de données ici
        $requete = "INSERT INTO utilisateurs (nom, prenom, login, mot_de_passe) VALUES (?, ?, ?, ?)";
        $statement = $connexion->prepare($requete);
        $statement->bind_param("ssss", $nom, $prenom, $login, $motDePasse);
        
        // Exemple de message de succès
          echo "<script>alert('Inscription réussie, votre compte a été crée cavec succés !');</script>";
    }
}
?>

 <div class="container">
        <div class="message-card">
            <div class="logo-pic"> <img src="" ></div>
            <div class="tittle"><h1>Connectez-vous</h1></div>
           
            <form method="POST" action="login.php">
               <input type="email" name="email" id="email" placeholder="Email" required>             
                <input type="password" name="pass1" id="pass1" placeholder="Mot de passe" required>
                 <button type="submit" name="connexion" id="connexion">Connexion </button>
                 <a href="register.php">Inscrivez-vous</a>
            </form>
            <div class="social-link">
                       
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter" ></i></a>
                <a href="#"><i class="fab fa-instagram" ></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-youtube" ></i></a>
                <a href="#"><i class="fab fa-periscope "></i></a>
          
           </div>
        </div>
    </div>
 
</body>
</html>