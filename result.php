<!DOCTYPE html>
<html>
<head>
    <title>Résultat de recherche</title>
    <!-- Inclure la bibliothèque Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Résultat de recherche</h2>

        <?php
        include("config.php");

        // Vérifier si le formulaire a été soumis
        if (isset($_POST['search'])) {
            // Récupérer les valeurs des combobox
            $filiereId = $_POST['filiere'];
            $classeId = $_POST['classe'];
            $groupeId = $_POST['groupe'];

            // Récupérer les noms des filières, classes et groupes
            $resultFiliere = $mysqli->query("SELECT nom_filiere FROM filiere WHERE id_filiere = $filiereId");
            $resultClasse = $mysqli->query("SELECT nom_class FROM class WHERE id_class = $classeId");
            $resultGroupe = $mysqli->query("SELECT nom_group FROM groupe WHERE id_group = $groupeId");

            // Vérifier si les requêtes de récupération ont réussi
            if ($resultFiliere && $resultClasse && $resultGroupe) {
                $rowFiliere = $resultFiliere->fetch_assoc();
                $rowClasse = $resultClasse->fetch_assoc();
                $rowGroupe = $resultGroupe->fetch_assoc();

                // Récupérer les noms correspondants
                $filiere = $rowFiliere['nom_filiere'];
                $classe = $rowClasse['nom_class'];
                $groupe = $rowGroupe['nom_group'];
            } else {
                // En cas d'erreur lors de la récupération des noms, utiliser les IDs par défaut
                $filiere = $filiereId;
                $classe = $classeId;
                $groupe = $groupeId;
            }

            // Afficher les valeurs des combobox
            echo "<p class='lead'>Filière : " . $filiere . "</p>";
            echo "<p class='lead'>Classe : " . $classe . "</p>";
            echo "<p class='lead'>Groupe : " . $groupe . "</p>";

            // Construire la requête SQL pour récupérer les étudiants correspondants aux critères
            $requeteEtudiants = "SELECT etudiant.*, filiere.nom_filiere, groupe.nom_group, class.nom_class 
                                FROM etudiant 
                                INNER JOIN groupe ON etudiant.id_group = groupe.id_group 
                                INNER JOIN class ON groupe.id_class = class.id_class 
                                INNER JOIN filiere ON class.id_filiere = filiere.id_filiere 
                                WHERE ";

            if ($filiereId != '-') {
                $requeteEtudiants .= "filiere.id_filiere = $filiereId AND ";
            }

            if ($classeId != '-') {
                $requeteEtudiants .= "class.id_class = $classeId AND ";
            }

            if ($groupeId != '-') {
                $requeteEtudiants .= "groupe.id_group = $groupeId AND ";
            }

            // Supprimer le "AND" final de la requête
            $requeteEtudiants = rtrim($requeteEtudiants, " AND ");

            // Exécuter la requête et afficher les résultats
            $resultEtudiants = $mysqli->query($requeteEtudiants);

            if ($resultEtudiants->num_rows > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped'>";
                echo "<thead><tr><th>Nom</th><th>Prénom</th><th>Numéro d'étudiant</th><th>Filière</th><th>Groupe</th><th>Classe</th></tr></thead>";
                echo "<tbody>";
                
                while ($rowEtudiant = mysqli_fetch_array($resultEtudiants)) {
                    echo "<tr>";
                    echo "<td>" . $rowEtudiant['nom_etudiant'] . "</td>";
                    echo "<td>" . $rowEtudiant['prenom_etudiant'] . "</td>";
                    echo "<td>" . $rowEtudiant['id_etudiant'] . "</td>";
                    echo "<td>" . $rowEtudiant['nom_filiere'] . "</td>";
                    echo "<td>" . $rowEtudiant['nom_group'] . "</td>";
                    echo "<td>" . $rowEtudiant['nom_class'] . "</td>";
                    echo "</tr>";
                }
                
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p class='lead'>Aucun étudiant trouvé.</p>";
            }
        } else {
            echo "<p class='lead'>Aucune recherche effectuée.</p>";
        }
        ?>

        <!-- Inclure la bibliothèque Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </div>
    <a href="etudiant.php" class="btn btn-primary">Back</a>
</body>
</html>
