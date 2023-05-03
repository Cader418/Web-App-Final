<?php 
   
    include("connection_db.php");
    if (!isset($_SESSION['id'])){
        header("Location: login.php");
    }
?>