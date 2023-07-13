<?php
include_once("config.php");
$id_filiere = $_GET['id_filiere'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chef_filiere = $_POST["chef_filiere"];
    $nom_filiere = $_POST["nom_filiere"];
    $nom_faculte = $_POST["nom_faculte"];
    $nbr_annee = $_POST["nbr_annee"];

    $query = "UPDATE filiere SET chef_filiere='$chef_filiere',
    nom_filiere='$nom_filiere', nom_faculte='$nom_faculte', 
    nbr_annee='$nbr_annee'
     WHERE id_filiere='$id_filiere'";

    if (mysqli_query($mysqli, $query)) {
        header("Location: filiere.php?id_filiere=$id_filiere");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du filiere : " . mysqli_error($mysqli);
    }
}

$result = mysqli_query($mysqli, "SELECT * FROM filiere WHERE id_filiere='$id_filiere'");

if ($res = mysqli_fetch_array($result)) {
    $chef_filiere = $res["chef_filiere"];
    $nom_filiere = $res["nom_filiere"];
    $nom_faculte = $res["nom_faculte"];
    $nbr_annee = $res["nbr_annee"];
}
?>

<!-- Le reste de votre code HTML -->
