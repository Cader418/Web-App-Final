<?php 
    session_start(); 
    include("connection_db.php");

    $sql = ("select * from products");
    $result = $connect->query($sql);
    $records = array();

    while ($row = $result->fetch_array()) {
        $records[] = array(
            "sid"=>$row['sid'],
            "product_id"=>$row['product_id'],
            "seller_id"=>$row['seller_id'],
            "name"=>$row['name'],
            "image"=>$row['image'],
            "description"=>$row['description'],
            "price"=>$row['price'],
            "condition"=>$row['condition'],
            "categories"=>$row['categories'],
            "date"=>$row['date'],
            "available"=>$row['available']
        );
    }
    echo json_encode($records);
?>