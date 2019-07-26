<?php
   
    include 'header.php';

?>

<div class="container">
    <table class="table table-hover" style="margin-top: 100px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            <?php
            require_once '../classes/Item.php';
                $item = new Item;
                $get_items = $item->selectOrderHistory($cart_id,$cart_status);

                if($get_items){
                    foreach($get_items as $key => $row){
                        $id = $row['item_id'];
                        echo "<tr>";
                            echo "<td>" . $row['item_id'] . "</td>";
                            echo "<td>" . $row['item_name'] . "</td>";
                            echo "<td>" . $row['item_status'] . "</td>";
            }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Nothing to show</td></tr>";
                }
                echo "</tbody>";
                echo "</table>";

                
            ?>
</div>
</body>

</html>