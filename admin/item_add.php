<?php

    include 'header.php';
?>

<div class="container" style="margin-top: 200px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="item_action.php?action=add" method="post">
                
            <div class="form-group">
                <label for="item_name">Item Name</label><br>
                <input type="text" name="item_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="category_name">Category Name</label><br>
                <select name="category_name" class="form-control">
                    <option value="category_name">Choose Category</option>
                    <?php

                        require_once '../classes/Category.php';
                        $category = new Category;
                        $list = $category->selectAll();

                        foreach($list as $key => $values){
                            echo "<option value='".$values['category_id']."'>".$values['category_name']."</option>";
                        }

                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="item_desc">Description</label>
                <textarea name="item_desc" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="item_price">Price (JPY)</label>
                <input type="number" name="item_price" class="form-control" placeholder="¥">
            </div>

            <div class="form-group">
                <label for="item_quantity">Quantity</label>
                <input type="number" name="item_quantity" class="form-control">
            </div>

            <input type="submit" value="Save" name="add" class="btn btn-primary float-right mb-5">

            </form>
        </div>
    </div>
</div>