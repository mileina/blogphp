<?php
require_once 'db_connect.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: connexion.php");
    exit;
}

if (!isset($_GET["post_id"])) {
    header("Location: list_post.php");
    exit;
}

$post_id = $_GET["post_id"];

// Récupérer les informations du poste
$query = "SELECT * FROM postes WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $post_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$post = mysqli_fetch_assoc($result);

if (!$post) {
    header("Location: list_post.php");
    exit;
}
$post_id = $_GET["post_id"];
$query = "SELECT * FROM postes WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $post_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$post = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier le poste</title>
</head>

<body>
    <h1>Modifier le poste</h1>
    <link rel="stylesheet" href="css/edit.css">

    <form action="edit_post.php" method="POST">
        <input type="hidden" name="post_id" value="<?= $post_id ?>">
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" value="<?= $post['titre'] ?>" required>
        <br>
        <label for="contenu">Contenu:</label>
        <textarea id="contenu" name="contenu" required><?= $post['contenu'] ?></textarea>
        <br>
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="list_posts.php">Retour à la liste des postes</a>
</body>

</html>