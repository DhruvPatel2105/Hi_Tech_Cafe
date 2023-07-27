<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi-Tech-Cafe Login</title>
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
        if($_GET['error']){
            echo $_GET['error'];
        }  
        ?> </span></label>
        </div>
                    <h2 class="mb-4 text-center">Your Mail...</h2>
                    <form action="check_user.php" method="POST">
                        <div class="mb-3">
                            <label for="mail" class="form-label">Mail</label>
                            <input type="mail" class="form-control" name="mail" id="mail" required>
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