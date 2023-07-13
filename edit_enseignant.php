<?php
include_once("config.php");

session_start();

// Vérifier si l'ID de l'enseignant est spécifié dans la requête GET
if (isset($_GET['id_enseignant'])) {
    $id_enseignant = $_GET['id_enseignant'];

    // Vérifier si le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom_enseignant = $_POST["nom_enseignant"];
        $email_enseignant = $_POST["email_enseignant"];
        $adresse = $_POST["adresse"];
        $telephone = $_POST["telephone"];
        $statut_enseignant = $_POST["statut_enseignant"];
        $password = $_POST["password"];

        $query = "UPDATE enseignant SET nom_enseignant='$nom_enseignant',
         email_enseignant='$email_enseignant', adresse='$adresse', 
         telephone='$telephone', statut_enseignant='$statut_enseignant',
         password='$password' WHERE id_enseignant='$id_enseignant'";

        if (mysqli_query($mysqli, $query)) {
            header("Location: enseignant.php?id_enseignant=$id_enseignant");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'enseignant : " . mysqli_error($mysqli);
        }
    }

    // Exécuter une requête de sélection
    $result = mysqli_query($mysqli, "SELECT * FROM enseignant WHERE id_enseignant='$id_enseignant'");

    // Vérifier s'il y a des résultats dans la requête
    if ($res = mysqli_fetch_array($result)) {
        $nom_enseignant = $res["nom_enseignant"];
        $email_enseignant = $res["email_enseignant"];
        $adresse = $res["adresse"];
        $telephone = $res["telephone"];
        $statut_enseignant = $res["statut_enseignant"];
        $password = $res["password"];
    } else {
        // Gérer le cas où l'ID de l'enseignant n'est pas trouvé dans la base de données
        echo "ID de l'enseignant non trouvé.";
        exit;
    }
} else {
    // Gérer le cas où l'ID de l'enseignant n'est pas spécifié dans la requête GET
    echo "ID de l'enseignant non spécifié.";
    exit;
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
                                <li class="active"><a href="enseignant.php">Enseignant</a></li>
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
                        <h3>Modifier enseignant</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="modifierEnseignant.php?id_enseignant=<?php echo $id_enseignant; ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom d'enseignant</label>
                                        <input class="form-control" type="text" name="nom_enseignant" value="<?php echo $nom_enseignant; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Adresse d'enseignant</label>
                                        <input class="form-control" type="text" name="adresse" value="<?php echo $adresse; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Téléphone d'enseignant</label>
                                        <input class="form-control" type="text" name="telephone" value="<?php echo $telephone; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email d'enseignant</label>
                                        <input class="form-control" type="email" name="email_enseignant" value="<?php echo $email_enseignant; ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Statut</label>
                                        <input class="form-control" type="text" name="statut_enseignant" value="<?php echo $statut_enseignant; ?>">
                                    </div>
                                </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mot de passe de l'enseignant</label>
                                    <div class="input-group">
                                        <input class="form-control" type="password" name="password" id="password-input" value="<?php echo isset($password) ? $password : ''; ?>">
                                        <span class="input-group-btn">
                                            <button type="button" id="toggle-password" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()"><i class="fa fa-eye"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <script>
                                var passwordInput = document.getElementById("password-input");
                                var toggleButton = document.getElementById("toggle-password");

                                // Afficher la valeur saisie si elle existe
                                var passwordValue = passwordInput.value;
                                if (passwordValue !== "") {
                                    passwordInput.type = "text";
                                    toggleButton.innerHTML = '<i class="fa fa-eye-slash"></i>';
                                }

                                function togglePasswordVisibility() {
                                    if (passwordInput.type === "password") {
                                        passwordInput.type = "text";
                                        toggleButton.innerHTML = '<i class="fa fa-eye-slash"></i>';
                                    } else {
                                        passwordInput.type = "password";
                                        toggleButton.innerHTML = '<i class="fa fa-eye"></i>';
                                    }
                                }
                            </script>


                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" type="submit"><i class="fa fa-pencil" aria-hidden="true"></i> Modifier Enseignant</button>
                            </div>

                        </form>
                    </div>
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

</html>