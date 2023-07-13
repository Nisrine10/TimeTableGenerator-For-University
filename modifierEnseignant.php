<?php
include_once("config.php");
$id_enseignant = $_GET['id_enseignant'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_enseignant = $_POST["nom_enseignant"];
    $email_enseignant = $_POST["email_enseignant"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];
    $statut_enseignant = $_POST["statut_enseignant"];
    $password = $_POST["password"];

    $query = "UPDATE enseignant SET nom_enseignant='$nom_enseignant',
     email_enseignant='$email_enseignant', adresse='$adresse', 
     telephone='$telephone', statut_enseignant='$statut_enseignant',
     password='$password' WHERE id_enseignant='$id_enseignant'";

    if (mysqli_query($mysqli, $query)) {
        header("Location: enseignant.php?id_enseignant=$id_enseignant");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'enseignant : " . mysqli_error($mysqli);
    }
}

$result = mysqli_query($mysqli, "SELECT * FROM enseignant WHERE id_enseignant='$id_enseignant'");

if ($res = mysqli_fetch_array($result)) {
    $nom_enseignant = $res["nom_enseignant"];
    $email_enseignant = $res["email_enseignant"];
    $adresse = $res["adresse"];
    $telephone = $res["telephone"];
    $statut_enseignant = $res["statut_enseignant"];
    $password = $res["password"];
}
?>

<!-- Le reste de votre code HTML -->
