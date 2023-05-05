<?php

// Connexion à la base de données
require_once 'db_connect.php';

// Insérer un nouveau commentaire
$post_id = $_POST['post_id'];
$auteur = $_POST['auteur'];
$contenu = $_POST['contenu'];
$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO commentaires (post_id, auteur, contenu, date) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $post_id, $auteur, $contenu, $date);
$stmt->execute();

header("Location: post.php?id=" . $post_id); // Rediriger vers la page du post

?>

<?php
/*
// Connexion à la base de données
require_once 'db_connect.php';

// Créer un nouveau commentaire
$auteur = "Cindoche";
$contenu = "J'ai vraiment apprécié cet article ! Merci pour le partage.";
$date = date("Y-m-d H:i:s");
$post_id = 6; // Remplacez cette valeur par l'ID de l'article auquel vous souhaitez ajouter ce commentaire

$sql = "INSERT INTO commentaires (auteur, contenu, date, post_id) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $auteur, $contenu, $date, $post_id);
$stmt->execute();

echo "Nouveau commentaire créé.";
*/
?>
