<?php
session_start();
extract($_POST);
include("config.php");

$chef_filiere = $_POST["chef_filiere"];
$nom_filiere = $_POST["nom_filiere"];
$nom_faculte = $_POST["nom_faculte"];
$nbr_annee = $_POST["nbr_annee"];


$requete = "INSERT INTO filiere (chef_filiere,nom_filiere,nom_faculte,nbr_annee)
            VALUES ('$chef_filiere', '$nom_filiere', '$nom_faculte', '$nbr_annee')";

// Exécuter la requête d'insertion
if ($mysqli->query($requete) === TRUE) {
    echo '<script>alert("Filiere ajouté avec succès.");</script>';
    header("Location: filiere.php");
} else {
    echo "Erreur lors de l'ajout du filiere " . $mysqli->error;
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
