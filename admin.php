<?php
require_once 'db_connect.php';
session_start();

// Vérifier si l'utilisateur est connecté et a le rôle "admin"
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: connexion.php");
    exit;
}

// Récupérer la liste des utilisateurs
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Administration</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5 mb-4">Administration</h1>
        <table class="table table-hover mx-auto mb-5">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Nom d'utilisateur</th>
                    <th>Rôle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user["nom"] ?></td>
                        <td><?= $user["prenom"] ?></td>
                        <td><?= $user["email"] ?></td>
                        <td><?= $user["nom_utilisateur"] ?></td>
                        <td><?= $user["role"] ?></td>
                        <td>
                            <?php if ($user["role"] !== "admin") : ?>
                                <form action="admin_handler.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user["id"] ?>">
                                    <button type="submit" class="btn btn-primary btn-sm">Promouvoir en admin</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <div class="text-center">
            <a href="list_posts.php" class="btn btn-primary">Liste des articles</a>
            <a href="index.php" class="btn btn-secondary">Retour à l'index</a>
            <a href="logout.php" class="btn btn-danger">Déconnexion</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>