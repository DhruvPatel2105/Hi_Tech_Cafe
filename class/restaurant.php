<?php

include "connection.php";

class Restaurant extends Connection{

    public function getRestaurantList($searchButton = '') {
        if (!empty($searchButton)) {
            $sql = "SELECT * FROM `restaurants` WHERE name LIKE '$searchButton%' ORDER BY R_ID";
        } else {
            $sql = "SELECT * FROM `restaurants` ORDER BY R_ID";
        }

        $result = mysqli_query($this->conn, $sql);

        $restaurants = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $restaurants[] = $row;
            }
        }

        return $restaurants;
    }


    public function getRestaurantById($RID) {

        $sql = "SELECT * FROM `restaurants` WHERE R_ID = '$R_ID'";

        $result = mysqli_query($this->conn, $sql);

        $restaurants = [];

        if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $restaurants[] = $row;
        }

        return $restaurants;
    }
    
}


?>
