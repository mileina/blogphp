<?php
require_once 'db_connect.php';

$post_id = $_GET['id'];

$sql = "SELECT * FROM postes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

$sql_comments = "SELECT * FROM commentaires WHERE post_id = ? ORDER BY date DESC";
$stmt_comments = $conn->prepare($sql_comments);
$stmt_comments->bind_param("i", $post_id);
$stmt_comments->execute();
$result_comments = $stmt_comments->get_result();
$commentaires = $result_comments->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post['titre'] ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/post.css">
    <script src="scripts.js" defer></script>
</head>

<body>
    <div class="container">
        <h2><?= $post['titre'] ?></h2>
        <p><?= $post['contenu'] ?></p>
        <p>Publié le <?= $post['date'] ?> par <?= $post['auteur'] ?></p>

        <h4>Ajouter un commentaire</h4>
        <form action="insert_comment.php" method="post">
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <label for="auteur">Nom :</label>
            <input type="text" name="auteur" id="auteur" required><br>
            <label for="contenu">Commentaire :</label>
            <textarea name="contenu" id="contenu" required></textarea><br>
            <button type="submit">Ajouter le commentaire</button>
        </form>

        <h3>Commentaires</h3>
        <?php foreach ($commentaires as $commentaire) : ?>
            <div class="comment">
                <p class="comment__author"><?= $commentaire['auteur'] ?> a écrit :</p>
                <p class="comment__content"><?= $commentaire['contenu'] ?></p>
                <p class="comment__date">Publié le <?= $commentaire['date'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="index.php" class="btn btn-secondary">Retour à l'accueil</a>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>