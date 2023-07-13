<?php
session_start();
// Include the database configuration file
require_once 'config.php';


    // Fetch the admin credentials from the database
    $query = "SELECT * FROM enseignant WHERE nom_enseignant = ? OR email_enseignant = ? LIMIT 1";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $email, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $enseignant = $result->fetch_assoc();
    //$_SESSION['id_enseignant'] = $enseignant['id_enseignant'];
?>


<!DOCTYPE html>
<html lang="en">


<!-- patients23:17-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>enseignant</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" >
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
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" >
							<span class="status online"></span></span>
                            <span><?php echo $_SESSION['enseignant']; ?></span>
                         
                               
                    </a>
					<div class="dropdown-menu">

						<a class="dropdown-item" href="profile.php">My Profile</a>
						
						<a class="dropdown-item" href="login.php">Logout</a>
                       
					</div>
                </li>
            </ul>
           
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>
                        <li >
                            <a href="enseignant.php"><i class="fa fa-home"></i> <span>Accueil</span></a>
                        </li>

                        <li >
                            <a href="monemploie.php"><i class="fa fa-user"></i> <span>Mon emploie</span></a>
						</li>

                        <li class="active">
                            <a href="demande.php"><i class="fa fa-envelope-open-o"></i> <span>Demande</span></a>
                        </li>
                        
						<li >
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
                
					<div class="main-wrapper account-wrapper">
                        <div class="account-page" style=" ">
                            <div class="account-center">
                                <div class="account-box">
                                   
                                        <div class="account-logo">
                                            <h4 >Demande de report ou avancement</h4>
                                        </div>

                                        <form id="demandeForm" action="envoyerDemande.php" method="POST" >
        

                                        <div class="form-group">
                                            <label> Date Cours</label>
                                            <input type="date" name="Date_Coursa" id="Date_Coursa" value="" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label>Time du cours</label>
                                            <input type="time" name="Heure_Coursa" id="Heure_Coursa" value="" class="form-control">
                                        </div>
                                        <div class="col-sm-14">
                                            <div class="form-group">
                                            <label>Module</label>
                                            <select onChange="getmodule(this.value);" class="select form-control" name="Module" id="Module" required>
                                                <option value="">Module</option>
                                                <?php

                                                    
                                                // Requête SQL pour récupérer les modules enseignés par l'enseignant
                                                $sql = "SELECT element_module.id_element_module, nom_element_module
                                                        FROM element_module
                                                        INNER JOIN enseigne ON element_module.id_element_module = enseigne.id_element_module
                                                        WHERE enseigne.id_enseignant = " . $_SESSION['user_id'];

                                                // Exécution de la requête SQL
                                                $result = $mysqli->query($sql);

                                                // Vérification des erreurs lors de l'exécution de la requête
                                                if (!$result) {
                                                    die("Erreur lors de l'exécution de la requête : " . $mysqli->error);
                                                }

                                                // Parcours des résultats et création des options du combo box
                                                while ($row = $result->fetch_assoc()) {
                                                    $moduleId = $row['id_element_module'];
                                                    $moduleName = $row['nom_element_module'];
                                                    echo "<option value=\"$moduleName\">$moduleName</option>";
                                                }
                                                ?>
                                            </select>
                                            </div>

                                        <div class="form-group">
                                            <label> Date du reportement</label>
                                            <input type="date" name="Date_Report" id="Date_Report" value="" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Time du reportement</label>
                                            <input type="time" name="Heure_Report" id="Heure_Report" value="" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Demande</label>
                                            <textarea class="form-control" rows="5" id="contenu" name="contenu" placeholder="Commentaire"></textarea>
                                        </div>
                                        
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary" >
                                                  <i class="fa fa-check" aria-hidden="true"></i> Confirmer
                                                         </button>
</div>

                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
           
        </div>
		
			
		</div>
        
    </div>

    <script>
        function submitForm() {
            // Get the form element
            var form = document.getElementById("demandeForm");
            // Perform any additional validation or data manipulation if needed
            // Submit the form
            form.submit();
            // Redirect to the homepage
            window.location.href = "enseignant.php";
        }



    </script>
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


<!-- patients23:19-->