<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Assets/css/customNavbar.css" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


    <title>Responsive Navbar</title>
  </head>
  <body>

    <header>
      <div class="navbar">

        <div class="logo"><a href="#" ><img src="Assets/images/logo.png" alt="Hi-Tech Cafe"></a></div>
        <ul class="links">
 
          <li><a href="index.php">Home</a></li>

          <?php if(isset($_SESSION["hotel_name"])){ ?>

<li ><a href="restaurantlist.php"><?php echo $_SESSION["hotel_name"]; ?> </a></li>

<?php }else{ ?>
        
  <li ><a href="restaurantlist.php"> Restaurant List </a></li>

<?php } ?>

<?php
 if(isset($_SESSION["cart"])){
?>
 <li><a href="cartPage.php"><span><i class="fa-solid fa-cart-shopping"></i></span> Cart  
            
      <?php
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
             ?>
             </a></li>
<?php 
 }
?>
          <li><a href="about.php">About us</a></li>
          <!-- <li><a href="service">Service</a></li> -->
          <li><a href="contact.php">Contact us</a></li>

          <?php
if (isset($_SESSION['login_usermail'])) {
  ?>
            <li><a href="#"> Welcome <?php echo $_SESSION['login_userFullname']; ?> </a></li>
            <li><a href="Login_Signup/logout_u.php"><span ></span> Log Out </a></li>

<?php
}else{
  ?>    
  <li><a href="Login_Signup/login.php">Login Here</a></li>
<?php
}
?>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
               <li><a href="Login_Signup/managerLogin.php">Manager Sign-In</a></li>
               <li><a href="Login_Signup/ManagerSingup.php">Manager Sign-Up</a></li>
            </ul>
          </li>


        </ul>
        <a href="restaurantlist.php" class="action_btn">Order Now :) </a>
        
        <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>

      </div>

<div class="dropdown_menu">
  <li><a href="home">Home</a></li>

  <?php if(isset($_SESSION["hotel_name"])){ ?>

<li ><a href="restaurantlist.php"><?php echo $_SESSION["hotel_name"]; ?> </a></li>

<?php }else{ ?>
  
  <li ><a href="restaurantlist.php"> Restaurant List </a></li>

<?php } ?>

<?php
 if(isset($_SESSION["cart"])){
?>
 <li><a href="cartPage.php"><span><i class="fa-solid fa-cart-shopping"></i></span> Cart  
            
      <?php
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
             ?>
             </a></li>
<?php 
 }
?>


  <li><a href="about.php">About</a></li>
  <li><a href="contact.php">Contact</a></li>

  <?php
if (isset($_SESSION['login_usermail'])) {
  ?>
            <li><a href="#"> Welcome <?php echo $_SESSION['login_userFullname']; ?> </a></li>
            <li><a href="Login_Signup/logout_u.php">Logout<span><i class="fa fa-sign-out"></i></span></a></li>

<?php
}else{
  ?>    
  <li><a href="Login_Signup/login.php">Login Here</a></li>
<?php
}
?>

<?php 
if(isset($_SESSION['login_managerMail'])){
?>
  <li><a href="#"> Admin Login <?php echo $_SESSION['login_managerFullname']; ?> </a></li>
  <li><a href="Admin/Admin_Login_Signup/logout_m.php">Admin Logout<span><i class="fa fa-sign-out"></i></span></a></li>

<?php
}else{
?>
  <li class="dropdown">
    <a href="Admin/Admin_Login_Signup/managerlogin.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
       <li><a href="Admin/Admin_Login_Signup/managerlogin.php">Manager Sign-In</a></li>
       <li><a href="Admin/Admin_Login_Signup/managersignup.php">Manager Sign-Up</a></li>
    </ul>
  </li>

  <?php
}
  ?>


  <li> <a href="" class="action_btn">Order Now :)</a></li>
</div>

    </header>

    <script>

      const toggleBtn = document.querySelector('.toggle_btn');
      const toggleBtnIcon = document.querySelector('.toggle_btn i');
      const dropdownMenu = document.querySelector('.dropdown_menu');

      toggleBtn.onclick = function() {
        dropdownMenu.classList.toggle('open');
        const isOpen = dropdownMenu.classList.contains('open');

        toggleBtnIcon.classList = isOpen ? 'fa fa-xmark':'fa fa-solid fa-bars';
      }

// JS code to refresh the page if window wodth is changed 

var win_width = self.innerWidth;

// set indice "m" for mobile (max. 576px), "t" for tablet (max. 992px), "d" for desktop, according to window size
var dev_i = (win_width <576) ? 'm' : ((win_width <992) ? 't' :'d');

// when Resize browser, check window-width; refresh if current device indice not initial device indice
window.addEventListener('resize', function(e){

 var win_width2 = self.innerWidth;

 var dev_i2 = (win_width2 <576) ? 'm' : ((win_width2 <992) ? 't' :'d');
 if(dev_i2 != dev_i) window.location.replace(window.location.href);
}, false);

    </script>
  </body>
</html>


<!-- took reference from this link 
https://www.youtube.com/watch?v=GdrbE-s5DgQ
Heading = How To Create a Responsive Navbar Using HTML & CSS | Step By Step Tutorial
channeal name = Web Dev Creative -->

<!-- Refresh page if window width changes from a device size to other
Took Reference from (https://coursesweb.net/javascript/refresh-page-window-width-changes-size_cs) -->
