<?php
session_start();
include("config.php");

// Vérifier si l'ID de l'étudiant à éditer a été fourni
if (isset($_GET['id_etudiant']) && !empty($_GET['id_etudiant'])) {
    $id_etudiant = $_GET['id_etudiant'];

    // Récupérer les données de l'étudiant depuis la base de données
    $requeteEtudiant = "SELECT * FROM etudiant WHERE id_etudiant = '$id_etudiant'";
    $resultatEtudiant = $mysqli->query($requeteEtudiant);

    // Vérifier si l'étudiant existe
    if ($resultatEtudiant->num_rows > 0) {
        $row = $resultatEtudiant->fetch_assoc();
        $nom_etudiant = $row['nom_etudiant'];
        $prenom_etudiant = $row['prenom_etudiant'];
        $email_etudiant = $row['email_etudiant'];
        $mdp_etudiant = $row['mdp_etudiant'];
        $adresse = $row['adresse'];
        $naissance = $row['naissance'];
        $telephone = $row['telephone'];
    } else {
        echo "Aucun étudiant trouvé avec cet ID.";
        exit;
    }
} else {
    echo "ID de l'étudiant non spécifié.";
    exit;
}

// Récupérer les données des groupes depuis la base de données
$requeteGroupe = "SELECT * FROM groupe";
$resultatGroupe = $mysqli->query($requeteGroupe);
$groupes = array();
while ($row = $resultatGroupe->fetch_assoc()) {
    $groupes[] = $row;
}
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
                        <li>
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
                                <li><a href="enseignant.php">Enseignant</a></li>
                                <li class="active"><a href="etudiant.php">Etudiant</a></li>
                                <li><a href="filiere.php"> Filière</a></li>
                                <li><a href="salle.php"> Salle</a></li>

                                <li><a href="classe.php"> Classe</a></li>


                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">

            <div class="content">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="page-title">Modifier l'étudiant</h4>
                    </div>
                </div>
                <form action="modifierEtudiant.php?id_etudiant=<?php echo $id_etudiant; ?>" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom d'étudiant <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nom_etudiant" value="<?php echo $nom_etudiant; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Prénom d'étudiant <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="prenom_etudiant" value="<?php echo $prenom_etudiant; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email_etudiant" value="<?php echo $email_etudiant; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mot de Passe</label>
                                <input class="form-control" type="password" name="mdp_etudiant" value="<?php echo $mdp_etudiant; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adresse <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="adresse" value="<?php echo $adresse; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Naissance</label>
                                <input class="form-control" type="date" name="naissance" value="<?php echo $naissance; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Téléphone </label>
                                <input class="form-control" type="text" name="telephone" value="<?php echo $telephone; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Groupe</label>
                                <select class="select" name="groupe">
                                    <option value="">Sélectionner un groupe</option>
                                    <?php foreach ($groupes as $groupe) { ?>
                                        <option value="<?php echo $groupe['id_group']; ?>" <?php if (isset($row['id_groupe']) && $groupe['id_group'] == $row['id_groupe']) echo 'selected'; ?>>

                                            <?php echo $groupe['nom_group']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Modifier</button>
                    </div>
                </form>
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



</html>