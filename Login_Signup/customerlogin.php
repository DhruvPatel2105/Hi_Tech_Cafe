<html>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include('../class/register.php');


$register = new Register();

if(isset($_POST["submit"])){
  $result = $register->login($_POST["usermail"], $_POST["password"]);
}
?>





<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="../Assets/css/login.css">

</head>
<body>

<div class="box-form">
    
	<div class="left" style="width: 70%;">
		<div class="overlay">
		<h1>Wellcome To Hi Tech Cafe</h1>		
		</div>
	</div>

	
	
		<div class="right" style="display: flex;justify-content: center;align-items: center;flex-direction: column;">
		<h5>Login</h5>


        <span style="margin-left: 5px;color: red;"> <?php 
        if(isset($result)){
            echo $result;
        }  
        ?> </span>

        <form action="" method="POST">
		<div class="inputs">
        <input type="text" class="form-control" name="usermail"  placeholder="Enter Usermail" id="usermail" value="<?php echo (isset($_GET['user_mail'])) ? $_GET['user_mail'] : '';?>" required>
			<br>
        <input type="password" class="form-control" name="password" placeholder="Password" required>


		</div>
			
			<br><br>

            <a href="forgot-password.php">Forgot Password ? </a>

			
			<br><br><br>
            
            <button type="submit" name="submit" class="btn btn-primary login_signup-btn">Login</button>
	</div>
	
</div>
<!-- partial -->
  
</body>
</html>
