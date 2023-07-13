<?php
session_start();
extract($_POST);
include("config.php");

$nom_class = $_POST["nom_class"];
$niveau = $_POST["niveau"];
$annee_scolaire = $_POST["annee_scolaire"];
$id_filiere = $_POST["filiere"];

$requete = "INSERT INTO class (nom_class, niveau, annee_scolaire, id_filiere)
            VALUES ('$nom_class', '$niveau', '$annee_scolaire', '$id_filiere')";

// Exécuter la requête d'insertion
if ($mysqli->query($requete) === TRUE) {
    echo '<script>alert("Classe ajoutée avec succès.");</script>';
    header("Location: classe.php");
} else {
    echo "Erreur lors de l'ajout de la classe : " . $mysqli->error;
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
