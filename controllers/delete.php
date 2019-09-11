<?php
    require_once('../models/db.php');
    $id = $_GET['id'];
    
    if (isset($id)) {
        $conn->delete($id,'user');
        header("location: ../");
    }
?>