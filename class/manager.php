<?php

// To check for the error message
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


include "connection.php";
session_start();

class Manager extends Connection {

  public $id;

  public function managerSignup($fullName, $email, $password, $confirmPassword, $contactNumber,$address,$SecretKey){

    if(!isset($fullName) && !isset($email) && !isset($password) && !isset($confirmPassword) && !isset($contactNumber) && !isset($address) && !isset($SecretKey)){
      $error = "Please Enter the required fields";
      return $error;
    }

    $conn = $this->conn; // Correct way to access the connection property

    $duplicate = mysqli_query($conn, "SELECT * FROM `manager` WHERE email = '$email'");

    if(mysqli_num_rows($duplicate) > 0){

      $error = "Manageremail has already been taken....";
      // Username or email has already taken

      return $error;
    }
    else{

        if($SecretKey !== 'boss'){
            $error = "Please Enter the Valid Secret Key...";
            return $error;
        }
      if($password == $confirmPassword){

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
       
        $query = " INSERT INTO `manager`(`fullname`, `email`, `contact`, `address`, `password`) VALUES ('$fullName','$email','$contactNumber','$address','$hashedPassword'); ";

        mysqli_query($this->conn, $query);
        

        header("location: managerLogin.php");
        return true;
      }
      else{
        $error = "Please enter same password for both fields...";
        return $error;
      }
    }
  }


  public function managerLogin($managermail, $password){


    $result = $this->isUserExist($managermail);


  if($result){


  $row = $result->fetch_assoc();

      if (password_verify($password, $row['password'])) {


      $_SESSION['manager_id'] = $row['M_ID'];
      $_SESSION['login_managerMail']=$managermail; // Initializing Session
	    $_SESSION['login_ManagerFullname']=$row['fullname']; // Initializing Session for userFullname
        
        header("location: ../view_food_items.php");

        return true;
    }else{
      $error = "Password is invalid for this managermail..:(...";
        return $error;
      }
    }
    else{
      $error = "managermail or Password is invalid";
      return $error;
    }
  }

  public function UserId(){
    return $this->id;
  }

  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM manager WHERE M_ID = $id");
    return mysqli_fetch_assoc($result);
  }

  public function isUserExist($managermail){

    $stmt = $this->conn->prepare("SELECT * FROM manager WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $managermail);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
      return $result;
  }
  else{
      return false;
  }
  
}

}

?>