<?php


include('class/food.php');



session_start();

if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "food_id");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'R_ID' => $_POST["RID"],
'food_customize' => $_POST["customize"],
'food_quantity' => $_POST["quantity"]

);
$_SESSION["cart"][$count] = $item_array;
//echo '<script>window.location="cart.php"</script>';
}
else
{
echo '<script>alert("Products already added to cart")</script>';
//echo '<script>window.location="cart.php"</script>';
}
}
else
{
$item_array = array(
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'R_ID' => $_POST["RID"],
'food_customize' => $_POST["customize"],
'food_quantity' => $_POST["quantity"]

);
$_SESSION["cart"][0] = $item_array;
}
}

?>



<html>

<head>
  <title> FoodList | Food Hi-Tech Cafe </title>
</head>

<link rel="stylesheet" type = "text/css" href ="Assets/css/foodlist.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<script>
$(function(){
    $("#includedNavbarContent").load("navbar.php"); 
  });
</script>

<body style="background-color:black;">


<nav id="includedNavbarContent"></nav>




   
    
  
  

<div class="jumbotron" style="background-color: darkgray;">
<div class="container text-center">
   <h1 style="color: blue">Welcome To 
  <?php
  if(isset($_POST['restaurant'])){
    $hotelname= $_POST['hotel_name'];
    $_SESSION["hotel_name"]=$hotelname;
    $restaurant_id = $_POST['restaurant_id'];
    $_SESSION["restaurant_id"]=$restaurant_id;

    echo $hotelname;
    
  }else {
    echo "Restaurant";
  }
  ?> </h1>   
</div>
</div>

<div class="container" style="width:95%">
<form action="foodlist.php" method="post">
    <table class="table ">
      <tr>
          <td>
          <input type="text" name="search" class="form-control" placeholder="Enter food name">
        </td>
        <td>
           <input type="submit" name="searchbutton" class="btn btn-info" value="Search food">
        </td>
      </tr>
    </table>
  </form>


<?php

$foodObj = new Food();

$restaurantId = isset($_POST['RID']) ? $_POST['RID'] : $_SESSION["restaurant_id"];
$searchButton = isset($_POST['searchbutton']) ? $_POST['search'] : '';

$foods = $foodObj->getFoodList($restaurantId, $searchButton);
?>

<html>
<!-- Rest of your HTML and frontend code -->

<?php
if (!empty($foods)) {
    $count = 0;

    foreach ($foods as $row) {
        if ($count == 0) {
            echo "<div class='row'>";
        }

        ?>
        <div class="col-xs-12 col-lg-3 col-sm-12 col-md-4">

<form method="post" action="foodlist.php?action=add&id=<?php echo $row["F_ID"]; ?>"  >


<div class="mypanel"  align="center">
  <table >
    <tr>
    <td>
        <img class="image" src="<?php echo $row["images_path"]; ?>" class="img-responsive">
<h2 class="text-dark"><?php echo $row["name"]; ?></h2>
<h5 class="text-info"><?php echo $row["description"]; ?></h5>
<h5 class="text-danger">&#8377; <?php echo $row["price"]; ?>/-</h5>

<?php $arr=explode(",",$row["customize"]);

?>
<h5 class="text-info">Customize:<select name="customize">

<option selected="selected">   </option>

  <?php
    foreach($arr as $name) { ?>
      <option value="<?php echo $name ?>"><?php echo $name ?></option>
  <?php
    } ?>
</select>

<h5 class="text-info" class="inline">Quantity: <input type="number" min="1" max="25" name="quantity" value="1" style="width: 60px;"> </h5>
<h5 class="text-info">Available food = <?php echo $row["quantity"]; ?></h5>

<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
<input type="hidden" name="customize" value="<?php echo $row["customize"]; ?>">
<input type="hidden" name="RID" value="<?php echo $row["R_ID"]; ?>">
<input type="submit" name="add" style="margin-top:5px;"  class="btn btn-success" value="Add to Cart">

</td>
</tr>

</table>
</div>
</form>
      
     
</div>

<?php
        $count++;

        if ($count == 4) {
            echo "</div>";
            $count = 0;
        }
    }
} else {
  ?>
  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;font-size:100px;">&#128580 <h1>Oops! No serch food is available.</h1> </label>
      </center>
       
    </div>
  </div> <?php  
}
?>

</div>
</div>

</body>
</html>
</html>