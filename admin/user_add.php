<?php

    include 'header.php';

?>

<div class="container" style="margin-top: 160px;"><br>
    <div class="row">
        <div class="col-6 justify-content-center">
            <form action="user_action.php?action=add" method="post">

                <div class="form-group">
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="" class="form-control">
                </div>
                    
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="firstname">Firstname</label><br>
                    <input type="text" name="firstname" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="lastname">Lastname</label><br>
                    <input type="text" name="lastname" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label><br>
                    <input type="date" name="dob" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="status">Status</label><br>
                        <select name="status" class="form-control">
                            <option value="A">Admin</option>
                            <option value="U">User</option>
                        </select>
                </div>

                <input type="submit" value="Save" name="add" class="btn btn-primary float-right">

            </form>
        </div>
    </div>
</div>


</body>

</html>