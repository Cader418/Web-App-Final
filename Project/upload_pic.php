<?php 
    if ($_FILES['image'] != ""){
        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $target_dir = "img/people_pfp/";
        $target_file = $target_dir . basename($img_name);
        move_uploaded_file( $tmp_name , $target_file )
        // if (){
        //     echo "Succ";
        // }else{
        //     echo "NO :( sadasdasdasas";
        // }
    }
?>