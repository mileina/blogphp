<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $role = 'USER'; // définir le rôle par défaut sur 'USER'

    // Hachez le mot de passe avant de l'enregistrer dans la base de données
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Enregistrez l'utilisateur dans la base de données en utilisant des requêtes préparées
    $query = "INSERT INTO users (nom, prenom, email, mot_de_passe, nom_utilisateur, role) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $nom, $prenom, $email, $hashed_password, $nom_utilisateur, $role);
        
        if (mysqli_stmt_execute($stmt)) {
            // Afficher le message
            echo "Votre inscription a bien été prise en compte !";
            // Attendre 2 secondes
            sleep(2);
            // Rediriger l'utilisateur vers la page de connexion
            header("Location: connexion.php");
            exit;
        } else {
            echo "Erreur: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }
}
