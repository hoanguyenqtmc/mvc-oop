<?php
    class DB {
        var $host;
        var $username;
        var $password;
        var $database;
        var $conn;
        public function connection($set_host, $set_username, $set_password, $set_database) {
            $this->host = $set_host;
            $this->username = $set_username;
            $this->password = $set_password;
            $this->database = $set_database;

            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error());
            } 
            // else {
            //     echo "Connection successfully";
            // }
            
        }

        public function fetchAll()
        {    
            $sql = "SELECT * FROM user";    
            $result = $this->conn->query($sql);
            if ($result == false) {
                return false;
            } 
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }

        public function findOne($id) {
            $sql = "SELECT * FROM user WHERE id = '$id'";
            $result = $this->conn->query($sql);
            if ($result == false) {
                return false;
            } 
            $rows = array();
            while ($row = $result->fetch_object()) {
                return $row;
            }
            
        }

        public function execute($sql) 
        {
            $result = $this->conn->query($sql);
            if ($result == false) {
                echo 'Error: cannot execute the command';
                return false;
            } else {
                return true;
            }        
        }
        public function query($sql) 
        {
            $result = $this->conn->query($sql);
            if ($result == false) {
                echo 'Error: cannot execute the command';
                return false;
            } else {
                return $result;
            }        
        }

        public function insert($username,$password,$email,$phone) {
            $sql = "INSERT INTO user(username,password, email, phone) 
            VALUES ('$username', '$password', '$email', '$phone')";
            if ($this->conn->query($sql) === true) {
                $last_id = $this->conn->insert_id;
                echo 'New record created successfully have id is: ' .$last_id;
            } else {
                echo 'Error: '. $sql . '<br>'. $this->conn->error;
            }
        }

        public function update($id, $username, $password, $email, $phone) {
            $sql = "UPDATE user SET username = '$username', password='$password', email='$email' , phone='$phone'  WHERE id = '$id'";
            if ($this->conn->query($sql) === true) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: ". $this->conn->error;
            }
        }

        public function delete($id, $table) 
        { 
            $sql = "DELETE FROM $table WHERE id = $id";
            $result = $this->conn->query($sql);
            if ($result == false) {
                echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
                return false;
            } else {
                echo "Xoa thanh cong";
                return true;
            }
        }

        // public function checkLogin() {
        //     if (isset($_SESSION['login_user'])) {
        //         return true;
        //     }
        // }


}
    $conn = new DB();
    $conn-> connection('localhost', 'root', '', 'php_23_08_2019');
   
   
?>