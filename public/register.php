<?php
session_start();
// Si l'utilisateur est déjà connecté, on le redirige vers la page d'accueil
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<body>
    <p>Créez vous un compte pour utiliser le service</p>
    <?php
        // Afficher les erreurs si elles existent
        if (isset($_SESSION['error_message'])) {
            echo "<p style='color:red;'>".$_SESSION['error_message']."</p>";
            unset($_SESSION['error_message']);
        }
        ?>
    <form action="scripts/userRegister.php" method="POST">
        <div>
            <label for="nom">Nom d'utilisateur</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="submit" value="Inscription">
        <div>
            <p>Déjà inscrit ?<a href="login.php">Connecte toi !</a></p>
        </div>
    </form>
</body>
</html>