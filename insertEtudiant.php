<?php
session_start();
extract($_POST);
include("config.php");

$nom_etudiant = $_POST["nom_etudiant"];
$prenom_etudiant = $_POST["prenom_etudiant"];
$email_etudiant = $_POST["email_etudiant"];
$mdp_etudiant = $_POST["mdp_etudiant"];
$adresse = $_POST["adresse"];
$naissance = $_POST["naissance"];
$telephone = $_POST["telephone"];
$id_group = $_POST["id_group"];

$requete = "INSERT INTO etudiant (nom_etudiant, prenom_etudiant, email_etudiant, mdp_etudiant, adresse, naissance, telephone, id_group)
            VALUES ('$nom_etudiant', '$prenom_etudiant', '$email_etudiant', '$mdp_etudiant', '$adresse', '$naissance', '$telephone', '$id_group')";

// Exécuter la requête d'insertion
if ($mysqli->query($requete) === TRUE) {
    echo '<script>alert("Étudiant ajouté avec succès.");</script>';
    header("Location: etudiant.php");
} else {
    echo "Erreur lors de l'ajout de l'étudiant: " . $mysqli->error;
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
