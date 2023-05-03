<?php 
    session_start(); 
    include("connection_db.php");
    $sql = "SELECT * FROM products";
    $result = $connect -> query($sql);
    $search_result = $_GET['result'];
    $records = array();
    while ($row = $result->fetch_array()) {
        if (str_contains(strtolower($row['name']) , $search_result) && 
            strcmp($row['available'], "1") == 0 ) {
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
    }
    echo json_encode($records);
?>