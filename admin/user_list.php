<?php

    require_once '../classes/User.php';
    include 'header.php';

    $user = new User;

?>

<table class="table table-striped" style="margin-top: 200px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Date of Birth</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

        <?php

            $get_users = $user->selectAll();//$users = instance

            if($get_users){
                foreach($get_users as $key => $row){
                    $id = $row['user_id'];
                    echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['lastname'] . "</td>";
                        echo "<td>" . $row['dob'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>
                            <a href='user_edit.php?user_id=$id' class='btn btn-info btn-sm'>Edit</a>";
        ?>
                            <a href='user_action.php?action=delete&user_id=<?php echo $id;?>' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure you want to delete?");'>Delete</a>
                            </td>
                        </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>Nothing to show</td></tr>";
            }
            echo "</tbody>";
            echo "</table>";


        ?>
        