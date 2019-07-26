<?php

   require_once '../classes/Cart.php';
   include 'header.php';

?>

<div class="container">

    <div class="card" style="margin-top:250px;">
        <div class="card-header">
            <p class="lead">Payment Method</p>
        </div>
    
        <div class="card-body pl-5">
            <form action="" method="post">
            <?php
                $cart = new Cart;

                $get_payment_method = $cart->selectAllPaymentMethod();

                if($get_payment_method){
                    foreach($get_payment_method as $key => $row){
                        $id = $row['payment_id'];?>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_id" id="exampleRadios1"
                value="<?php echo $row['payment_id'];?>">
                <label class="form-check-label lead" for="exampleRadios1">
                    <?php echo $row['payment_name'];?>
                </label>
            </div>  
            <?php
                    }
                }
            ?>
            <input type="submit" name="checkout" value="CHECKOUT" class="btn btn-outline-warning float-right alert alert-warning">
            </form>
            <?php
                if(isset($_POST['checkout'])){
                    $cart_id = $_GET['cart_id'];
                    $ua_id = $_GET['ua_id'];
                    $payment_id = $_POST['payment_id'];

                    $cart->checkout($cart_id,$ua_id,$payment_id);
                }
            ?>
        </div>
    </div>

</div>
<br><br>

<?php

    include 'footer.php';

?>
