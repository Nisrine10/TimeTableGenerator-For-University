<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- activities22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>mundiapolis</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
				<a href="etudiant.php" class="logo">
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
                            <span><?php echo $_SESSION['etudiant']; ?></span>
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
                            <a href="etudiant.php"><i class="fa fa-home"></i> <span>Accueil</span></a>
                        </li>

                        <li >
                            <a href="monemploie.php"><i class="fa fa-user"></i> <span>Mon emploi</span></a>
						</li>

                        <li class="active">
							<a href="notification.php"><i class="fa fa-bell-o"></i> <span>Notifications</span></a>
						</li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Notifications</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="activity">
                            <div class="activity-box">
                                <ul class="activity-list">
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" title="Lesley Grauer" data-toggle="tooltip" class="avatar">
                                                <img alt="Lesley Grauer" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Lesley Grauer</a> added new task <a href="#">Hospital Administration</a>
                                                <span class="time">4 mins ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" class="avatar" title="Jeffery Lalor" data-toggle="tooltip">L</a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Jeffery Lalor</a> added <a href="profile.php" class="name">Loren Gatlin</a> and <a href="profile.php" class="name">Tarah Shropshire</a> to project <a href="#">Patient appointment booking</a>
                                                <span class="time">6 mins ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" title="Catherine Manseau" data-toggle="tooltip" class="avatar">
                                                <img alt="Catherine Manseau" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Catherine Manseau</a> completed task <a href="#">Appointment booking with payment gateway</a>
                                                <span class="time">12 mins ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="#" title="Bernardo Galaviz" data-toggle="tooltip" class="avatar">
                                                <img alt="Bernardo Galaviz" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Bernardo Galaviz</a> changed the task name <a href="#">Doctor available module</a>
                                                <span class="time">1 day ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" title="Mike Litorus" data-toggle="tooltip" class="avatar">
                                                <img alt="Mike Litorus" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Mike Litorus</a> added new task <a href="#">Patient and Doctor video conferencing</a>
                                                <span class="time">2 days ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" title="Jeffery Lalor" data-toggle="tooltip" class="avatar">
                                                <img alt="Jeffery Lalor" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Jeffery Lalor</a> added <a href="profile.php" class="name">Jeffrey Warden</a> and <a href="profile.php" class="name">Bernardo Galaviz</a> to the task of <a href="#">Private chat module</a>
                                                <span class="time">7 days ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                </ul>
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


<!-- activities22:59-->
</php>