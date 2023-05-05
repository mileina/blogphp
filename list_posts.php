<?php
require_once 'db_connect.php';

// Nombre de postes par page
$posts_per_page = 3;

// Calcul du nombre total de pages
$query = "SELECT COUNT(*) AS total_rows FROM postes";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_rows = $row['total_rows'];
$total_pages = ceil($total_rows / $posts_per_page);

// Déterminer la page courante
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $posts_per_page;

// Récupérer les postes de la page courante
$query = "SELECT * FROM postes ORDER BY date DESC LIMIT ?, ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ii", $offset, $posts_per_page);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$postes = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des postes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Liste des postes</h1>
        <?php if (isset($_SESSION["user_id"]) && $_SESSION["role"] == "admin") : ?>
        <?php endif; ?>
        <a href="add_post.php" class="btn btn-success mb-3">Ajouter un nouveau poste</a>
        <a href="index.php" class="btn btn-primary mb-3">Retour à l'index</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($postes as $poste) : ?>
                    <tr>
                        <td><?= $poste['titre'] ?></td>
                        <td><?= $poste['contenu'] ?></td>
                        <td>
                            <form method="POST" action="edit_post.php">
                                <input type="hidden" name="post_id" value="<?= $poste['id'] ?>">
                                <a href="edit_post.php?post_id=<?= $poste['id'] ?>" class="btn btn-primary">Modifier</a>
                                <form method="POST" action="">
                                    <input type="hidden" name="post_id" value="<?= $poste['id'] ?>">
                                    <button type="submit" name="delete_post" class="btn btn-danger">Supprimer</button>
                                </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page - 1 ?>">Précédent</a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">Suivant</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>