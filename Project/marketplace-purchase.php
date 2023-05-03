<?php
    session_start();
    include ("connection_db.php");

    $sessid = $_SESSION['id'];

    //Remove items from users cart
    $sql = ("SELECT * FROM cart WHERE user_id='$sessid'");
    $result = $connect->query($sql);
    while ($row = $result->fetch_assoc()) {
        $sql2 = "UPDATE products SET available='0' WHERE product_id='".$row['product_id']."'";
        $result2 = $connect->query($sql2);
        
        $sql2 = ("SELECT * FROM products WHERE product_id='".$row['product_id']."'");
        $result2 = $connect->query($sql2);
        $row3 = $result2->fetch_assoc();

        // $p_id  = mysqli_real_escape_int($connect, $row['product_id']);
        // $s_id  = mysqli_real_escape_int($connect, $row['seller_id']);
        // $u_id  = mysqli_real_escape_int($connect, $sessid);
        // echo $p_id."<br>";
        // echo $s_id."<br>";
        // echo $u_id."<br>";
        // echo $row['product_id']."<br>";
        // echo $row['seller_id']."<br>";
        // echo $sessid."<br>";

        // return;
        // $sql3 = "INSERT INTO `sold_products` (`sid`, `product_id`, `seller_id`, `user_id`) VALUES (NULL, '$p_id' , '$s_id' ,'$u_id')";
        // $sql3 = ("INSERT INTO `sold_products` ( `product_id`, `seller_id` , `user_id`  ) VALUES ('".$row['product_id']."' , '".$row3['seller_id']."' , '$sessid')");
        $sql3 = "INSERT INTO sold_products (sid,product_id,seller_id,user_id) VALUES (NULL,'".$row['product_id']."' , '".$row3['seller_id']."' , '$sessid')";
        // $sql3 = "INSERT INTO sold_products (sid,product_id,seller_id,user_id) VALUES (NULL,'1239','4','3')";
        $result3 = $connect->query($sql3);
    }

    $sql = "DELETE FROM `cart` WHERE user_id='$sessid'";   
    $result = $connect->query($sql);
    

    if ($result == FALSE){
        include('add-student-error.php');
    }else{
        header('location: /project/marketplace-cart.php');
    }
    /*$sessid = $_SESSION['id'];
    $cart_product_ids = array();

    //Get product ids of users cart
    $sql1="SELECT * FROM cart where user_id = '".$sessid."'";
    $result1 = $connect->query($sql1);
    while($row1 = $result1->fetch_assoc()){
        $cart_product_ids[] = $row1['product_id'];
    } 

    //Product    
    $name = array();
    $image = array();
    $price = array();
    $product_id = array();

    //Get Products
    $sql2="SELECT * FROM `products` ";
    $result2 = $connect->query($sql2);
    $cartItemsInd = 0;
    while($row2 = $result2->fetch_assoc()){
        if($cart_product_ids != null && $row2['product_id'] == $cart_product_ids[$cartItemsInd]){
            $name[] = $row2['name'];
            $image[] = $row2['image'];
            $price[] = $row2['price'];
            $product_id[] = $row2['product_id'];
        }
        if($cartItemsInd < count($cart_product_ids)-1){
            $cartItemsInd = $cartItemsInd + 1;
        }
    }
    */
?>