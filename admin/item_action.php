<?php
    session_start();
    $user_id = $_SESSION['user_id'];

    require_once '../classes/Item.php';

    $item = new Item;

    if($_GET['action'] == 'add') {
        $item_name = $_POST['item_name'];
        $category_id = $_POST['category_name'];
        $item_desc = $_POST['item_desc'];
        $item_price = $_POST['item_price'];
        $item_quantity = $_POST['item_quantity'];

        $target_dir = '../uploads/item_images/';

        $image1 = $target_dir . basename($_FILES['image1']['name']);
        $tmp_image1 = $_FILES['image1']['tmpn_ame'];

        $image2 = $target_dir . basename($_FILES['image2']['name']);
        $tmp_image2 = $_FILES['image2']['tmp_name'];

        $image3 = $target_dir . basename($_FILES['image3']['name']);
        $tmp_image3 = $_FILES['image3']['tmp_name'];

        $result = $item->save($item_name, $category_id, $user_id, $item_desc, $item_price, $item_quantity, $image1, $tmp_image1, $image2, $tmp_image2, $image3, $tmp_image3);
    }
    elseif($_GET['action'] == 'update') {
        $id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $category_id = $_POST['category_id'];
        $item_desc = $_POST['item_desc'];
        $item_price = $_POST['item_price'];
        $item_quantity = $_POST['item_quantity'];
        
        $result = $item->update($id,$item_name,$category_id,$item_desc,$item_price,$item_quantity);

    }
    elseif($_GET['action'] == 'delete') {
        $id = $_GET['item_id'];
        $result = $item->delete($id);
    }



?>