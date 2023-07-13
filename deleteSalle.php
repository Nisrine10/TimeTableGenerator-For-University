<?php
session_start();

// Assuming your config.php contains the necessary database connection code
include 'config.php';

if (isset($_GET['id_salle']) && !empty($_GET['id_salle'])) {
    $id_salle = $_GET['id_salle'];

    // Delete associated rows from the concerngroupe table
    mysqli_query($mysqli, "DELETE FROM concerngroupe WHERE id_seance IN (SELECT id_seance FROM seance WHERE id_salle = $id_salle)");

    // Delete associated rows from the est_plannifier table
    mysqli_query($mysqli, "DELETE FROM est_plannifier WHERE id_seance IN (SELECT id_seance FROM seance WHERE id_salle = $id_salle)");

    // Delete associated rows from the concerner table
    mysqli_query($mysqli, "DELETE FROM concerner WHERE id_seance IN (SELECT id_seance FROM seance WHERE id_salle = $id_salle)");

    // Delete associated rows from the seance table
    mysqli_query($mysqli, "DELETE FROM seance WHERE id_salle = $id_salle");

    // Delete associated rows from the disponibilite_salle table
    mysqli_query($mysqli, "DELETE FROM disponibilite_salle WHERE id_salle_salle = $id_salle");

    // Delete the row from the salle table
    mysqli_query($mysqli, "DELETE FROM salle WHERE id_salle = $id_salle");

    header("Location: salle.php");
} else {
    echo "Invalid request";
}

mysqli_close($mysqli);





?>
