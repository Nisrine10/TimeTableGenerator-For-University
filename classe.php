<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- attendance23:24-->

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
        <div class="header">
            <div class="header-left">
                <a href="index-2.php" class="logo">
                    <img src="assets/img/mundiap.png" width="40" height="40">
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">

                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="notification.php">Voir tous les Notifications</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
                            <span class="status online"></span></span>
                            <span><?php echo $_SESSION['admin']; ?></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.php">My Profile</a>

                        <a class="dropdown-item" href="login.php">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">My Profile</a>

                    <a class="dropdown-item" href="login.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="index-2.php"><i class="fa fa-home"></i> <span>Accueil</span></a>
                        </li>

                        <li>
                            <a href="demande.php"><i class="fa fa-envelope-open-o"></i> <span>Liste de demande</span></a>
                        </li>

                        <li>
                            <a href="emploi.php"><i class="fa fa-calendar-o"></i> <span>Emploi du temps</span></a>

                        </li>
                        <li >
                        <a href="disponibilite.php"><i class="fa fa-list"></i> <span>Disponibilité enseignant</span></a>

                        <li>
                        <li>
                            <a href="notification.php"><i class="fa fa-bell-o"></i> <span>Notifications</span></a>

                        </li>
                        <li>
                            <a href="calendar.php"><i class="fa fa-calendar"></i> <span>Calendrier</span></a>
                        </li>
                       
                        <li class="submenu">
                            <a href="#"><i class="fa fa-cog"></i> <span> Paramétrage </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li ><a href="enseignant.php">Enseignant</a></li>
                                  <li ><a href="etudiant.php">Etudiant</a></li>
                                  <li ><a href="filiere.php"> Filière</a></li>
                                  <li><a href="salle.php"> Salle</a></li>

                                  <li class="active" ><a href="classe.php"> Classe</a></li>
                               

                                </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title"> liste des Classes</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                  

                    <a href="add_classe.php" class="btn btn-primary float-right btn-rounded "><i class="fa fa-plus"></i> Ajouter Classe</a>
                    </div>
                </div>
                <div class="row filter-row">
                <div class="col-sm-6 col-md-4">
                <div class="form-group form-focus select-focus">
        <label class="focus-label">Filière</label>
        <select class="select floating" name="filiereValue">
            <option>-</option>
            <?php
            include("config.php");

            $requeteFilieres = "SELECT id_filiere, nom_filiere FROM filiere";
            $resultFilieres = $mysqli->query($requeteFilieres);

            while ($rowFiliere = mysqli_fetch_array($resultFilieres)) {
                echo '<option value="' . $rowFiliere['id_filiere'] . '">' . $rowFiliere['nom_filiere'] . '</option>';
            }
            ?>
        </select>
    </div>
</div>
                <div class="col-sm-6 col-md-4">
                        <div class="form-group form-focus">
                            <label class="focus-label"> Chercher Classe</label>
                            <input type="text" id="classeValue" class="form-control floating" name="classeValue">
                            
                        </div>
                    </div>
                   
                    <div class="col-sm-6 col-md-3">
                    <a href="#" id="search-btn" class="btn btn-success btn-block">Search</a>

                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
						<div class="table-responsive">
                            <table class="fl-table">
                                <thead>
                                    <tr>
                                        <th>Nom Classe</th>
                                        <th>Niveau</th>
                                        <th>Année Scolaire</th>
                                        <th>Filière</th>
                                        
                                       
                                        
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   


                                      <td>                                <?php
include("config.php");

// Exécuter une requête de sélection
$requeteSelect = "SELECT * FROM class";
$result = $mysqli->query($requeteSelect);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>". $row['nom_class'] ."</td>";
    echo "<td>". $row['niveau'] ."</td>";
    echo "<td>". $row['annee_scolaire'] ."</td>";
    

   // Sélectionner la filière correspondante à partir de son ID
$requeteFiliere = "SELECT nom_filiere FROM filiere WHERE id_filiere = ".$row['id_filiere'];
$resultFiliere = $mysqli->query($requeteFiliere);

if ($resultFiliere && $resultFiliere->num_rows > 0) {
    $rowFiliere = $resultFiliere->fetch_assoc();
    $nomFiliere = $rowFiliere['nom_filiere'];
} else {
    $nomFiliere = "Filière inconnue";
}

echo "<td>".$nomFiliere."</td>";

    echo "<td><a href=\"edit_class.php?id_class=".$row['id_class']."\" style=\"margin-right:10px; color:green;\"><i class=\"fa fa-pencil m-r-5\"></i></a>
         <a href=\"delete_class.php?id_class=" . $row['id_class'] . "\" style=\"margin-right:10px; color:red;\" onClick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce classe ?');\"><i class=\"fa fa-trash-o m-r-5\"></i></a></td>";
    echo "</tr>";
}
?>
									
									
									
                                </tbody>
                            </table>
						</div>
                    </div>
                </div>
            </div>
            <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script>
    // Attendre que le DOM soit chargé
    document.addEventListener("DOMContentLoaded", function(event) {
        // Référence aux éléments DOM
        var classeInput = document.getElementById("classeValue");
        var searchBtn = document.getElementById("search-btn");
        var tableBody = document.querySelector(".fl-table tbody");

        // Fonction de filtrage
        function filtrerTable(event) {
            event.preventDefault(); // Empêcher le comportement par défaut du lien

            var classeValue = classeInput.value.toLowerCase();

            // Parcourir chaque ligne du tableau
            var rows = tableBody.getElementsByTagName("tr");
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var classeCell = row.getElementsByTagName("td")[0];

                // Vérifier si la valeur de la classe est définie
                if (classeValue !== "") {
                    // Vérifier si la classe correspond à la valeur recherchée
                    if (classeCell.textContent.toLowerCase().indexOf(classeValue) > -1) {
                        row.style.display = ""; // Afficher la ligne
                    } else {
                        row.style.display = "none"; // Masquer la ligne
                    }
                } else {
                    row.style.display = ""; // Afficher toutes les lignes si la valeur n'est pas définie
                }
            }
        }

        // Événement de clic sur le lien de recherche
        searchBtn.addEventListener("click", filtrerTable);
    });
</script>

	
</body>


<!-- add-employee24:07-->
</html>
