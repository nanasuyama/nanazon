<?php

    require_once 'Config.php';

    class Item extends Config {
        public function selectAll() {
            $sql = "SELECT * FROM items 
            INNER JOIN categories ON items.category_id = categories.category_id
            INNER JOIN users ON items.user_id = users.user_id
            ORDER BY items.item_id ASC";

            $result = $this->conn->query($sql);
            $rows = array();

            if($result->num_rows > 0) {
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

        public function save($item_name, $category_id, $user_id, $item_desc, $item_price, $item_quantity, $image1, $tmp_image1, $image2, $tmp_image2, $image3, $tmp_image3){
            $sql = "INSERT INTO items(item_name, category_id, user_id, item_desc, item_price, item_quantity)
                    VALUES ('$item_name', '$category_id', '$user_id', '$item_desc','$item_price', '$item_quantity')";
            
            $result = $this->conn->query($sql);

            if($result) {
                $item_id = $this->conn->insert_id; //ADDしたことによって作られたIDを取得する

                $insert_image1 = $this->save_image($item_id, $image1, $tmp_image1);
                $insert_image2 = $this->save_image($item_id, $image2, $tmp_image2);
                $insert_image3 = $this->save_image($item_id, $image3, $tmp_image3);

                $this->redirect('item_list.php');
            } else {
                echo "ERROR";
            }
        }

        public function save_image($item_id, $image, $tmp_image){
            $path = "uploads/item_images/";
            if(move_uploaded_file($tmp_image, $image)){
                $sql = "INSERT INTO item_images(item_id, image_path, image_name)
                        VALUES($item_id, $path, $tmp_image)";
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