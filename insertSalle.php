<?php
session_start();
extract($_POST);
include("config.php");

$num_salle = $_POST["num_salle"];
$capacite = $_POST["capacite"];
$etage_salle = $_POST["etage_salle"];
$campus = $_POST["campus"];

$requete = "INSERT INTO salle (num_salle, capacite, etage_salle, campus)
            VALUES ('$num_salle', '$capacite', '$etage_salle', '$campus')";

// Exécuter la requête d'insertion
if ($mysqli->query($requete) === TRUE) {
    echo '<script>alert("Salle ajouté avec succès.");</script>';
    header("Location: salle.php");
} else {
    echo "Erreur lors de l'ajout de l'enseignant: " . $mysqli->error;
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
