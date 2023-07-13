<?php
session_start();

include('config.php');

if(isset($_GET['id_filiere']) && !empty($_GET['id_filiere'])) {
    $id_filiere = $_GET['id_filiere'];
    
    $sql = mysqli_query($mysqli,"DELETE FROM filiere WHERE id_filiere = $id_filiere");
    
    header("Location: filiere.php");
} else {
    echo "Invalid request";
}

mysqli_close($mysqli);
?>
