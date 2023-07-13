<?php
include_once("config.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $id_dispo = $_POST['id_dispo'];
    $lundi = $_POST['lundi'];
    $mardi = $_POST['mardi'];
    $mercredi = $_POST['mercredi'];
    $jeudi = $_POST['jeudi'];
    $vendredi = $_POST['vendredi'];
    $samedi = $_POST['samedi'];
    $id_enseignant = $_POST['id_enseignant'];

    // Mettre à jour la table disponibilite
    $sql_dispo = "UPDATE disponibilite SET lundi='$lundi', mardi='$mardi', mercredi='$mercredi', jeudi='$jeudi', vendredi='$vendredi', samedi='$samedi',id_enseignant='$id_enseignant',id_dispo='$id_dispo' WHERE id_dispo='$id_dispo'";
    $result_dispo = mysqli_query($mysqli, $sql_dispo);

    

    // Vérifier si les mises à jour ont été effectuées avec succès
    if ($result_dispo) {
       header("Location: disponibilite.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour des données.";
    }
}
?>