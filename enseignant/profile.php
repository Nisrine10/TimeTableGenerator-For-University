  
    <?php
    session_start();
    // Include the database configuration file
    require_once 'config.php';
    
    // Check if the enseignant is logged in
    if (!isset($_SESSION['email_enseignant'])) {
        // Redirect to the login page or perform any other action
        header('Location: login.php');
        exit;
    }
    
    // Get the enseignant's email from the session
    $email = $_SESSION['email_enseignant'];
    
    // Fetch the enseignant's details from the database based on the email
    $query = "SELECT * FROM enseignant WHERE email_enseignant = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $enseignant = $result->fetch_assoc();
    
    // Display the enseignant's details
    ?>


    <!DOCTYPE html>
    <html lang="en">


    <!-- profile22:59-->

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
        <title>mundiapolis</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="main-wrapper">
            <div class="header">
                <div class="header-left">
                    <a href="enseignant.php" class="logo">
                        <img src="assets/img/mundiap.png" width="40" height="40">
                    </a>
                </div>
                <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
                <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
                <ul class="nav user-menu float-right">
                    <li class="nav-item dropdown d-none d-sm-block">
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
                            <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="nom etudiant">
                                <span class="status online"></span></span>
                            <span><?php echo $_SESSION['enseignant']; ?></span>
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
                            <li class="active">
                                <a href="enseignant.php"><i class="fa fa-home"></i> <span>Accueil</span></a>
                            </li>

                            <li>
                                <a href="monemploie.php"><i class="fa fa-user"></i> <span>Mon emploie</span></a>
                            </li>

                            <li>
                                <a href="demande.php"><i class="fa fa-envelope-open-o"></i> <span>Demande</span></a>
                            </li>

                            <li>
                                <a href="classe.php"><i class="fa fa-user"></i> <span>Classes</span></a>
                            </li>

                            <li>
                                <a href="notification.php"><i class="fa fa-bell-o"></i> <span>Notification</span></a>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-7 col-6">
                            <h1>Mon Profile</h1>
                        </div>

                        <!-- <div class="col-sm-5 col-6 text-right m-b-30">
                            <a href="edit-profile.php" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                        </div> -->
                    </div>
                    <div class="card-box profile-header">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#"><img class="avatar" src="assets/img/user.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0"><?php echo $enseignant['nom_enseignant']; ?></h3>
                                                    <small class="text-muted"><?php echo $enseignant['statut_enseignant']; ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <span class="title">Téléphone:</span>
                                                        <span class="text"><a href="#"><?php echo $enseignant['telephone']; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Email:</span>
                                                        <span class="text"><a href="#"><?php echo $enseignant['email_enseignant']; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Addresse:</span>
                                                        <span class="text"><?php echo $enseignant['adresse']; ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <script src="assets/js/app.js"></script>
    </body>

    </html>