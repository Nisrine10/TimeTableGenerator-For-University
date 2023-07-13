<?php
session_start();
include("config.php");

// Récupérer les filtres de recherche
$filiere = isset($_GET['filiere']) ? $_GET['filiere'] : '-';
$classe = isset($_GET['classe']) ? $_GET['classe'] : '-';
$groupe = isset($_GET['groupe']) ? $_GET['groupe'] : '-';

// Requête de recherche avec des clauses WHERE conditionnelles
$requeteRecherche = "SELECT etudiant.nom, etudiant.prenom, filiere.nom_filiere, class.nom_class, groupe.nom_group 
                    FROM etudiant 
                    INNER JOIN filiere ON etudiant.id_filiere = filiere.id_filiere 
                    INNER JOIN class ON etudiant.id_class = class.id_class 
                    INNER JOIN groupe ON etudiant.id_group = groupe.id_group 
                    WHERE 1 ";

if ($filiere != '-') {
    $requeteRecherche .= "AND filiere.id_filiere = '$filiere' ";
}

if ($classe != '-') {
    $requeteRecherche .= "AND class.id_class = '$classe' ";
}

if ($groupe != '-') {
    $requeteRecherche .= "AND groupe.id_group = '$groupe' ";
}

$resultRecherche = $mysqli->query($requeteRecherche);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/mundiap.png">
    <title>Mundiapolis</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="main-wrapper">
        <!-- Reste du code HTML -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <label class="focus-label">Filière</label>
                    <select class="select floating" name="filiere">
                        <option value="-">-</option>
                        <?php
                        $requeteFilieres = "SELECT id_filiere, nom_filiere FROM filiere";
                        $resultFilieres = $mysqli->query($requeteFilieres);
                        while ($rowFiliere = mysqli_fetch_array($resultFilieres)) {
                            $selected = ($rowFiliere['id_filiere'] == $filiere) ? "selected" : "";
                            echo '<option value="' . $rowFiliere['id_filiere'] . '" '.$selected.'>' . $rowFiliere['nom_filiere'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <label class="focus-label">Classe</label>
                    <select class="select floating" name="classe">
                        <option value="-">-</option>
                        <?php
                        $requeteClasses = "SELECT id_class, nom_class FROM class";
                        $resultClasses = $mysqli->query($requeteClasses);
                        while ($rowClasse = mysqli_fetch_array($resultClasses)) {
                            $selected = ($rowClasse['id_class'] == $classe) ? "selected" : "";
                            echo '<option value="' . $rowClasse['id_class'] . '" '.$selected.'>' . $rowClasse['nom_class'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <label class="focus-label">Groupe</label>
                    <select class="select floating" name="groupe">
                        <option value="-">-</option>
                        <?php
                        $requeteGroupes = "SELECT id_group, nom_group FROM groupe";
                        $resultGroupes = $mysqli->query($requeteGroupes);
                        while ($rowGroupe = mysqli_fetch_array($resultGroupes)) {
                            $selected = ($rowGroupe['id_group'] == $groupe) ? "selected" : "";
                            echo '<option value="' . $rowGroupe['id_group'] . '" '.$selected.'>' . $rowGroupe['nom_group'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <button class="btn btn-success btn-block" type="submit">Search</button>
            </div>
        </div>
        <!-- Reste du code HTML -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Filière</th>
                                <th>Classe</th>
                                <th>Groupe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rowEtudiant = mysqli_fetch_array($resultRecherche)) {
                                echo '<tr>';
                                echo '<td>' . $rowEtudiant['nom'] . '</td>';
                                echo '<td>' . $rowEtudiant['prenom'] . '</td>';
                                echo '<td>' . $rowEtudiant['nom_filiere'] . '</td>';
                                echo '<td>' . $rowEtudiant['nom_class'] . '</td>';
                                echo '<td>' . $rowEtudiant['nom_group'] . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
