<?php
    include('../models/db.php');

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      $conn->insert($username, $password, $email, $phone);
      header("location: ../views");
   }
    
?>