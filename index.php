 <!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
        }
    </style>
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
        echo "<script>alert('Inscription réussie, votre compte a été crée cavec succés !');</script>";
    } else {
        
        // Enregistrer des données de l'utilisateur dans une base de données ici
        $requete = "INSERT INTO utilisateurs (nom, prenom, login, mot_de_passe) VALUES (?, ?, ?, ?)";
        $statement = $connexion->prepare($requete);
        $statement->bind_param("ssss", $nom, $prenom, $login, $motDePasse);
        
        // Exemple de message de succès
          echo "<script>alert('Inscription réussie, votre compte a été crée avec succés !');</script>";
    }
}
?>

<h2>Formulaire d'Inscription</h2>
<form method="post" action="inscription.php">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom" required><br><br>

    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" id="prenom" required><br><br>

    <label for="login">Login:</label>
    <input type="text" name="login" id="login" required><br><br>

    <label for="motDePasse">Mot de passe:</label>
    <input type="password" name="motDePasse" id="motDePasse" required><br><br>

    <input type="submit" value="S'inscrire">
</form>

</body>
</html>