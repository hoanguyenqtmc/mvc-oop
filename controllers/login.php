<?php
    include("../models/db.php");
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       // username and password sent to form
       
       $myusername = $_POST['username'];
       $mypassword = $_POST['password'];


       $sql = "SELECT id FROM user WHERE username = '$myusername' AND password = '$mypassword'; ";
       $result = $conn->query($sql);
    //    echo "<pre>";
    //    print_r($result);
       
       $count = $result->num_rows;
    //    print_r($count);

        if ($count > 0) {
            // session_register('myusername');
            $_SESSION['login_user'] = $myusername;
            header('location: ../views/index.php');
            print_r($_SESSION['login_user']);
        } else {
            $error = "Your Login Name or Password is invalid";
            header('location: ../views/login.php');
        }
    }
?>
