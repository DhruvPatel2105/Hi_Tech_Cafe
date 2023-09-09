<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include('../class/manager.php');


$manager = new Manager();

if(isset($_POST["submit"])){
  $result = $manager->managerSignup($_POST["fullName"], $_POST["email"], $_POST["password"], $_POST["confirmPassword"],$_POST["contactNumber"],$_POST['address'],$_POST['SecretKey']);
}

?>



<html>

<head>
  <title> Home | E-Commerce Website </title>
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Restaurant Signup</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Custom styles for the signup page -->    
    <link rel="stylesheet" href="Assets/css/login_signup.css" type="text/css">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="login_signup-container">
                <div>
        <label style="margin-left: 5px;color: red;"><span> <?php 
        if(isset($result)){
            echo $result;
        }  
        ?> </span></label>
        </div>
                    <h2 class="mb-4 text-center">Manager Signup</h2>
                    <form role="form" action="" method="POST">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name*</label>
                            <input type="text" class="form-control" name="fullName" id="fullName" required autofocus="">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo (isset($_GET['user_mail'])) ? $_GET['user_mail'] : '';?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password*</label>
                            <input type="password" class="form-control"  name="confirmPassword" id="confirmPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactNumber" class="form-label">Contact Number*</label>
                            <input type="text" class="form-control" name="contactNumber" id="contactNumber" required>
                        </div>

                        <div class="mb-3">
                            <label for="SecretKey" class="form-label">SecretKey*</label>
                            <input type="text" class="form-control" name="SecretKey" id="SecretKey" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address*</label>
                            <input type="text" class="form-control" name="address" id="address" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" class="btn btn-primary login_signup-btn">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS and Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>