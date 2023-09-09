<?php

include('class/restaurant.php');

?>



<?php

$restaurantObj = new Restaurant();

$searchButton = isset($_POST['searchbutton']) ? $_POST['search'] : '';

$restaurants = $restaurantObj->getRestaurantList($searchButton);
?>

<html>

  <head>
    <title> Restaurant List | Food Hi-Tech Cafe </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="Assets/css/foodlist.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

  <script>
 $(function(){
      $("#includedNavbarContent").load("navbar.php"); 
    });
</script>

<body style="background-color:black;">


<nav id="includedNavbarContent"></nav>

<div class="container" style="width:95%;">

<?php
if (!empty($restaurants)) {
    $count = 0;

    foreach ($restaurants as $row) {
        if ($count == 0) {
            echo "<div class='row'>";
        }
?>        

        <div class="col-xs-12 col-lg-3 col-sm-12 col-md-4">

        <div class="mypanel" align="center">
        
          <table id="myTable">
            <tr>
            <td>
                <img  class="image" style="width: 200px; height: 150px;" src="<?php echo $row["images_path"]; ?>" >
        <h3 class="text-dark" id="button" style="color: white"><?php echo $row["name"]; ?></h3>
        <h5 class="text-info"><i class="fa fa-map-marker"></i><?php echo $row["address"]; ?></h5>
        <h5 class="text-info"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $row["email"]; ?>/-</h5>
        
        <!-- this form action is called after selecting a particular restaurant -->
        <form action="foodlist.php" method="post">
        
        <input type="hidden" name="hotel_name" value="<?php echo $row["name"]; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
        <input type="hidden" name="RID" value="<?php echo $row["R_ID"]; ?>">
        <input type="submit" name="restaurant" style="margin-top:5px;" class="btn btn-success" id="button" value="Select">
        
        
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
      <div class="center">
        <input type="text"  name="">
         <label style="margin-left: 5px;color: red;font-size:100px;">&#128580 <h1>Oops! No hotel is found.</h1> </label>     
</div>
       
    </div>
  </div>

  <?php
}
?>

</div>
</body>
</html>
</html>