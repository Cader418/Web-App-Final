<?php 
    session_start();
    include("connection_db.php"); 
    $product_id = rand(10000, 99999);
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = floatval($_POST['price']);
    $categories = $_POST['extraVar'];
    $condition = $_POST['condition'];
    $available = ($_POST['available'] == "true")?1:0;
    $current_date = date("Y-m-d");

    $img_name = $_FILES['image']['name'];
    $final_img_img = "";
    if ($img_name!= ""){
        $tmp_name = $_FILES['image']['tmp_name'];
        $target_dir = "img/products/";
        $target_file = $target_dir . basename($img_name);
        move_uploaded_file( $tmp_name , $target_file );
        $final_img_img = $img_name;
    }else{
        $final_img_img = "default_item.png";
    }

    // echo $product_id."<br>";
    // echo $name."<br>";
    // echo $desc."<br>";
    // echo $price."<br>";
    // echo $categories."<br>";
    // echo $condition."<br>";
    // echo $available."<br>";
    // echo $current_date."<br>";


    $sql = "INSERT INTO `products` (`sid`, `product_id`, `seller_id`, `name`, `image`, `description`, `price`, `condition`, `categories`, `date`, `available`) VALUES (NULL,'$product_id', '".intval($_SESSION['id'])."', '$name', '$final_img_img', '$desc', '$price', '$condition', '$categories', '$current_date', '$available')";

    if ($connect->query($sql) == false) {
        echo "Error: " . $connect->error;
    } else {
        echo "Successful insertion";
        header("Location: sellerpage.php");
    }

?>
