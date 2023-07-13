<?php
session_start();
include("config.php");
$id_etudiant = $_GET['id_etudiant'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $nom_etudiant = $_POST['nom_etudiant'];
    $prenom_etudiant = $_POST['prenom_etudiant'];
    $email_etudiant = $_POST['email_etudiant'];
    $mdp_etudiant = $_POST['mdp_etudiant'];
    $adresse = $_POST['adresse'];
    $naissance = $_POST['naissance'];
    $telephone = $_POST['telephone'];
    $groupe = $_POST['groupe'];

    // Préparer la requête avec des paramètres
    $requeteUpdate = "UPDATE etudiant SET nom_etudiant = ?, prenom_etudiant = ?, email_etudiant = ?, mdp_etudiant = ?, adresse = ?, naissance = ?, telephone = ?, id_group = ? WHERE id_etudiant = ?";
    $stmt = $mysqli->prepare($requeteUpdate);
    
    // Vérifier si la préparation de la requête a réussi
    if ($stmt) {
        // Lier les paramètres avec les valeurs
        $stmt->bind_param("ssssssssi", $nom_etudiant, $prenom_etudiant, $email_etudiant, $mdp_etudiant, $adresse, $naissance, $telephone, $groupe, $id_etudiant);
        
        // Exécuter la requête
        $resultatUpdate = $stmt->execute();
        
        if ($resultatUpdate) {
            header("Location: etudiant.php?id_enseignant=$id_enseignant");
        } else {
            echo "Erreur lors de la mise à jour des données de l'étudiant : " . $mysqli->error;
        }
        
        // Fermer le statement
        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête : " . $mysqli->error;
    }
}
?>
