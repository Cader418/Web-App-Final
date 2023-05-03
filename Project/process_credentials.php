<?php
include("connection_db.php");
session_start();
if ($_POST['type'] == 'login'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username.'<br>';
    echo $password.'<br>';

    $sql = "SELECT * FROM user";
    $result = $connect -> query($sql);

    while($row = $result -> fetch_assoc()){
        if ($row['username'] == $username && $row['password'] == $password){
            $_SESSION['id'] = $row['user_id'];
            header("Location: homepage.php");
            return;
        }
        header("Location: login.php");
    }
}else{
    $user_id = strval(rand(10000, 99999));
    $firtsname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $firtsname.'<br>';
    echo $lastname.'<br>';
    echo $address.'<br>';
    echo $email.'<br>';
    echo $username.'<br>';
    echo $password.'<br>';

    $sql = "INSERT INTO user (user_id, firstname, lastname, username, password,email, address,phone,image ) VALUES ('$user_id', '$firtsname', '$lastname', '$username', '$password', '$email', '$address','','' )";
	$result = $connect->query($sql);
	if ($result == FALSE){
		echo "Error: ".$connect->error;
	}else {
		echo "Successful insertion";
        session_start();
        $_SESSION['id'] = $user_id;
        header("Location: homepage.php");
	}
}
?>