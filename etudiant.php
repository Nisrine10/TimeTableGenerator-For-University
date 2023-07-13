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
                        <li>
                        <a href="disposalle.php"><i class="fa fa-home"></i> <span>Disponibilite salle</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-cog"></i> <span> Paramétrage </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li ><a href="enseignant.php">Enseignant</a></li>
                                  <li class="active"><a href="etudiant.php">Etudiant</a></li>
                                  <li><a href="filiere.php"> Filière</a></li>
                                  <li><a href="salle.php"> Salle</a></li>

                                  <li ><a href="classe.php"> Classe</a></li>
                             

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
                        <h4 class="page-title"> liste des Etudiants</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <button class="btn btn-primary float-right btn-rounded"><i class="fa fa-print"></i> Imprimer </button>

                    <a href="add_etudiant.php" class="btn btn-primary float-right btn-rounded m-r-5"><i class="fa fa-plus"></i> Ajouter Etudiant</a>
                    </div>
                </div>
                <form action="result.php" method="POST">
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <label class="focus-label">Filière</label>
                    <select class="select floating" name="filiere">
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
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <label class="focus-label">Classe</label>
                    <select class="select floating" name="classe">
                        <option>-</option>
                        <?php
                        $requeteClasses = "SELECT id_class, nom_class FROM class";
                        $resultClasses = $mysqli->query($requeteClasses);

                        while ($rowClass = mysqli_fetch_array($resultClasses)) {
                            echo '<option value="' . $rowClass['id_class'] . '">' . $rowClass['nom_class'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <label class="focus-label">Groupe</label>
                    <select class="select floating" name="groupe">
                        <option>-</option>
                        <?php
                        $requeteGroupes = "SELECT id_group, nom_group FROM groupe";
                        $resultGroupes = $mysqli->query($requeteGroupes);

                        while ($rowGroupe = mysqli_fetch_array($resultGroupes)) {
                            echo '<option value="' . $rowGroupe['id_group'] . '">' . $rowGroupe['nom_group'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-success btn-block" name="search"> Search </button>
            </div>
        </div>
    </form>
                <div class="row">
                    <div class="col-md-12">
						<div class="table-responsive">

                        

                            <table class="fl-table">
                                <thead>
                                    <tr>
                                        <th>Nom etudiant</th>
                                        <th>prenom etudiant</th>
                                        <th>Email</th>
                                        <th>Mot de passse</th>
                                        <th>Adresse</th>
                                        <th>Naissance</th>
                                        <th>Telephone</th>
                                        <th>Groupe</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
include("config.php");

// Exécuter une requête de sélection
$requeteSelect = "SELECT * FROM etudiant";
$result = $mysqli->query($requeteSelect);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>". $row['nom_etudiant'] ."</td>";
    echo "<td>". $row['prenom_etudiant'] ."</td>";
    echo "<td>". $row['email_etudiant'] ."</td>";
    echo "<td>". $row['mdp_etudiant'] ."</td>";
    echo "<td>". $row['adresse'] ."</td>";
    echo "<td>". $row['naissance'] ."</td>";
    echo "<td>". $row['telephone'] ."</td>";
  // Sélectionner les groupes depuis la table groupe
$requeteGroupes = "SELECT id_group, nom_group FROM groupe";
$resultGroupes = $mysqli->query($requeteGroupes);

// Rechercher le nom du groupe correspondant à l'ID stocké
$selectedGroupId = $row['id_group'];
$selectedGroupName = '';

while ($rowGroupe = mysqli_fetch_array($resultGroupes)) {
    if ($rowGroupe['id_group'] == $selectedGroupId) {
        $selectedGroupName = $rowGroupe['nom_group'];
        break;
    }
}

echo "<td>".$selectedGroupName."</td>";

    echo "<td><a href=\"edit_etudiant.php?id_etudiant=".$row['id_etudiant']."\" style=\"margin-right:10px; color:green;\"><i class=\"fa fa-pencil m-r-5\"></i></a>
         <a href=\"delete_etudiant.php?id_etudiant=" . $row['id_etudiant'] . "\" style=\"margin-right:10px; color:red;\" onClick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');\"><i class=\"fa fa-trash-o m-r-5\"></i></a></td>";
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
	
</body>


<!-- add-employee24:07-->
</html>
