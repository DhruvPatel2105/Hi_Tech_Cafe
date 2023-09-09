<?php

class Connection{

  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "foodorder_class";
  public $conn;

  public function __construct(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);

  if ($this->conn->connect_error) {
      die(" Connection failed...:( " . $this->conn->connect_error);
  }

  }
  
}


?>


