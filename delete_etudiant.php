<?php
session_start();
include("config.php");

// Vérifier si l'ID de l'étudiant à supprimer a été fourni
if (isset($_GET['id_etudiant']) && !empty($_GET['id_etudiant'])) {
    $id_etudiant = $_GET['id_etudiant'];

    // Requête de suppression de l'étudiant
    $requeteDeleteEtudiant = "DELETE FROM etudiant WHERE id_etudiant = '$id_etudiant'";

    // Exécuter la requête de suppression
    if ($mysqli->query($requeteDeleteEtudiant) === TRUE) {
        echo '<script>alert("Etudiant supprimé avec succès.");</script>';
        header("Location: etudiant.php");
        exit;
    } else {
        echo "Erreur lors de la suppression de l'étudiant : " . $mysqli->error;
    }
} else {
    echo "ID de l'étudiant non spécifié.";
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
