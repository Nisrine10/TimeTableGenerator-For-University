<?php
session_start();
include("config.php");

// Vérifier si l'ID de la classe à éditer a été fourni
if (isset($_GET['id_class']) && !empty($_GET['id_class'])) {
    $id_class = $_GET['id_class'];

    // Récupérer les données de la classe depuis la base de données
    $requeteClass = "SELECT * FROM class WHERE id_class = '$id_class'";
    $resultatClass = $mysqli->query($requeteClass);

    // Vérifier si la classe existe
    if ($resultatClass->num_rows > 0) {
        $row = $resultatClass->fetch_assoc();
        $nom_class = $row['nom_class'];
        $niveau = $row['niveau'];
        $annee_scolaire = $row['annee_scolaire'];
        $id_filiere = $row['id_filiere'];
    } else {
        echo "Aucune classe trouvée avec cet ID.";
        exit;
    }
} else {
    echo "ID de la classe non spécifié.";
    exit;
}

// Récupérer les données des filières depuis la base de données
$requeteFiliere = "SELECT * FROM filiere";
$resultatFiliere = $mysqli->query($requeteFiliere);
$filieres = array();
while ($row = $resultatFiliere->fetch_assoc()) {
    $filieres[] = $row;
}
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
        <div class="header">
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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Modifier Classe</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="modifierClass.php?id_class=<?php echo $id_class; ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom de la classe <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nom_class" value="<?php echo $nom_class; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Niveau</label>
                                        <input class="form-control" type="number" name="niveau" value="<?php echo $niveau; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Année scolaire <span class="text-danger">*</span></label>
                                        <input class="form-control" type="annee" name="annee_scolaire" value="<?php echo $annee_scolaire; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Filière</label>
                                        <select class="select" name="filiere">
                                            <option value="">Sélectionner une filière</option>
                                            <?php foreach ($filieres as $filiere) { ?>
                                                <option value="<?php echo $filiere['id_filiere']; ?>" <?php if ($id_filiere == $filiere['id_filiere']) echo 'selected'; ?>>
                                                    <?php echo $filiere['nom_filiere']; ?>
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
        </div>
    </div>
</body>

</html>