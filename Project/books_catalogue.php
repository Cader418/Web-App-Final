<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/myscript.js" ></script>
    <title>Catalogue</title>
</head>
<body>
    <?php 
        include('components/header.html')
    ?>
    <?php 
        include('components/banner.html')
    ?>
    
    <div class="grid-container" id="grid-container">
        <?php
            include("connection_db.php");
            $sql2 = "SELECT * FROM book_tab";
            $result2 = $connect -> query($sql2);
            while ($row2 = $result2->fetch_assoc()) {
                echo "<div class=\"card\"><div class=\"card_img\"><img src=\"".$row2['cover_pic']."\" alt=\"".$row2['book_id']."\"></div>".$row2['book_title']." - ".$row2['price']."</div>";
            }

        ?>
        
    </div>
    
</body>
</html>