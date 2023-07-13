<?php
session_start();

include('config.php');

if(isset($_GET['id_dispo']) && !empty($_GET['id_dispo'])) {
    $id_dispo = $_GET['id_dispo'];
    
    $sql = mysqli_query($mysqli,"DELETE FROM disponibilite WHERE id_dispo = $id_dispo");
    
    header("Location: disponibilite.php");
} else {
    echo "Invalid request";
}

mysqli_close($mysqli);
?>
