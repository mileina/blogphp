<?php
session_start(); // Démarre la session

require_once 'db_connect.php';

$error = ''; // Initialisation de la variable d'erreur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["mot_de_passe"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["role"] = $user["role"]; // Ajout de la variable de session "role"
            if ($_SESSION["role"] === "admin") { // Redirection vers admin.php si l'utilisateur est admin
                header("Location: admin.php");
                exit;
            }
            header("Location: profil.php");
            exit;
        } else {
            $error = "Mot de passe incorrect";
        }
    } else {
        $error = "Utilisateur non trouvé";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/co.css">
</head>

<body>
    <h1>Connexion</h1>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Connexion</button>
    </form>
    <?php if ($error != '') : ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    <br>
    <a href="index.php">Retour à la page d'accueil</a>
    <br>
    <a href="inscription.php">S'inscrire</a>
</body>

</html>