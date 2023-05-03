<?php 
    session_start(); 
    include("connection_db.php");

    $sql = ("select * from categories");
    $result = $connect->query($sql);
    $records = array();

    while ($row = $result->fetch_array()) {
        $records[] = array(
            "sid"=>$row['sid'],
            "name"=>$row['name'],
        );
    }
    echo json_encode($records);
?>