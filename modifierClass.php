<?php
session_start();
include("config.php");

// Vérifier si l'ID de la classe à modifier a été fourni
if (isset($_GET['id_class']) && !empty($_GET['id_class'])) {
    $id_class = $_GET['id_class'];
} else {
    echo "ID de la classe non spécifié.";
    exit;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom_class = $_POST['nom_class'];
    $niveau = $_POST['niveau'];
    $annee_scolaire = $_POST['annee_scolaire'];
    $id_filiere = $_POST['filiere'];

    // Mettre à jour les données de la classe dans la base de données
    $requeteUpdate = "UPDATE class SET nom_class = '$nom_class', niveau = '$niveau', annee_scolaire = '$annee_scolaire', id_filiere = '$id_filiere' WHERE id_class = '$id_class'";
    $resultatUpdate = $mysqli->query($requeteUpdate);

    if ($resultatUpdate) {
        header("Location: classe.php?id_class=$id_class");

    } else {
        echo "Erreur lors de la modification de la classe : " . $mysqli->error;
    }
}

?>
