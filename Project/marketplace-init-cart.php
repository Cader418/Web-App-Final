<?php
    session_start();
    include ("connection_db.php");

    //$uid=($_SESSION['id']);
    //$pwd=($_SESSION['pwd']);

    //List of cart Items
    $sessid = $_SESSION['id'];
    $cart_product_ids = array();
    $product_seller_ids = array();

    //Get product ids of users cart
    $sql1="SELECT * FROM cart where user_id = '".$sessid."'";
    $result1 = $connect->query($sql1);
    while($row1 = $result1->fetch_assoc()){
        $cart_product_ids[] = $row1['product_id'];
    } 

    //User
    $email = array();
    $phone = array();


    //Product    
    $name = array();
    $image = array();
    $price = array();
    $product_id = array();
    $total_price = 0;

    //Get Products
    $sql2="SELECT * FROM `products` ";
    $result2 = $connect->query($sql2);
    $cartItemsInd = 0;
    while($row2 = $result2->fetch_assoc()){
        for ($x = 0; $x < count($cart_product_ids); $x++) {
            if($cart_product_ids != null && $row2['product_id'] == $cart_product_ids[$x]){
                $name[] = $row2['name'];
                $image[] = $row2['image'];
                $price[] = $row2['price'];
                $product_id[] = $row2['product_id'];
                $product_seller_ids[] = $row2['seller_id'];
            }
        }
    }

    //Get Contact
    $sql3="SELECT * FROM `user` ";
    $result3 = $connect->query($sql3);
    $cartItemsInd = 0;
    while($row3 = $result3->fetch_assoc()){
        for ($x = 0; $x < count($product_seller_ids); $x++) {
            if($product_seller_ids != null && $row3['user_id'] == $product_seller_ids[$x]){
                $email[] = $row3['email'];
                $phone[] = $row3['phone'];
                
            }
        }
    }

    for ($x = 0; $x <= count($price)-1; $x++) {
        $total_price = $total_price + $price[$x];
    }

    //Product    
    /*$product_id = array();
    $seller_id = array();
    $name = array();
    $image = array();
    $description = array();
    $price = array();
    $categories = array();
    $date = array();

    //Get Products
    $sql1="SELECT * FROM `products` ";
    $result1 = $connect->query($sql1);
    while($row1 = $result1->fetch_assoc()){
        $product_id[] = $row1['product_id'];
        $seller_id[] = $row1['seller_id'];
        $name[] = $row1['name'];
        $image[] = $row1['image'];
        $description[] = $row1['description'];
        $price[] = $row1['price'];
        $categories[] = $row1['categories'];
        $date[] = $row1['date'];
    } */

    /*
    $courses = array();
    $majors = array();

    //Courses
    $course_name = array();
    $fac_id = array();
    $offered_in = array();
    $credits = array();
    $pre_req = array();
    $type = array();

    //get student id
    $sql1="SELECT * FROM student_tab where psw='".$pwd."'";
    $result1 = $connect->query($sql1);
    $row1 = $result1->fetch_assoc();
    $stuid = $row1['stu_id'];

    //Get courses of Student
    $sql2="SELECT * FROM `registration_tab` where stu_id='".$stuid."'";
    $result2 = $connect->query($sql2);
    while($row2 = $result2->fetch_assoc()){
        $courses[] = $row2['course_id'];
    } 

    //Get major of Student
    $sql22="SELECT * FROM `student_tab` where stu_id='".$stuid."'";
    $result22 = $connect->query($sql22);
    while($row22 = $result22->fetch_assoc()){
        $majors[] = $row22['stu_major'];
    } 

    //Get Courses Information
    for ($x = 0; $x < count($courses); $x++) {
        $sql3="SELECT * FROM courses_tab where course_id = '".$courses[0]."'";
        $result3 = $connect->query($sql3);
        while($row3 = $result3->fetch_assoc()){
            $course_name[] = $row3['course_name'];
            $fac_id[] = $row3['fac_id'];
            $offered_in[] = $row3['offered_in'];
            $credits[] = $row3['credits'];
            $pre_req[] = $row3['pre_req'];
            $type[] = $row3['type'];
        }
    }

    //FACULTY

    //Faculty
    $faculty_name = array();
    $fac_DOJ = array();
    $qual = array();
    $department = array();

    $sql4="SELECT * FROM `faculty_tab` where department = '".$majors[0]."'";
    $result4 = $connect->query($sql4);
    while($row4 = $result4->fetch_assoc()){
        $faculty_name[] = $row4['fac_name'];
        $fac_DOJ[] = $row4['fac_DOJ'];
        $qualification[] = $row4['qualification'];
        $department[] = $row4['department'];
    } 

    //STUDENT

    //student
    $student_name = array();
    $major = array();
    $GPA = array();
    $YOG = array();
    $YOE = array();

    $sql5="SELECT * FROM `student_tab` where stu_id='".$stuid."'";
    $result5 = $connect->query($sql5);
    while($row5 = $result5->fetch_assoc()){
        $student_name[] = $row5['stu_name'];
        $major[] = $row5['stu_major'];
        $GPA[] = $row5['GPA'];
        $YOE[] = $row5['stu_year_of_enrollment'];
        $YOG[] = $row5['year_of_graduation'];
    } 
    */
?>