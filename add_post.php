<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];
    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO postes (titre, contenu, date) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $titre, $contenu, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: list_posts.php");
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un nouveau poste</title>
    <link rel="stylesheet" href="css/.css">

</head>

<body>
    <h1>Ajouter un nouveau poste</h1>
    <form action="add_post.php" method="POST">
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" required>
        <br>
        <label for="contenu">Contenu:</label>
        <textarea id="contenu" name="contenu" required></textarea>
        <br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="list_posts.php">Retour à la liste des postes</a>
</body>

</html>