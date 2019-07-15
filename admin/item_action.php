<?php
    session_start();
    $user_id = $_SESSION['user_id'];

    require_once '../classes/Item.php';

    $item = new Item;

    if($_GET['action'] == 'add') {
        $item_name = $_POST['item_name'];
        $user_id = $_POST['user_id'];
        $category_id = $_POST['category_id'];
        $item_desc = $_POST['item_desc'];
        $item_price = $_POST['item_price'];
        $item_quantity = $_POST['item_quantity'];

        $result = $item->save($item_name,$user_id,$category_id, $item_desc, $item_quantity);
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