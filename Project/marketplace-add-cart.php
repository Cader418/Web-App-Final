<?php 
    session_start();
    include ("connection_db.php");
    $product_id = $_POST['item_id']; 
    echo $product_id;
    $sess_id = $_SESSION['id'];
    
    $sql = "INSERT INTO cart (user_id, product_id) 
        VALUES ('$sess_id', '$product_id')";   
        
    $result = $connect->query($sql);

    if ($result == FALSE){
        include('add-student-error.php');
    }
    else{ header('location: /Project/homepage.php');}

    /*
    if($stu_id == null || $stu_name == null || $YOE == null || $stu_major == null || $GPA == null || $YOG == null || $uid == null || $psw == null){
        $done = FALSE;
        include('add-student-error.php');
    }
    else{

        
        $sql = "INSERT INTO student_tab (sid, stu_id, stu_name, stu_year_of_enrollment, stu_major, GPA, year_of_graduation, psw) 
        VALUES ('', '$stu_id', '$stu_name', '$YOE', '$stu_major', '$GPA', '$YOG', '$psw')";   
        
        $result = $connect->query($sql);

        if ($result == FALSE){
            include('add-student-error.php');
        }

        $sql = "INSERT INTO users_tab (sid, userid, password, role) 
        VALUES ('', '$uid', '$psw', 'S')";   
        
        $result = $connect->query($sql);

        if ($result == FALSE){
            include('add-student-error.php');
        }
        else{ header('location: /lab5/ind.php');}
    }*/

?>