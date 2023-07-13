<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">


<!-- employees23:21-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Emploi de temps</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
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
                <a href="enseignant.php" class="logo">
					<img src="assets/img/mundiap.png" width="40" height="40" > 
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
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
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
                        <li>
                            <a href="enseignant.php"><i class="fa fa-home"></i> <span>Accueil</span></a>
                        </li>

                        <li >
                            <a href="monemploie.php"><i class="fa fa-user"></i> <span>Mon emploie</span></a>
						</li>
                        
                        <li>
                            <a href="demande.php"><i class="fa fa-envelope-open-o"></i> <span>Demande</span></a>
                        </li>
                        
						<li class="active">
                            <a href="classe.php"><i class="fa fa-user"></i> <span>Classes</span></a>
						</li>

                        <li>
                            <a href="notification.php"><i class="fa fa-bell-o"></i> <span>Notification</span></a>

						</li>
                        
                    </ul>
                </div>
            </div>
        </div>
        


        <!---------------------------------------------------------------------------------------------------------------->



        <div class="page-wrapper">
            <div class="content">
                <h1>Emploi du classe</h1>
                <br></br>
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Filiere
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Ingénierie</a>
                                  <a class="dropdown-item" href="#">Santé</a>
                                  <a class="dropdown-item" href="#">business</a>
                                </div>
                            </div>
                                
                    </div>
                        <div class="col-sm-4 text-right">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Classe
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#"> Classe 1</a>
                                  <a class="dropdown-item" href="#"> Classe 2</a>
                                  <a class="dropdown-item" href="#"> Classe 3</a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <br></br>
                <table border="5" cellspacing="0" align="center">
                    <!--<caption>Timetable</caption>-->
                    <tr>
                        <td align="center" height="50"
                            width="90">
                            <b>Day/Period</b>
                        </td>
                        <td align="center" height="50"
                            width="150">
                            <b>8:45 - 10:30</b>
                        </td>
                        <td align="center" height="50"
                            width="150">
                            <b>10:45 - 12:00</b>
                        </td>
                        <td rowspan="7" align="center" height="50" width="80">
                            <h2>L<br>U<br>N<br>C<br>H</h2>
                        </td>
                        <td align="center" height="50"
                            width="150">
                            <b>13:30 - 15:00</b>
                        </td>
                        <td align="center" height="50"
                            width="150">
                            <b>15:15 - 16:45</b>
                        </td>
                        
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Monday</b></td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Tuesday</b>
                        </td>
                       
                        </td>
                        <td align="center" height="50"></td>
                        
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        
                    
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Wednesday</b>
                        </td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Thursday</b>
                        </td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Friday</b>
                        </td>
                        <td align="center" height="50">
                        </td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Saturday</b>
                        </td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                        <td align="center" height="50"></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-11 text-right" >   
                <a href="#" class="btn btn-primary"><i class="fa fa-print" ></i> Imprimer</a>
            </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- employees23:22-->
</php>