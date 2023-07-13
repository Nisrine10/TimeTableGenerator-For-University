<?php
session_start();
// Include the database configuration file
require_once 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted username/email and password
    $usernameOrEmail = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Fetch the admin credentials from the database
    $query = "SELECT * FROM admin WHERE identifiant = ? OR email_admin = ? LIMIT 1";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $usernameOrEmail, $usernameOrEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    // Validate the credentials
    if ($admin && ($password == $admin['mdp_admin'])) {
        // Authentication successful
        // Redirect the admin to the desired page or perform any other action
        $_SESSION['admin'] = $admin['identifiant'];
       
        
        header('Location: index-2.php');
        exit;
    } else {
        // Authentication failed
        $error = 'Invalid username/email or password';
    }
}

// Retrieve the email of the admin from the session and store it in the $emailAdmin variable
//$emailAdmin = isset($_SESSION['email_admin']) ? $_SESSION['email_admin'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/mundiap.png">
    <link rel="stylesheet" href="assets/style2.css">
</head>
<body class="img js-fullheight" style="background-image: url(assets/img/mundia.png);">
<div class="header-left">
    
        <img src="assets/img/logo.png" width="150" height="40">
  
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center" style="color:white">Welcome</h3>
                    <form action="#" class="signin-form" method="POST">
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
                        <?php } ?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username_or_email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min2.js"></script>
  <script src="assets/js/main.js"></script>

	</body>
</html>

