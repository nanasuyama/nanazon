<?php

require_once "../classes/User.php";

$user = new User;

if($_GET['action'] == 'add'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $status = $_POST['status'];

    $result = $user->save($username, $email, $password, $firstname,$lastname, $dob, $status);

    // if($result) {
    //     echo "<script>window.location.replace('user_list.php');</script>";
    // } else {
    //     echo "ERROR";
    // }
}
elseif ($_GET['action'] == 'update') {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $result = $user->update($user_id, $username, $email, $firstname, $lastname);

        if($result) {
            echo "<script>window.location.replace('user_list.php');</script>";
        }
    }
elseif($_GET['action'] == 'delete') {
    $user_id = $_GET['user_id'];

    $result = $user->delete($user_id);
    if($result) {
        echo "<script>window.location.replace('user_list.php');</script>";
    }
}






?>