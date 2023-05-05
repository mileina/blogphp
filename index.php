<?php
require_once 'fetch_posts.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog de streameuse</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Streameuse</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mon Twitch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mes clips</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Articles</a>
                </li>
            </ul>
            <?php if (isset($_SESSION["user_id"])) : ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php if (isset($_SESSION["nom_utilisateur"])) : ?>
                            <p class="nav-link">Connecté en tant que <?= $_SESSION["nom_utilisateur"] ?> (<?= $_SESSION["role"] ?>)</p>
                        <?php endif; ?>
                        <?php if ($_SESSION["role"] == "admin") : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administration
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="list_posts.php">Liste des postes</a>
                            <a class="dropdown-item" href="admin.php">Liste utilisateur</a>
                            <a class="dropdown-item" href="add_post.php">Ajouter un poste</a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
                </ul>
            <?php else : ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                </ul>
            <?php endif; ?>

            <!-- formulaire de recherche -->
            <form class="form-inline ml-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Recherche">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
            </form>
        </div>
    </nav>
    <!-- Contenu principal -->
    <div class="container">
        <h1 class="my-4">Mon blog de streameuse</h1>
        <!-- Liens de réseaux sociaux -->
        <div class="text-center mb-4">
            <a href="mailto:monadresse@mail.com" class="mx-2"><i class="fas fa-envelope"></i></a>
            <a href="https://www.youtube.com/user/tonpseudo" class="mx-2"><i class="fab fa-youtube"></i></a>
            <a href="https://www.facebook.com/tonpseudo" class="mx-2"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/tonpseudo" class="mx-2"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@tonpseudo" class="mx-2"><i class="fab fa-tiktok"></i></a>
        </div>
        <!-- Liste des articles -->
        <div class="row">
            <?php foreach ($postes as $poste) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= $poste['titre'] ?></h5>
                            <p class="card-text"><?= substr($poste['contenu'], 0, 100) . '...' ?></p>
                            <a href="post.php?id=<?= $poste['id'] ?>" class="btn btn-primary">Lire la suite</a>
                        </div>
                        <div class="card-footer text-muted">
                            Publié le <?= $poste['date'] ?> par <?= $poste['auteur'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page - 1 ?>">Précédent</a>
                </li>
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
    <script src="scripts.js" defer></script>
</body>

</html>