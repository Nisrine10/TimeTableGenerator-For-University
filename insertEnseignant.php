<?php
session_start();
extract($_POST);
include("config.php");

$nom_enseignant = $_POST["nom_enseignant"];
$email_enseignant = $_POST["email_enseignant"];
$adresse = $_POST["adresse"];
$telephone = $_POST["telephone"];
$statut_enseignant = $_POST["statut_enseignant"];
$password = $_POST["password"];

$requete = "INSERT INTO enseignant (nom_enseignant, email_enseignant, adresse, telephone, statut_enseignant,password)
            VALUES ('$nom_enseignant', '$email_enseignant', '$adresse', '$telephone', '$statut_enseignant', '$password')";

// Exécuter la requête d'insertion
if ($mysqli->query($requete) === TRUE) {
    echo '<script>alert("Enseignant ajouté avec succès.");</script>';
    header("Location: enseignant.php");
} else {
    echo "Erreur lors de l'ajout de l'enseignant: " . $mysqli->error;
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
