<?php 
    session_start(); 
    include("connection_db.php");

    $sql = ("select * from sold_products");
    $result = $connect->query($sql);
    $records = array();

    while ($row = $result->fetch_array()) {
        $records[] = array(
            "sid"=>$row['sid'],
            "product_id"=>$row['product_id'],
            "seller_id"=>$row['seller_id'],
            "user_id"=>$row['user_id'],
        );  
    }
    echo json_encode($records);
?>