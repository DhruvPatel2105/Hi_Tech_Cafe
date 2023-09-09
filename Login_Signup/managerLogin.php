<html>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include('../class/manager.php');

// if(!empty($_SESSION["id"])){
//   header("Location: index.php");
// }

$manager = new Manager();

if(isset($_POST["submit"])){
  $result = $manager->managerLogin($_POST["managermail"], $_POST["password"]);
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Restaurant Login</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Custom styles for the login page -->
    <link rel="stylesheet" href="Assets/css/login_signup.css" type="text/css">
    </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login_signup-container">
                <div>
        <label style="margin-left: 5px;color: red;"><span> <?php 
        if(isset($result)){
            echo $result;
        }  
        ?> </span></label>
        </div>
                    <h2 class="mb-4 text-center">Manager Login</h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="managermail" class="form-label">managermail</label>
                            <input type="text" class="form-control" name="managermail" id="managermail" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" class="btn btn-primary login_signup-btn">Login</button>
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