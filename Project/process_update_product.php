<?php 
    session_start();
    $id = $_POST['p_id'];
    include("connection_db.php");
    if($_POST['submit'] == "cancel"){
        header("Location: sellerpage.php");
        return;
    }else if($_POST['submit'] == "delete"){
        $sql = "DELETE FROM `products` WHERE `product_id`='$id'";
        // $sql = "DELETE FROM products WHERE product_id = $id;";
        $connect -> query($sql);
        header("Location: sellerpage.php");
        return;
    }
    
    
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = floatval($_POST['price']);
    $categories = $_POST['extraVar'];
    $condition = intval($_POST['condition']); 
    $available = ($_POST['available'] == "true")?"1":"0";
    $noPicture = $_POST['no_picture'];

    $img_name = $_FILES['image']['name'];
    $final_img_img = "";
    if ($img_name != ""){
        $tmp_name = $_FILES['image']['tmp_name'];
        $target_dir = "img/products/";
        $target_file = $target_dir . basename($img_name);
        move_uploaded_file( $tmp_name , $target_file );
        $final_img_img = $img_name;
    }else{
        if( $noPicture == "false"){
            $sql = "SELECT * FROM products WHERE product_id = {$id};";
            $result = $connect -> query($sql);
            $row = $result -> fetch_assoc();
            $final_img_img = $row['image'];
        }else{
            $final_img_img = "default_item.png";
        }

    }
    echo $id."<br>";
    echo $name."<br>";
    echo $desc."<br>";
    echo $price."<br>";
    echo $categories."<br>";
    echo $condition."<br>";
    echo $available."<br>";
    $sql = "UPDATE products SET name = '$name',image = '$final_img_img',description= '$desc',categories='$categories',price='$price',`condition`='$condition',available='$available' WHERE product_id=$id";
    if ($connect->query($sql) == false) {
        echo "Error: " . $connect->error;
    } else {
        echo "Successful insertion";
        header("Location: sellerpage.php");
    }

?>
