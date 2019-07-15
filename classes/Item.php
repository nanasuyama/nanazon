<?php

    require_once 'Config.php';

    class Item extends Config {
        public function selectAll() {
            $sql = "SELECT * FROM items ORDER BY item_id ASC";
            $result = $this->conn->query($sql);
            $rows = array();

            if($result->num_rows >0) {
                while($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            } else {
                return false;
            }
        }

        public function selectOne($id) {
            $sql = "SELECT * FROM items WHERE item_id = $id";
            $result = $this->conn->query($sql);

            if($result) {
                return $result->fetch_assoc(); 
            } elseif($this->conn->error){
                echo "ERROR";
            }
        }

        public function save($item_name, $category_id, $item_desc, $item_price, $item_quantity){
            $sql = "INSERT INTO items(item_name, category_name, item_name, item_desc, item_price, item_quantity)
                    VALUES ('$item_name', '$category_name', '$item_name', '$item_desc','$item_price', '$item_quantity')";
            
            $result = $this->conn->query($sql);

            if($result) {
                $this->redirect('item_list.php');
            } else {
                echo "ERROR";
            }
        }

        public function update ($id, $item_name, $category_id, $item_desc, $item_price, $item_quantity){
            $sql = "UPDATE items SET item_name = '$item_name', category_id = '$category_id', item_desc = '$item_desc',
                    item_price = '$item_price', item_quantity = '$item_quantity'
                    WHERE item_id = $id";

            $result = $this->conn->query($sql);

            if($result) {
                $this->redirect('item_list.php');
            } else {
                echo "ERROR";
            }
        }

        public function delete($id) {
            $sql = "DELETE FROM items WHERE item_id = $id";

            $result = $this->conn->query($sql);

            if($result) {
                $this->redirect('item_list.php');
            } else {
                echo "ERROR";
            }
        }








    }



?>