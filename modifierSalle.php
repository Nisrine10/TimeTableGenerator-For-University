<?php
include_once("config.php");
$id_salle = $_GET['id_salle'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_salle = $_POST["num_salle"];
    $capacite = $_POST["capacite"];
    $etage_salle = $_POST["etage_salle"];
    $campus = $_POST["campus"];
  

    $query = "UPDATE salle SET num_salle='$num_salle',
     capacite='$capacite', etage_salle='$etage_salle', 
     campus='$campus' WHERE id_salle='$id_salle'";

    if (mysqli_query($mysqli, $query)) {
        header("Location: salle.php?id_salle=$id_salle");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de la salle : " . mysqli_error($mysqli);
    }
}

$result = mysqli_query($mysqli, "SELECT * FROM salle WHERE id_salle='$id_salle'");

if ($res = mysqli_fetch_array($result)) {
    $num_salle = $res["num_salle"];
    $capacite = $res["capacite"];
    $etage_salle = $res["etage_salle"];
    $campus = $res["campus"];
    
}
?>

<!-- Le reste de votre code HTML -->
