<?php
session_start();

if(!isset($_SESSION['login_usermail'])){
  header("location:Login_Signup/login.php"); 
  require('fpdf185/fpdf.php');
  }

?>

<html>

  <head>
    <title> Payment | Hi-Tech Cafe </title>
  </head>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  

  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<script>
$(function(){
    $("#includedNavbarContent").load("navbar.php"); 
  });
</script>

<body>


<nav id="includedNavbarContent"></nav>

 <?php



$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {

   
    $total = ($values["food_quantity"] * $values["food_price"]);
   
    $gtotal = $gtotal + $total; 
      
  }

        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Choose your payment option</h1>
          </div>
        </div>
        <br>
<h1 class="text-center">Grand Total: &#8377;<?php echo "$gtotal"; ?>/-</h1>
<h5 class="text-center">including all service charges. (no delivery charges applied)</h5>
<br>
<h1 class="text-center">
  <a href="cart.php"><button class="btn btn-warning">Go back to cart</button></a>
  <a href="COD.php"><button class="btn btn-success"><span class="glyphicon glyphicon-"></span>Place Order</button></a>
  <a href="downloadpdf.php" target="_blank"><button class="btn btn-success"> Download PDF </button></a>


</h1>
        


<br><br><br><br><br><br>
        </body>
</html>