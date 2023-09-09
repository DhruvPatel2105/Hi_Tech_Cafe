<?php

include "connection.php";

class Food extends Connection {


public function getFoodList($restaurantId, $searchButton = '') {
    if (!empty($searchButton)) {
        $sql = "SELECT * FROM FOOD WHERE R_ID = '$restaurantId' AND name LIKE '$searchButton%' AND options = 'ENABLE' ORDER BY F_ID";
    } else {
        $sql = "SELECT * FROM FOOD WHERE R_ID = '$restaurantId' AND options = 'ENABLE' ORDER BY F_ID";
    }

    $result = mysqli_query($this->conn, $sql);

    $foods = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $foods[] = $row;
        }
    }

    return $foods;
}


public function getFoodItemsUsingFID($food_id)
{        
    
    $sql = "SELECT * FROM FOOD WHERE F_ID = '$food_id' ";


    $result = mysqli_query($this->conn, $sql);

    $foods = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $foods[] = $row;
        }
    }

    return $foods;
    
}

public function getFoodItemsUsingMID($managerID)
{
    
    $sql = "SELECT * FROM food f WHERE f.R_ID IN (SELECT r.R_ID FROM RESTAURANTS r WHERE r.M_ID='$managerID') ORDER BY F_ID";

    $result = mysqli_query($this->conn, $sql);

    $foods = [];


    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $foods[] = $row;
        }
    }



    return $foods;
}

public function addFoodItems($foodName,$foodPrice,$foodDescription,$Customize,$R_ID,$images_path,$quantity)
{

   $sql = "INSERT INTO `food`(`name`, `price`, `description`, `customize`, `R_ID`, `images_path`,`quantity`) VALUES ('$foodName','$foodPrice','$foodDescription','$Customize','$R_ID','$images_path','$quantity')";

   mysqli_query($this->conn, $sql);
   
   header("location: view_food_items.php");
   return true;

}


public function updateFoodItems($foodId, $foodName,$foodPrice,$foodDescription,$Customize,$images_path,$quantity)
{

  $update_query = "UPDATE food set name='$foodName', price='$foodPrice', description='$foodDescription',customize='$Customize',images_path = '$images_path' ,quantity='$quantity' where F_ID='$foodId'";

  if (mysqli_query($this->conn, $update_query)) {
      return true;
  } else {
      return false;
  }

}

public function deleteFoodItem($disableIds)
{
    
$cheks = implode("','", $disableIds);


$sql = "DELETE FROM `food` WHERE F_ID in ('$cheks')";

$result = mysqli_query($this->conn,$sql) or die(mysqli_error($this->conn));

header('Location: delete_food_items.php');
}






}

?>