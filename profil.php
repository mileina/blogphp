<?php
require_once 'db_connect.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: connexion.php");
    exit;
}

$user_id = $_SESSION["user_id"];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>

<body>
    <h1>Bienvenue <?= $user["prenom"] ?> <?= $user["nom"] ?></h1>
    <p>Votre email est : <?= $user["email"] ?></p>
    <p>Votre nom d'utilisateur est : <?= $user["nom_utilisateur"] ?></p>
    <?php if (isset($_SESSION["user_id"])) : ?>
        <p>Vous êtes connecté en tant que <?= $user["role"] ?></p>
    <?php endif; ?>
    <a href="logout.php">Déconnexion</a>
    <br>
    <a href="index.php">Retour à la page d'accueil</a>
</body>

</html>