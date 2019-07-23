<?php

    require_once 'Config.php';

    class Cart extends Config {

        public function saveCart($item_id, $user_id, $item_quantity, $item_price){

            $sql = "SELECT * FROM cart WHERE user_id = $user_id AND cart_status = 'available'";
            $result_cart = $this->conn->query($sql);

            if($result_cart->num_rows == 0){ //if cart does not exist
                $sql = "INSERT INTO cart(user_id, cart_status)
                VALUES ('$user_id', 'available')";

                $result = $this->conn->query($sql);

                if($result) {
                    $cart_id = $this->conn->insert_id;//get the last inserted primary key (id)

                    $insert_item = $this->saveCartItem($cart_id, $item_id, $item_quantity, $item_price);

                    if($insert_item){
                        $update_item = $this->updateItemQuantity($item_id, $item_quantity);
                        if($update_item){
                            $this->redirect('index.php');
                        }
                    }
                } else {
                    echo "ERROR" . $this->conn->error;
                }
            } elseif($result_cart->num_rows == 1){//if cart exist
                $row = $result_cart->fetch_assoc();
                $cart_id = $row['cart_id'];//find car_id
                $insert_item = $this->saveCartItem($cart_id, $item_id, $item_quantity, $item_price);
                if($insert_item){
                $update_item = $this->updateItemQuantity($item_id, $item_quantity);
                if($update_item){
                    $this->redirect('index.php');
                }
                }
            }
        }

        public function saveCartItem($cart_id, $item_id, $item_quantity, $item_price){
            $ci_price = $item_price * $item_quantity;
            $sql = "INSERT INTO cart_items(cart_id, item_id, ci_quantity, ci_price)
                    VALUES($cart_id, $item_id, $item_quantity, $ci_price)";

            $result = $this->conn->query($sql);

            if($result){
                return true;
            } else {
                echo "ERROR" . $this->conn->error;
            }
        }

        public function updateItemQuantity($item_id, $item_quantity){
            $sql = "SELECT * FROM items WHERE item_id = $item_id"; //to get the current data of the item
            $result = $this->conn->query($sql);

            if($result) {
                $row = $result->fetch_assoc(); 
                $new_quantity = $row['item_quantity'] - $item_quantity;
                //$row['item_quantity'] (from database) - $item_quantity(from from);

                $sql = "UPDATE items SET item_quantity = '$new_quantity'
                    WHERE item_id = $item_id";

                $result = $this->conn->query($sql);

                if($result){
                    return true;
                } else {
                    echo "ERROR";
                }
            } elseif($this->conn->error){
                echo "ERROR";
            }
        }

        public function selectCartItems($user_id){
            // Get the cart item first

            $sql = "SELECT * FROM cart WHERE user_id = $user_id AND cart_status = 'available'";
            $result = $this->conn->query($sql);

            if($result->num_rows == 1){ // Check if there is 1 result
                $row = $result->fetch_assoc(); // Get the result data
                $cart_id = $row['cart_id']; // Get the id

                $sql = "SELECT * FROM cart_items WHERE cart_id = $cart_id";
                $result = $this->conn->query($sql); // Run or execute query

                if($result->num_rows > 0){ // Check if there are results
                    $rows = array(); // Create an empty array
                    while($row = $result->fetch_assoc()){ // Get the result data
                        $rows[] = $row; // Populate rows with every row data from the db
                    }
                    return $rows; // Return the populated array
                } else {
                    echo "Oh Snap! There are no items in your cart.";
                }
            } else{
                echo "Oh Snap! There are no items in your cart.";
            }
        }




    }




?>