<?php
session_start();
include("config.php");

// Vérifier si l'ID de l'enseignant à supprimer a été fourni
if (isset($_GET['id_enseignant']) && !empty($_GET['id_enseignant'])) {
    $id_enseignant = $_GET['id_enseignant'];

    // Supprimer la contrainte de clé étrangère
    $requeteDropForeignKey = "ALTER TABLE disponibilite
        DROP FOREIGN KEY disponiblite_enseignant_FK";

    // Exécuter la requête pour supprimer la contrainte de clé étrangère
    if ($mysqli->query($requeteDropForeignKey) === TRUE) {
        // La contrainte de clé étrangère a été supprimée avec succès

        // Modifier la contrainte de clé étrangère
        $requeteAlterTable = "ALTER TABLE disponibilite
            ADD CONSTRAINT disponiblite_enseignant_FK
            FOREIGN KEY (id_enseignant)
            REFERENCES enseignant (id_enseignant)
            ON DELETE CASCADE";

        // Exécuter la requête de modification de la contrainte de clé étrangère
        if ($mysqli->query($requeteAlterTable) === TRUE) {
            // La contrainte de clé étrangère a été modifiée avec succès

            // Requête de suppression de l'enseignant
            $requeteDeleteEnseignant = "DELETE FROM enseignant WHERE id_enseignant = '$id_enseignant'";

            // Exécuter la requête de suppression
            if ($mysqli->query($requeteDeleteEnseignant) === TRUE) {
                echo '<script>alert("Enseignant supprimé avec succès.");</script>';
                header("Location: enseignant.php");
            } else {
                echo "Erreur lors de la suppression de l'enseignant: " . $mysqli->error;
            }
        } else {
            echo "Erreur lors de la modification de la contrainte de clé étrangère: " . $mysqli->error;
        }
    } else {
        echo "Erreur lors de la suppression de la contrainte de clé étrangère: " . $mysqli->error;
    }
} else {
    echo "ID de l'enseignant non spécifié.";
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
