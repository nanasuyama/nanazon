<?php

    include 'header.php';

?>

<div class="container" style="margin-top: 160px;"><br>
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="user_action.php?action=add" method="post">

                <div class="form-group">
                    <label for="category">Categories</label><br>
                        <select name="category" class="form-control">
                            <option value="womens">Women's</option>
                            <option value="mens">Men's</option>
                        </select>
                </div>

                <input type="submit" value="Save" name="add" class="btn btn-primary float-right">

            </form>
        </div>
    </div>
</div>



<?php
    include 'footer.php';
?>