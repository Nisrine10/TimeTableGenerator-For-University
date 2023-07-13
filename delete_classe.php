<?php
session_start();
include("config.php");

// Vérifier si l'ID de la classe à supprimer a été fourni
if (isset($_GET['id_class']) && !empty($_GET['id_class'])) {
    $id_class = $_GET['id_class'];

    // Requête de suppression de la classe
    $requeteDeleteClass = "DELETE FROM class WHERE id_class = '$id_class'";

    // Exécuter la requête de suppression
    if ($mysqli->query($requeteDeleteClass) === TRUE) {
        echo '<script>alert("Classe supprimée avec succès.");</script>';
        header("Location: classe.php");
        exit;
    } else {
        echo "Erreur lors de la suppression de la classe : " . $mysqli->error;
    }
} else {
    echo "ID de la classe non spécifié.";
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
