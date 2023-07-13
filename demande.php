<?php
        session_start();
        include 'config.php';
        ?>
        <!DOCTYPE html>
        <html lang="en">


        <!-- patients23:17-->
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
            <link rel="shortcut icon" type="image/x-icon" href="assets/img/mundiap.png">
            <title>mundiapolis</title>
            <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
            <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
            <link rel="stylesheet" type="text/css" href="assets/css/style.css">

            <!--[if lt IE 9]>
                <script src="assets/js/php5shiv.min.js"></script>
                <script src="assets/js/respond.min.js"></script>
            <![endif]-->
        </head>

        <body>
            <div class="main-wrapper">
                <div class="header">
                    <div class="header-left">
                        <a href="index-2.php" class="logo">
                            <img src="assets/img/mundiap.png" width="40" height="40" > 
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
                                <li >
                                    <a href="index-2.php"><i class="fa fa-home"></i> <span>Accueil</span></a>
                                </li>

                                <li class="active">
                                    <a href="demande.php"><i class="fa fa-envelope-open-o"></i> <span>Liste de demande</span></a>
                                </li>
                            

                                <li >
                                    <a href="emploi.php"><i class="fa fa-calendar-o"></i> <span>Emploi du temps</span></a>
                                
                                </li>
                                <li >
                                <a href="disponibilite.php"><i class="fa fa-list"></i> <span>Disponibilite enseignant</span></a>							
                                <li>
                                <li>
                                    <a href="notification.php" ><i class="fa fa-bell-o"></i> <span>Notifications</span></a>

                                </li>
                                <li>
                                    <a href="calendar.php"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
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
                    <div class="col-sm-4 col-3">
                        <h1>Liste des demandes</h1>
                    </div>   
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">NR</th>
                                        <th class="text-center">Enseignant</th>
                                        <th class="text-center">Date du cours</th>
                                        <th class="text-center">Heure du cours</th>
                                        <th class="text-center">Module</th>
                                        <th class="text-center">Date du reportement</th>
                                        <th class="text-center">Heure du reportement</th>
                                        <th class="text-center">Commentaire</th>
                                        <th class="text-center">Etat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Requête SQL pour récupérer les données de la table "demande" avec les jointures appropriées
                                    $sql = "SELECT demande.id_demande, demande.contenu, demande.statut_demande, enseignant.nom_enseignant, demande.id_admin, demande.Date_Coursa, demande.Heure_Coursa, demande.Module, demande.Date_Report, demande.Heure_Report
                                            FROM demande
                                            INNER JOIN enseignant ON demande.id_enseignant = enseignant.id_enseignant";
                                    $conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        if (isset($_GET['action']) && $_GET['action'] == "terminer" && isset($_GET['id_demande'])) {
                                            $id_demande = $_GET['id_demande'];
                                            $updateQuery = "UPDATE demande SET statut_demande = 'terminer' WHERE id_demande = $id_demande";
                                            $conn->query($updateQuery);
                                        }
                                        // Afficher les données de chaque ligne
                                        while ($row = $result->fetch_assoc()) {
                                            $heureCoursa = substr($row["Heure_Coursa"], 0, 5);
                                            $heureReport = substr($row["Heure_Report"], 0, 5);
                                            echo "<tr>";
                                            echo "<td class=\"text-center\">" . $row["id_demande"] . "</td>";
                                            echo "<td class=\"text-center\">" . $row["nom_enseignant"] . "</td>";
                                            "<td>" . $row["id_admin"] . "</td>";
                                            echo "<td class=\"text-center\">" . $row["Date_Coursa"] . "</td>";
                                            echo "<td class=\"text-center\">" . $heureCoursa . "</td>";
                                            echo "<td class=\"text-center\">" . $row["Module"] . "</td>";
                                            echo "<td class=\"text-center\">" . $row["Date_Report"] . "</td>";
                                            echo "<td class=\"text-center\">" . $heureReport . "</td>";
                                            echo "<td class=\"text-center\">" . $row["contenu"] . "</td>";
                                            echo "<td class=\"text-center\">" . $row["statut_demande"] . "</td>";
                                            echo "<td class=\"text-center\">";

                                            if ($row["statut_demande"] === "terminer") {
                                                echo "<a href=\"emploi.php\"><i class=\"fa fa-eye\"></i></a>";
                                            } else {
                                                echo "<a href=\"?id_demande=" . $row['id_demande'] . "&action=terminer\"><i class=\"fa fa-check\"></i></a>";
                                                echo "<a href=\"emploi.php\"><i class=\"fa fa-eye\"></i></a>";
                                            }

                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='10'>Aucune demande trouvée.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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
            <script src="assets/js/jquery.dataTables.min.js"></script>
            <script src="assets/js/dataTables.bootstrap4.min.js"></script>
            <script src="assets/js/moment.min.js"></script>
            <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
            <script src="assets/js/app.js"></script>
        </body>



        </php>