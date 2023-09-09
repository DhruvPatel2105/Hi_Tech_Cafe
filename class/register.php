<?php

include "connection.php";
session_start();

class Register extends Connection {

  public $id;

  public function registration($fullName, $email, $password, $confirmPassword, $contactNumber){

    if(!isset($fullName) && !isset($email) && !isset($password) && !isset($confirmPassword)){

      $error = "Please enter the required fields";
      return $error;
    }

    $conn = $this->conn; // Correct way to access the connection property

    $duplicate = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");

    if(mysqli_num_rows($duplicate) > 0){

      $error = "Useremail has already been taken....";
      // Username or email has already taken

      return $error;
    }
    else{
      if($password == $confirmPassword){

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
       
        $query = "INSERT INTO `customer`(`fullname`, `email`, `contact`, `password`) VALUES ('" . $fullName . "','" . $email . "','" . $contactNumber ."','" . $hashedPassword ."')";

        mysqli_query($this->conn, $query);
        

        echo "....after successful insert data....";

        header("location: ../Login_Signup/customerlogin.php");
        return true;
      }
      else{
        $error = "Please enter same password for both fields...";
        return $error;
      }
    }
  }


  public function login($usermail, $password){


  if($this->isUserExist($usermail)){

    $result = $this->isUserExist($usermail);

  $row = $result->fetch_assoc();

      if (password_verify($password, $row['password'])) {


      $_SESSION['login_id'] = $row['U_ID'];
      $_SESSION['login_usermail']=$usermail; // Initializing Session
	    $_SESSION['login_userFullname']=$row['fullname']; // Initializing Session for userFullname
	    header("location: ../index.php");

        return true;
        // Login successful
    }else{
      $error = "..Password is invalid for this UserMail..:(...";
        return $error;
        // Wrong password
      }
    }
    else{
      $error = "Usermail or Password is invalid";
      return $error;
    }
  }

  public function UserId(){
    return $this->id;
  }

  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM CUSTOMER WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }

  public function isUserExist($usermail){

    $stmt = $this->conn->prepare("SELECT * FROM CUSTOMER WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $usermail);
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