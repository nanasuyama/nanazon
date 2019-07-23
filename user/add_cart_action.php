<?php
    session_start();
    $user_id = $_SESSION['user_id'];

    require_once "../classes/Cart.php";
    $cart = new Cart;

    if($_GET['action'] == 'addToCart'){
        $item_id = $_GET['item_id'];
        $item_quantity = $_POST['item_quantity'];
        $item_price = $_POST['item_price'];

        $result = $cart->saveCart($item_id, $user_id, $item_quantity, $item_price);

    }
    


?>