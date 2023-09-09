<?php
session_start();


if(!isset($_SESSION["login_ManagerFullname"])){
  header('Location: Login_Signup/managerLogin.php'); // Redirecting To Home Page
}
  


include('class/food.php');

$foodObj = new Food();

  
  if(isset($_GET["submit"])){
 


  if($foodObj ->updateFoodItems($_GET['dfid'], $_GET['dname'],$_GET['dprice'],$_GET['ddescription'],$_GET['customize'],$_GET['imgpath'],$_GET['quantity'])){
      header("Location: view_food_items.php");
  }else{
      echo "<h1>....Failed to update product. ....:(...</h1>";
  }
}



?>
<!DOCTYPE html>
<html>

  <head>
    <title> Manager Login | Hi-Tech Cafe </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="Assets/css/bootstrap.min.css">

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function display_alert()
    {
      alert("Data Updated Successfully...!!!");
    }
  </script>

  <body>


    

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Hi-Tech Cafe</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?> </a></li>
            <li class="active"> <a href="managerlogin.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="Login_Signup/logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>

      </div>
    </nav>




<div class="container">
    <div class="jumbotron">
     <h1>Hello Manager! </h1>
     <p>Manage all your restaurant from here</p>

    </div>
    </div>

<div class="container">
   
    
    	<div class="col-xs-3" style="text-align: center;">

    	<div class="list-group">
      <a href="view_food_items.php" class="list-group-item">View Food Items</a>
    		<a href="add_food_items.php" class="list-group-item ">Add Food Items</a>
    		<a href="edit_food_items.php" class="list-group-item active">Edit Food Items</a>
    		<a href="delete_food_items.php" class="list-group-item ">Delete Food Items</a>
        <a href="view_order_details.php" class="list-group-item">View Order Details</a>
        

    	</div>
    </div>
    


    
    

<div class="col-xs-3">

  <div class="form-area" >
  
    <div style="text-align: center;">
      <h3>Click On Menu <br><br></h3>
    </div>
    <?php
  

    $foods = $foodObj->getFoodItemsUsingMID($_SESSION['manager_id']);


      foreach ($foods as $row) {

      ?>

      <div class="list-group" style="text-align: center;">
        <?php
      echo "<b><a href='edit_food_items.php?update= {$row['F_ID']}'>{$row['name']}</a></b>";  
        ?>
      </div>


    <?php
    }
    ?>
    

    <?php
    if (isset($_GET['update'])) {

    $foods1 = $foodObj->getFoodItemsUsingFID($_GET['update']);
    foreach ($foods1 as $row1) {

    ?>
</div>
</div>



<div class="container">
<div class="col-md-6">
 <div class="form-area" style="padding: 0px 100px 100px 100px; ">
        <form action="edit_food_items.php" method="GET">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> EDIT YOUR FOOD ITEMS HERE </h3>

          <div class="form-group">
            <input class='input' type='hidden' name="dfid" value=<?php echo $row1['F_ID'];  ?> />
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Name: </label>
            <input type="text" class="form-control" id="dname" name="dname" value=<?php echo $row1['name'];  ?> required="">
          </div>     

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Price: </label>
            <input type="text" class="form-control" id="dprice" name="dprice" value=<?php echo $row1['price'];  ?>  required="">
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Description: </label>
            <input type="text" class="form-control" id="ddescription" name="ddescription" value=<?php echo $row1['description'];  ?>  required="">
          </div>

           <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Customize: </label>
            <input type="text" class="form-control" id="customize" name="customize" value="<?php echo $row1['customize'];  ?>" >
          </div>

          <div class="form-group">
            <label for="imgpath"><span class="text-danger" style="margin-right: 5px;">*</span> Food Images: </label>
            <input type="text" class="form-control" id="imgpath" name="imgpath" value=<?php echo $row1['images_path'];  ?>  >
          </div>

           <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Quantity: </label>
            <input type="text" class="form-control" id="quantity" name="quantity" value=<?php echo $row1['quantity'];  ?>  >
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right" onclick="display_alert()" value="Display alert box" > Update </button>    
      </div>
        </form>


    <?php
}
}


  ?>
      
  </div>




</div>


<?php
mysqli_close($conn);
?>
</div>
</div>

  </body>
<br>
</html>