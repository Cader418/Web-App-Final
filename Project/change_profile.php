<?php 
    session_start(); 
    
    if(isset( $_POST['logout'] )){
        include("leave_session.php");
        return;
    }    
    
    include("connection_db.php");

    $firtsname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $img_name=$_FILES['image']['name'];
    echo $img_name."s<br>";
    if ($img_name!= ""){
        $tmp_name = $_FILES['image']['tmp_name'];
        $target_dir = "img/people_pfp/";
        $target_file = $target_dir . basename($img_name);
        move_uploaded_file( $tmp_name , $target_file );
    }else{
        $sql = "SELECT * FROM user WHERE user_id = {$_SESSION['id']};";
        $result = $connect -> query($sql);
        $row = $result -> fetch_assoc();
        $img_name = $row['image'];
    }
    $sql4 = "UPDATE 
                `user` 
            SET 
                firstname='".$firtsname."',
                lastname='".$lastname."',
                address='".$address."',
                email='".$email."',
                username='".$username."',
                password='".$password."',
                image ='".$img_name."',
                `phone` ='".$phone."'
            WHERE user_id='".$_SESSION['id']."'";

    if ($connect->query($sql4) === TRUE) {
        echo "Record updated successfully";
        header("Location: profile.php");
    } else {
        echo "Error updating record: " . $connect->error;
    }

?>