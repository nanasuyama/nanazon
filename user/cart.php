<?php
    include 'header.php';
    

?>
<div class="container" style="margin-top:200px;">
    <div class="row">
        <div class="col-sm-8">
            <div class="thumbnails">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <?php
                        require_once '../classes/Cart.php';
                        $cart = new Cart;
                        $list_item = $cart->selectCartItems($userid);

                        require_once '../classes/Item.php';
                        $item = new Item;
                        foreach($list_item as $key => $row){
                            $cart_id=$row['cart_id'];
                            $item_id=$row['item_id'];
                            $list_image = $item->selectAllImage($item_id);
                            // print_r($list_image);
                        ?>
                        <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="../<?php echo $list_image[0]['image_path'] . $list_image[0]['image_name'];?>" alt="" style="width:100%;">
                                    </div> 
                                    <div class="col-sm-6 mt-4">
                                        <p class="lead"><?php echo $row['item_name'];?></p>
                                    </div>

                                    <div class="col-sm-2 mt-4">
                                        <p class="lead">$<?php echo $row['ci_price'];?>.00</p>
                                        
                                    </div>

                                    <div class="col-sm-2 mt-4">
                                        <p class="lead">Qty : <?php echo $row['ci_quantity'];?></p>
                                    </div>
                                </div>
                        </li>
                        <?php
                                }
                            ?>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-warning">
                    <p class="lead">Order Summary</p>
                </div>
                <div class="card-body">
                    <?php
                    $sum = $cart->selectSum($cart_id);
                    
                    ?>
                    <p class="lead">Subtotal
                        <span class="float-right">$<?php echo $sum['total_price'];?>.00</span></p>
                    <p class="lead">Shipping Fee
                        <span class="float-right">Free</span>
                    </p>
                    <p class="lead">Total
                        <span class="float-right">$<?php echo $sum['total_price'];?>.00</span>
                    </p>
                    <input type="submit" value="CHECK OUT" class="alert alert-primary btn btn-primary float-right">
                </div>
            </div>
        </div>
    </div>
</div>
































<?php 
	include 'footer.php';
?>