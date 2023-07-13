<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- employees23:21-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/mundiap.png">
        <title>mundiapolis</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/test.css">
   <script src="myscript.js"></script>
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
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i>
                        <span class="badge badge-pill bg-danger float-right">3</span></a>
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
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40"
                                alt="Admin">
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
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v"></i></a>
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

                      <li>
                          <a href="demande.php"><i class="fa fa-envelope-open-o"></i> <span>Liste de demande</span></a>
                      </li>
                    
                        <li class="active" >
                          <a href="emploi.php"><i class="fa fa-calendar-o"></i> <span>Emploi du temps</span></a>
          
                        </li>
                      <li >
                      <a href="disponibilite.php"><i class="fa fa-list"></i><span>Disponibilité enseignant</span></a>
            
                        <li>
                      <li>
                        <a href="notification.php" ><i class="fa fa-bell-o"></i> <span>Notifications</span></a>

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
                <h2>Emploi du temps</h2>
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label"> Filière</label>
                            <select class="select floating">
                                <option>-</option>
                                <option></option>
                                <option>F1</option>
                                <option>F2</option>
                                <option>F3</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group form-focus select-focus">
                          <label class="focus-label">Classe</label>
                          <select class="select floating">
                              <option>-</option>
                              <option>C1</option>
                              <option>C2</option>
                              <option>C3</option>
                              <option>C4</option>
                              <option>C5</option>
                          </select>
                      </div>
                  </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label"> Groupe</label>
                            <select class="select floating">
                                <option>-</option>
                                <option>A</option>
                                <option>B</option>
                               
                                
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-sm-6 col-md-3">
                        <a href="#" class="btn btn-success btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search </a>
                    </div>
                   
                </div>
                <a href="#" class="btn btn-primary float-right " ><i class="fa fa-print" aria-hidden="true"></i> Imprimer</a>
                <br></br>


                <div class="timetable-container">

                    <div class="timetable" id="timetable-1">
                        
                        <div class="week-names">
                          <div>monday</div>
                          <div>tuesday</div>
                          <div>wednesday</div>
                          <div>thursday</div>
                          <div>friday</div>
                          <div class="weekend">saturday</div>
                          <div class="weekend">sunday</div>
                        </div>
                        <div class="time-interval">
                          <div>8:00 - 10:00</div>
                          <div>10:00 - 12:00</div>
                          <div>12:00 - 14:00</div>
                          <div>14:00 - 16:00</div>
                          <div>16:00 - 18:00</div>
                          <div>18:00 - 20:00</div>
                        </div>
                        <div class="content">
                          <div>
                            <div class="accent-orange-gradient"></div>
                          </div>
                          <div></div>
                          <div></div>
                          <div></div>
                              <div>
                            <div class="accent-green-gradient"></div>
                          </div>
                          <div class="weekend"></div>
                          <div class="weekend"></div>

                          <div class="accent-green-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>

                          <div class="accent-green-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>
                          <div class="accent-green-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>
                          <div class="accent-green-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>

                            
                          <div class="accent-purple-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="accent-green-gradient clickable-area" onclick="showModal('monday-8am')"></div>
                            <div id="monday-8am-info"></div>
                          </div>
                          <div class="clickable-area" onclick="showModal('monday-8am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>
                          <div class="accent-green-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>

                            
                          <div class="accent-purple-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>

                          <div class=" accent-orange-gradient clickable-area" onclick="showModal('monday-am')">
                            
                                
                             
                            <div class="clickable-area" onclick="showModal('monday-am')"></div>
                            <div id="monday-am-info"></div>
                          </div>

                          <div class="accent-green-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>

                            
                          <div class="accent-purple-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>

                          <div class=" accent-orange-gradient clickable-area" onclick="showModal('monday-am')">
                            
                                
                             
                            <div class="clickable-area" onclick="showModal('monday-am')"> </div>
                            <div id="monday-am-info"></div>
                          </div>
                        
                          <div class=" accent-orange-gradient clickable-area" onclick="showModal('monday-am')">
                            
                                
                             
                            <div class="clickable-area" onclick="showModal('monday-am')"></div>
                            <div id="monday-am-info"></div>
                          </div>

                            
                          <div class="accent-purple-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>

                          <div class="accent-green-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                            <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                            <div id="monday-9am-info"></div>
                          </div>
                          
                          
                
                          
                          <div class="accent-purple-gradient clickable-area" onclick="showModal('monday-9am')">
                          
                              
                           
                                  <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                                  <div id="monday-9am-info"></div>
                                </div>
                                
                                <div id="modal">
                                  <h2>Entrer une seance</h2>
                                  <form>
                                    <label for="name">Module:</label>
                                    <input type="text" id="name" name="name"><br>
                                    <label for="prof">Proffesseur:</label>
                                    <input type="email" id="prof" name="name"><br>

                                    <label for="text">Salle:</label>
                                    <input type="text" id="salle" name="salle"><br>
                                    <button type="submit" onclick="submitInfo('monday-9am')">Submit</button>
                                  </form>
                                </div>
                                
                      
                                
                                
                          
                       
                         
                          <div class="weekend"></div>
                          <div class="weekend"></div>
                          <div>
                         
                          </div>
                          <div></div>
                          <div>
                            <div class="accent-purple-gradient"></div>
                          </div>
                          <div></div>
                          <div></div>
                          <div class="weekend"></div>
                          <div class="weekend"></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div class="weekend"></div>
                          <div class="weekend"></div>
                          <div>
                            <div class="accent-purple-gradient"></div>
                          </div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div class="weekend"></div>
                          <div class="weekend"></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div class="weekend"></div>
                          <div class="weekend"></div>
                        </div>
                    </div>
                      <!-- timetable 2 -->
                      
                      <div class="timetable" id="timetable-2">
                        <div>2</div>
                          <div class="week-names">
                            <div>monday</div>
                            <div>tuesday</div>
                            <div>wednesday</div>
                            <div>thursday</div>
                            <div>friday</div>
                            <div class="weekend">saturday</div>
                            <div class="weekend">sunday</div>
                          </div>
                          <div class="time-interval">
                            <div>8:00 - 10:00</div>
                            <div>10:00 - 12:00</div>
                            <div>12:00 - 14:00</div>
                            <div>14:00 - 16:00</div>
                            <div>16:00 - 18:00</div>
                            <div>18:00 - 20:00</div>
                          </div>
                          <div class="content">
                            <div>

                                

                             
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                                <div>
                              <div class="accent-green-gradient"></div>
                            </div>
                            <div class="weekend"></div>
                            <div class="weekend"></div>
                             <div style="margin-bottom:30px;margin-left:5px;margin-right:5px">
                            
                                <label for="elemetns"></label>
                        
                                <select class=" accent-orange-gradient" name="elements" id="cars">
                                <option value="maths">maths</option>
                                <option value="physique">physique</option>
                                <option value="info">info</option>
                                <option value="C">C</option>
                                </select>
                            
                            </div> 
                          
                            <div style="margin-bottom:30px;margin-left:5px;margin-right:5px">
                            
                                <label for="elemetns"></label>
                        
                                <select class=" accent-orange-gradient" name="elements" id="cars">
                                <option value="maths">maths2</option>
                                <option value="physique">physique2</option>
                                <option value="info">info2</option>
                                <option value="C">C</option>
                                </select>
                            
                            </div>  
                            
                            <div style="margin-bottom:30px;margin-left:5px;margin-right:5px">
                            
                                <div class="accent-green-gradient timetable clickable-area" onclick="showModal('monday-am')">
                            
                                
                             
                                    <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                                    <div id="monday-am-info"></div>
                                  </div>

                                  <div id="modal">
                                    <h2>Enter your information</h2>
                                    <form>
                                      <label for="name">Name:</label>
                                      <input type="text" id="name" name="name"><br>
                                      <label for="email">Email:</label>
                                      <input type="email" id="email" name="email"><br>
                                      <button type="submit" onclick="submitInfo('monday-9am')">Submit</button>
                                    </form>
                                  </div>
                            
                            </div>  
                            
                            <div class="accent-green-gradient timetable clickable-area" onclick="showModal('monday-9am')">
                            
                                
                             
                                    <div class="clickable-area" onclick="showModal('monday-9am')"></div>
                                    <div id="monday-9am-info"></div>
                                  </div>
                                  
                                  <div id="modal">
                                    <h2>Enter your information</h2>
                                    <form>
                                      <label for="name">Name:</label>
                                      <input type="text" id="name" name="name"><br>
                                      <label for="email">Email:</label>
                                      <input type="email" id="email" name="email"><br>
                                      <button type="submit" onclick="submitInfo('monday-9am')">Submit</button>
                                    </form>
                                  </div>
                                  
                        
                            
                                  
                            
                         
                           
                            <div class="weekend"></div>
                            <div class="weekend"></div>
                            <div>
                           
                            </div>
                            <div></div>
                            <div>
                              <div class="accent-purple-gradient"></div>
                            </div>
                            <div></div>
                            <div></div>
                            <div class="weekend"></div>
                            <div class="weekend"></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div class="weekend"></div>
                            <div class="weekend"></div>
                            <div>
                              <div class="accent-purple-gradient"></div>
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div class="weekend"></div>
                            <div class="weekend"></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div class="weekend"></div>
                            <div class="weekend"></div>
                          </div>
                      </div>


                     
                     <div style="margin-top: 50;">
                      <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                      </nav>
                     </div>

                </div>
               
            </div>
            
            
<div style="height:90px">
     <div style="margin:30px" class="col-sm-6 col-md-3">
                        <a href="#" class="btn btn-success btn-block"> Change </a>
                    </div>
</div>

        </div>

        
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


<!-- emploi23:22-->

</html>