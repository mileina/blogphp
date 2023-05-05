<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouvel article</title>
</head>

<body>
    <h1>Créer un nouvel article</h1>
    <form action="insert_post.php" method="post">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" required><br>
        <label for="contenu">Contenu :</label>
        <textarea name="contenu" id="contenu" required></textarea><br>
        <label for="auteur">Auteur :</label>
        <input type="text" name="auteur" id="auteur" required><br>
        <button type="submit">Créer l'article</button>
    </form>
</body>

</html>