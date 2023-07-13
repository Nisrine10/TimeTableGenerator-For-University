<?php
session_start();
// Include the database configuration file
require_once 'config.php';
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les valeurs des champs du formulaire
    $heureCoursa = $_POST["Heure_Coursa"];
    $module = $_POST["Module"];
    $dateReport = $_POST["Date_Report"];
    $dateCoursa = $_POST["Date_Coursa"];
    $heureReport = $_POST["Heure_Report"];
    $contenu = $_POST["contenu"];
    
    // Les valeurs fixes pour id_enseignant, id_admin et statut_demande
    $id_enseignant = $_SESSION['user_id'];
    $id_admin = 1;

    $statutDemande = "encours";
    $databaseHost = 'localhost';
    
    try {
        // Connexion à la base de données
        $databaseName = 'emploi';
        $databaseUsername = 'root';
        $databasePassword = ''; 

        $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

        // Préparer la requête d'insertion avec des paramètres
        $sql = "INSERT INTO demande (contenu, statut_demande, id_enseignant, id_admin,
        Heure_Coursa, Module, Date_Report, Date_Coursa, Heure_Report) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        /* $sql = `INSERT INTO demande (contenu, statut_demande, id_enseignant, id_admin,
        Heure_Coursa, Module, Date_Report, Date_Coursa, Heure_Report) VALUES ($contenu, $statutDemande, $id_enseignant, $id_admin, $heureCoursa, $module, $dateReport, $dateCoursa, $heureReport)`; */

        

        $stmt = $mysqli->prepare($sql);
        

        // Lier les paramètres à la requête
        $stmt->bind_param("ssiisssss", $contenu, $statutDemande, $id_enseignant, $id_admin, $heureCoursa, $module, $dateReport, $dateCoursa, $heureReport);

        // Exécuter la requête d'insertion
        $stmt->execute();

        // Afficher une alerte avec JavaScript
        echo '<script>alert("Les données ont été insérées avec succès dans la table demande.");</script>';

        // Rediriger vers la page index-2.php
        header("Location: enseignant.php");
        exit;
    } catch (Exception $e) {
        // Afficher un message d'erreur
        echo "Erreur lors de l'insertion des données : " . $e->getMessage();
    } finally {
        // Fermer la connexion à la base de données
        $mysqli->close();
    }
}
?>