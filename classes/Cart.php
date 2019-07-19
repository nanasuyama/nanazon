<?php

    require_once 'Config.php';

    class Cart extends Config {

        public function saveCart($user_id, $cart_status, $total_price, $ci_quantity){
            $sql = "INSERT INTO cart(user_id, cart_status, total_price)
            VALUES ('$user_id', '$cart_status', '$total_price')";

            $result = $this->conn->query($sql);

            if($result) {
                $item_id = $this->conn->insert_id;

                $insert_item = $this->saveCartItems($cart_id, $item_id, $ci_quantity);

                $this->redirect('index.php');
            } else {
                echo "ERROR" . $this->conn->error;
            }
        }

        public function saveCartItem($cart_id, $item_id, $ci_quantity, $ci_price){
            $sql = "INSERT INTO cart_item(cart_id, item_id, ci_quantity, ci_price)
                    VALUES($cart_id, $item_id, $ci_quantity, $ci_price)";

            $result = $this->conn->query($sql);

            if($result){
                return true;
            } else {
                echo "ERROR" . $this->conn->error;
            }
        }




    }




?>