<?php

    require_once '../classes/Item.php';
    include 'header.php';


	$item = new Item;
	$item_id = $_GET['item_id'];
	$get_item = $item->selectOne($item_id);
	$list_image = $item->selectAllImage($item_id);

?>
<div class="container" style="margin:200px;">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="thumbnails">
                    <ul>
                        <li class="active">
                            <img src="../<?php echo $get_item['image_path'].$get_item['image_name']; ?>"
                                data-image="../<?php echo $values['image_path'].$values['image_name']; ?>" alt="">
                        </li>

                        <li>
                            <img src="../<?php echo $values['image_path'].$values['image_name']; ?>"
                                data-image="../<?php echo $values['image_path'].$values['image_name']; ?>" alt="">
                        </li>

                    </ul>
                </div>

        </div>

        <div class="col-md-6">
            <div class="product_details">
                <div class="product_details_title">
                    <h2><?php echo $get_item['item_name'];?></h2>
                    <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque
                        diam dolor, elementum etos lobortis des mollis ut...</p>
                </div><br>




                <div class="product_price">$<?php echo $get_item['item_price'];?>.00</div>

                <!-- <div class="product_price">$495.00</div> -->

                <ul class="star_rating">
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                </ul>

                <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                    <span>Quantity:</span>
                    <div class="quantity_selector">
                        <input type="number" name="item_quantity" min="1" max="<?php echo $get_item['item_quantity'];?>"
                            class="form-control">
                    </div>
                    <br>
                </div>
                <br>
                <button type="submit" class="d-flex flex-row align-items-center justify-content-center btn btn-warning text-white w-100">
                    <span class="ti-bag"></span><span class="p-1"> CHECK OUT</span>
                </button><br>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
































<?php 
	include 'footer.php';
?>