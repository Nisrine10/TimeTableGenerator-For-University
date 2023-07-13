<?php
include_once("config.php");

session_start();

if (isset($_GET['id_dispo'])) {
    $id_dispo = $_GET['id_dispo'];

    $result = mysqli_query($mysqli, "SELECT disponibilite.*, enseignant.nom_enseignant FROM disponibilite INNER JOIN enseignant ON disponibilite.id_enseignant = enseignant.id_enseignant WHERE id_dispo='$id_dispo'");

    // Check if there are any results in the query
    if ($res = mysqli_fetch_array($result)) {
        $id_dispo = $res['id_dispo'];
        $lundi = $res['lundi'];
        $mardi = $res['mardi'];
        $mercredi = $res['mercredi'];
        $jeudi = $res['jeudi'];
        $vendredi = $res['vendredi'];
        $samedi = $res['samedi'];
        $id_enseignant = $res['id_enseignant'];
        $nom_enseignant = $res['nom_enseignant'];
    }
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
                        <li class="active">
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
                    <div class="col-lg-8 offset-lg-2">
                    <h3>Édition de la disponibilité de l'enseignant : <?php echo $nom_enseignant; ?></h3>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="modifierDispo.php" method="post" class="php">
                            <div class="row" >
                                <div class="col-sm-6">
                                    <input type="text" name="id_dispo" value="<?php echo $id_dispo; ?>" hidden>
                                    <input type="text" name="id_enseignant" value="<?php echo $id_enseignant; ?>" hidden>
                                    <div class="form-group">
                                        <label>Lundi</label>
                                        <select class="select" name="lundi">
                                            <option value="">-</option>
                                            <?php
                                            $result3 = mysqli_query($mysqli, "SELECT * FROM horaire");
                                            while ($rowa = mysqli_fetch_array($result3)) {
                                                $selected = ($lundi == $rowa['id_horaire']) ? 'selected' : ''; // Vérifie si c'est l'option précédente sélectionnée
                                                echo '<option value="' . $rowa['id_horaire'] . '" ' . $selected . '>' . $rowa['nom_horaire'] . '</option>';
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mardi</label>
                                        <select class="select" name="mardi">

                                            <option value="">-</option>
                                            <?php
                                            $result3 = mysqli_query($mysqli, "SELECT * FROM horaire");
                                            while ($rowa = mysqli_fetch_array($result3)) {
                                                $selected = ($mardi == $rowa['id_horaire']) ? 'selected' : ''; // Vérifie si c'est l'option précédente sélectionnée
                                                echo '<option value="' . $rowa['id_horaire'] . '" ' . $selected . '>' . $rowa['nom_horaire'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mercredi</label>
                                        <select class="select" name="mercredi" value="<?php echo $mercredi; ?>">
                                            <option value="">-</option>
                                            <?php
                                            $result3 = mysqli_query($mysqli, "SELECT * FROM horaire");
                                            while ($rowa = mysqli_fetch_array($result3)) {
                                                $selected = ($mercredi == $rowa['id_horaire']) ? 'selected' : ''; // Vérifie si c'est l'option précédente sélectionnée
                                                echo '<option value="' . $rowa['id_horaire'] . '" ' . $selected . '>' . $rowa['nom_horaire'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jeudi</label>
                                        <select class="select" name="jeudi" value="<?php echo $jeudi; ?>">
                                            <option value="">-</option>
                                            <?php
                                            $result3 = mysqli_query($mysqli, "SELECT * FROM horaire");
                                            while ($rowa = mysqli_fetch_array($result3)) {
                                                $selected = ($jeudi == $rowa['id_horaire']) ? 'selected' : ''; // Vérifie si c'est l'option précédente sélectionnée
                                                echo '<option value="' . $rowa['id_horaire'] . '" ' . $selected . '>' . $rowa['nom_horaire'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Vendredi</label>
                                        <select class="select" name="vendredi" value="<?php echo $vendredi; ?>">
                                            <option value="">-</option>
                                            <?php
                                            $result3 = mysqli_query($mysqli, "SELECT * FROM horaire");
                                            while ($rowa = mysqli_fetch_array($result3)) {
                                                $selected = ($vendredi == $rowa['id_horaire']) ? 'selected' : ''; // Vérifie si c'est l'option précédente sélectionnée
                                                echo '<option value="' . $rowa['id_horaire'] . '" ' . $selected . '>' . $rowa['nom_horaire'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Samedi</label>
                                        <select class="select" name="samedi" value="<?php echo $samedi; ?>">
                                            <option value="">-</option>
                                            <?php
                                            $result3 = mysqli_query($mysqli, "SELECT * FROM horaire");
                                            while ($rowa = mysqli_fetch_array($result3)) {
                                                $selected = ($samedi == $rowa['id_horaire']) ? 'selected' : ''; // Vérifie si c'est l'option précédente sélectionnée
                                                echo '<option value="' . $rowa['id_horaire'] . '" ' . $selected . '>' . $rowa['nom_horaire'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary submit-btn"> <i class="fa fa-pencil" aria-hidden="true"></i> Modifier Disponibilité</button>
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

</body>


<!-- Edit dispo enseignant-->

</html>