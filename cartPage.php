<?php
session_start();


include('class/cart.php');


if(!isset($_SESSION['login_usermail'])){
header("location:Login_Signup/login.php"); 
}
?>

<html>

  <head>
    <title> Cart | Hi-Tech Cafe </title>
  </head>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  

  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<script>
$(function(){
    $("#includedNavbarContent").load("navbar.php"); 
  });
</script>

<body style="background-color:black;">


<nav id="includedNavbarContent"></nav>






    
<?php
if(!empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
        <p>Looks tasty...!!!</p>
      </div>
    </div>
    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="30%">Food Name</th>
<th width="10%">Customize</th>
<th width="10%">Quantity</th>
<th width="20%">Price Details</th>
<th width="15%">Order Total</th>
<th width="5%">Action</th>
</tr>
</thead>


<?php  

$total = 0;
foreach($_SESSION["cart"] as $keys => $values)
{
?>
<tr style="color:white;">
<td><?php echo $values["food_name"] ?></td>
<td><?php echo $values["food_customize"] ?></td>
<td><?php echo $values["food_quantity"] ?></td>
<td>&#8377; <?php echo $values["food_price"]; ?></td>
<td>&#8377; <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
<td><a href="cartPage.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Remove</span></a></td>
</tr>
<?php 
$total = $total + ($values["food_quantity"] * $values["food_price"]);
}
?>
<tr style="color:white;">
  
<td colspan="3" align="right">Total</td>

<td align="right">&#8377; <?php echo number_format($total, 2); ?></td>
<td></td>
</tr>
</table>
<?php
  echo '<a href="cartPage.php?action=empty"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>&nbsp;<a href="foodlist.php"><button class="btn btn-warning">Continue Shopping</button></a>&nbsp;<a href="payment.php"><button class="btn btn-success pull-right">Check Out</button></a>';
?>
</div>
<br><br><br><br><br><br><br>
<?php
}
if(empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Your Food Cart</h1>
        <p>Oops! No Food order is available in cart. Go back and <a href="foodlist.php">order now.</a></p>
        
      </div>
      
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
}
?>  


<?php


$cartObj = new Cart();

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
      $foodId = $_GET["id"];
      if($cartObj->removeFromCart($foodId)){
        echo '<script>alert("FoodItem has been removed")</script>';
      }else{
        echo 'Sorry please try again ...:(';
      }
  }
}


if (isset($_GET["action"])) {
  if ($_GET["action"] == "empty") {
      $cartObj->emptyCart();
      echo '<script>alert("Cart is made empty!")</script>';
  }
}



?>
<?php

?>

    </body>
</html>