<?php 
    session_start(); 
    include("connection_db.php");

    $sql = ("select * from user");
    $result = $connect->query($sql);
    $records = array();

    while ($row = $result->fetch_array()) {
        $records[] = array(
            "sid"=>$row['sid'],
            "user_id"=>$row['user_id'],
            "firstname"=>$row['firstname'],
            "lastname"=>$row['lastname'],
            "username"=>$row['username'],
            "password"=>$row['password'],
            "email"=>$row['email'],
            "address"=>$row['address'],
            "phone"=>$row['phone'],
            "image"=>$row['image'],
        );
    }
    echo json_encode($records);
?>