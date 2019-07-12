<?php

require_once "Config.php";

class User extends Config {
    public function login($username, $password){ //ログインする為
        $hashed_password = md5($password);
        $sql = "SELECT * FROM users 
                WHERE username = '$username' AND password = '$hashed_password'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            if ($result->num_rows > 0) {
                if ($row['status'] == 'A') { //ADMINなのかUSERなのかをチェック
                    echo "<script>window.location.replace('admin/user_list.php');</script>";
                } else {
                    echo "<script>window.location.replace('index.php');</script>";
                }
            } else {
                echo "<p class='text-danger'>Invalid Username or Password</p>";
                
            }
        }
    }

    public function login_required_admin(){ //アドミンかどうかチェックする
        if (!isset($_SESSION['user_id'])){
            echo "<script>window.location.replace('../login.php');</script>";
        } else {
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM users WHERE user_id = $id";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                if($row['status'] == 'U') { //ユーザーだったらログインに戻される
                    echo "<script>window.location.replace('../login.php');</script>";
                }
            }
        }
    }

    public function logout(){

        session_destroy();
        echo "<script>window.location.replace('../login.php');</script>";
        exit;
    }


    public function selectOne($id) {
        $sql = "SELECT * FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql);

        if($result) {
            return $result->fetch_assoc();
        } elseif($this->conn->error) {
            echo "ERROR" . $this->conn->error;
        }
    }

    public function selectAll (){
        $sql = "SELECT * FROM users ORDER BY user_id ASC";
        $result = $this->conn->query($sql);
        $rows = array();
        if($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             $rows[] = $row;
         }
         return $rows;
    } else {
        return false;
    }
}

    public function save($username, $email, $password, $firstname, $lastname, $dob, $status){
        $new_password = md5($password);
        $sql = "INSERT INTO users(username, email, password, firstname, lastname, dob, status)
                VALUES ('$username', '$email', '$new_password', '$firstname', '$lastname', '$dob', '$status')";

        $result = $this->conn->query($sql);

        if($result) {
            return true;
        } else {
            echo "ERROR" . $this->conn->error;
        }
    }

    public function update ($id, $username, $email, $firstname, $lastname) {
        $sql = "UPDATE users SET username = '$username', email = '$email',
                firstname = '$firstname', lastname = '$lastname' WHERE user_id = $id";
        $result = $this->conn->query($sql);

        if($result) {
            return true;
        } else {
            echo "ERROR" . $this->conn->error;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql);

        if($result) {
            return true;
        } else {
            echo "ERROR" . $this->conn->error;
        }
    }

}

?>