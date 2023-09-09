<?php

include "connection.php";

class Order extends Connection{
    
        public function placeOrder($userID, $foodID, $foodName, $price, $quantity, $restaurantID)
        {

            $orderDate = date('Y-m-d');

            $query = "INSERT INTO ORDERS (F_ID, foodname, price,  quantity, order_date, U_ID, R_ID) 
            VALUES ('" . $foodID . "','" . $foodName . "','" . $price . "','" . $quantity . "','" . $orderDate . "','" . $userID . "','" . $restaurantID . "')";
            
            $success = mysqli_query($this->conn, $query);

            // SQL injection 
            // $query = "INSERT INTO ORDERS (F_ID, foodname, price,  quantity, order_date, U_ID, R_ID) 
            //           VALUES (?, ?, ?, ?, ?, ?, ?)";
    
            // $stmt = $this->conn->prepare($query);
            // $stmt->bind_param("sssssss", $foodID, $foodName, $price, $quantity, $orderDate, $userID, $restaurantID);
            // $success = $stmt->execute();
            // $stmt->close();
    
            if (!$success) {
                return false;
            }


            $query3 = mysqli_query($this->conn, "SELECT quantity FROM food WHERE F_ID = '$foodID'");

            $row = mysqli_fetch_assoc($query3);

            $temp2 = $row['quantity'];
    
            // $query3 = "SELECT quantity FROM food WHERE F_ID = ?";
            // $stmt3 = $this->conn->prepare($query3);
            // $stmt3->bind_param("s", $foodID);
            // $stmt3->execute();
            // $result3 = $stmt3->get_result();
            // $row = $result3->fetch_assoc();
            // $temp2 = $row["quantity"];
            // $stmt3->close();
    
            $temp = $temp2 - $quantity;
    
            $query2 = "UPDATE food SET quantity = '$temp' WHERE F_ID = '$foodID' ";

            $success2 = mysqli_query($this->conn, $query2);

            // $stmt2 = $this->conn->prepare($query2);
            // $stmt2->bind_param("ss", $temp, $foodID);
            // $success2 = $stmt2->execute();
            // $stmt2->close();

            return $success2;

        }

        public function orderDetailsAsPerMID($managerID)
        {

            $sql = "SELECT * FROM orders o WHERE o.R_ID IN (SELECT r.R_ID FROM RESTAURANTS r WHERE r.M_ID='$managerID') ORDER BY order_date";

            $result = mysqli_query($this->conn, $sql);
        
            $orders = [];
        
        
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $orders[] = $row;
                }
            }
        
            return $orders;
        }
    }
    
?>    