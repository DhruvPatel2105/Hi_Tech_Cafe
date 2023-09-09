<?php

class Cart{

    public function removeFromCart($foodId) {

        if (isset($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $keys => $values) {
                        if ($values["food_id"] == $foodId) {
                            unset($_SESSION["cart"][$keys]);
                            echo '<script>alert("Food has been removed")</script>';
                            echo '<script>window.location="cartPage.php"</script>';
                        }
                    }
                }
        return false;

    }


    public function emptyCart() {
        unset($_SESSION["cart"]);
        echo '<script>alert("Cart is made empty!")</script>';
    echo '<script>window.location="cartPage.php"</script>';
    }

}
    
?>
