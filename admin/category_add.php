<?php

    include 'header.php';

?>

<div class="container" style="margin-top: 160px;"><br>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="user_action.php?action=add" method="post">

                <div class="form-group">
                    <label for="category">Categories</label><br>
                    <input type="text" name="category" id="" class="form-control">
                </div>

                <input type="submit" value="Save" name="add" class="btn btn-primary float-right">

            </form>
        </div>
    </div>
</div>
</body>
</html>