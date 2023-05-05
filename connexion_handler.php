
<?php
require_once 'db_connect.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Trouvez l'utilisateur dans la base de données
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user === null) {
        die("Utilisateur introuvable");
    }

    // Vérifiez si le mot de passe correspond
    if (password_verify($password, $user['mot_de_passe'])) {
        // Créez une session et redirigez l'utilisateur vers la page d'administration ou la page d'accueil en fonction de son rôle
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["role"] = $user['role'];
        if ($user['role'] === 'ADMIN') {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        die("Mot de passe incorrect");
    }
}
?>
