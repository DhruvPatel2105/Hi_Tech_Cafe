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
  <title>Login Page in HTML with CSS Code Example</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="../Assets/css/reg.css">

</head>
<body>

<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>Wellcome To Hi Tech Cafe</h1>
		
		</div>
	</div>
	
	
		<div class="right">
		<h5>Register</h5>
		<p>Do you have account? <a href="customerlogin.php">Login</a></p>
		<form action="" method="POST">
		<div class="inputs">
		<input type="text" class="form-control" name="fullName" id="fullName" placeholder="User Name" required autofocus="">
			<br>
			<input type="email" class="form-control" name="email" id="email" placeholder="User Mail" value="<?php echo (isset($_GET['user_mail'])) ? $_GET['user_mail'] : '';?>" required>
			<br>
			<input type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="contact Number" >
			<br>
			<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
			<br>
			<input type="password" class="form-control"  name="confirmPassword" id="confirmPassword" placeholder="Re-Password" required>
		</div>
			
			<br><br>
			
		<div class="remember-me--forget-password">
			
	
			
		</div>
			<br>
			<button>Submit</button>
	</div>
	
</div>
<!-- partial -->
  
</body>
</html>
