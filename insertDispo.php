<?php
session_start();
include 'config.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $id_enseignant = $_POST["id_enseignant"];
    $monday = $_POST["MONDAY"];
    $tuesday = $_POST["TUESDAY"];
    $wednesday = $_POST["WEDNESDAY"];
    $thursday = $_POST["THURSDAY"];
    $friday = $_POST["FRIDAY"];
    $saturday = $_POST["SATURDAY"];
    $sunday = $_POST["SUNDAY"];



    // Vérifier la validité des valeurs avant l'insertion
    $valid = true;

    // Insérer les données dans la table disponibilite si tout est valide
    if ($valid) {
        $query = "INSERT INTO disponibilite (MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY, SATURDAY, SUNDAY, id_enseignant)
                  VALUES ($monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday, $id_enseignant)";

        mysqli_query($mysqli, $query);
        header("Location: disponibilite.php?id_enseignant=$id_enseignant");
    }

    $mysqli->close();
}
?>
