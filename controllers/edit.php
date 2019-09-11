<?php
    require_once('../models/db.php');
    $id = '';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }else {
        $id = $_POST['id'];
    }


    if ($id) {
        if (isset($id)) {
            $user = $conn->findOne($id);
            include('../views/edit.php');
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
  
        $conn->update($id, $username, $password, $email, $phone);
        header("location: ../views");
     }
    
?>