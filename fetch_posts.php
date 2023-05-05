<?php
// Connexion à la base de données
require_once 'db_connect.php';

// Nombre d'articles par page
$articles_per_page = 3;

// Récupérer le numéro de la page actuelle
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

// Calculer l'offset pour la requête SQL
$offset = ($page - 1) * $articles_per_page;

// Récupérer les articles pour la page actuelle
$sql = "SELECT * FROM postes ORDER BY date DESC LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $offset, $articles_per_page);
$stmt->execute();
$result = $stmt->get_result();
$postes = $result->fetch_all(MYSQLI_ASSOC);

// Calculer le nombre total de pages
$sql = "SELECT COUNT(*) as total_articles FROM postes";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_articles = $row['total_articles'];
$total_pages = ceil($total_articles / $articles_per_page);
