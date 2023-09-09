<?php
session_start();

if (!isset($_SESSION['login_usermail'])) {
    header("location: Login_Signup/login.php");
}

require_once("class/order.php"); // Include the Order class
$order = new Order($conn);

?>


<html>

  <head>
    <title> Thank you | Hi-Tech Cafe </title>
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

$userID  = $_SESSION['login_id'];



foreach ($_SESSION["cart"] as $keys => $values) {
    // Extract necessary values from $values array
    $F_ID = $values["food_id"];
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price = $values["food_price"];
    $R_ID = $values["R_ID"];

    $success = $order->placeOrder($userID, $F_ID, $foodname, $price, $quantity, $R_ID);

    if (!$success) {
      ?>
      <div class="container">
        <div class="jumbotron">
          <h1>Something went wrong!</h1>
          <p>Try again later.</p>
        </div>
      </div>

      <?php
    }
}

?>

</h1>
        


<br><br><br><br><br><br>
        </body>
</html>




        <div class="container">
          <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Order Placed Successfully.</h1>
          </div>
        </div>
        <br>

<h2 class="text-center"> Thank you for Ordering at Hi-Tech Cafe! The ordering process is now complete.</h2>
<?php 
  $num1 = rand(100,999); 
   $number = $num1;
?>

<h3 class="text-center"> <strong>Your Order Number:</strong> <span style="color: blue;"><?php echo "$number"; ?></span> </h3>
        </body>

        <?php
        unset($_SESSION["cart"]);
        unset($_SESSION["hotel_name"]);
        ?>

</html>