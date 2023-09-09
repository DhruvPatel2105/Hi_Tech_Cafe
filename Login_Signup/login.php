<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include('../class/register.php');


$register = new Register();

if(isset($_POST["submit"])){


    $userMail = $_POST['mail'];
    
    if($register->isUserExist($_POST['mail'])){
        header("location:customerlogin.php?user_mail=$userMail"); // Redirecting customerlogin page with the userMail id   
    }else{
        header("location:customersignup.php?user_mail=$userMail"); //Redirecting To CustomerSignup page with the userMail id
    }

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
		<h5>Your Mail</h5>
        <form action="" method="POST">
		<div class="inputs">
        <input type="mail" class="form-control" name="mail" id="mail"  placeholder="Please Enter your mail"  required>
			<br>
		</div>
			
			<br><br>
			
			
			<br>
            
            <button type="submit" name="submit" class="btn btn-primary login_signup-btn">Login</button>
	</div>
	
</div>
<!-- partial -->
  
</body>
</html>
