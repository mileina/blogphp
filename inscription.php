<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nom_utilisateur = $_POST["nom_utilisateur"];

    // Vérifier si l'e-mail est déjà présent dans la base de données
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $error = "L'e-mail est déjà utilisé. Veuillez utiliser une autre adresse e-mail.";
    } else {
        // Insérer l'utilisateur dans la base de données
        $query = "INSERT INTO users (nom, prenom, email, mot_de_passe, nom_utilisateur, role) VALUES (?, ?, ?, ?, ?, 'user')";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $nom, $prenom, $email, password_hash($password, PASSWORD_DEFAULT), $nom_utilisateur);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // Rediriger l'utilisateur vers la page de connexion
        header("Location: connexion.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/inscrit.css">

</head>

<body>
    <h1>Inscription</h1>
    <?php if (isset($error)) : ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    <form action="inscription_handler.php" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="nom_utilisateur">Nom d'utilisateur:</label>
        <input type="text" id="nom_utilisateur" name="nom_utilisateur" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">S'inscrire</button>
    </form>
    <br>
    <a href="index.php">Retour à la page d'accueil</a>
    <br>
    <a href="connexion.php">Déjà inscrit?</a>
</body>

</html>