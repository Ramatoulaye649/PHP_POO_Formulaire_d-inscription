<?php
session_start();

// Remplacez ces valeurs par vos nom d'utilisateur et mot de passe souhaités
$utilisateurAttendu = "TOULAYE905";
$motDePasseAttendu = password_hash("95_15Rl@y", PASSWORD_BCRYPT);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["TOULAYE905"];
    $password = $_POST["95_15Rl@y"];

    // Vérifiez si le nom d'utilisateur existe et si le mot de passe correspond
    if ($username === $utilisateurAttendu && password_verify($password, $motDePasseAttendu)) {
        // Authentification réussie, enregistrez le nom d'utilisateur dans la session
        $_SESSION["username"] = $username;
        header("Location: page.php"); // Redirigez l'utilisateur vers la page restreinte
        exit();
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
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
    <h1>Connexion</h1>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="page.php">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>

