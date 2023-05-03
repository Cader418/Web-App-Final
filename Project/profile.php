
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/headers.css">
    <link rel="stylesheet" href="css/profile.css">

    <link rel="icon" type="image/x-icon" href="img/logo.png">
</head>
<body ng-app="myApp">

    <?php include('components/header.php') ?>

    <?php 
        $sql = "SELECT * FROM user WHERE user_id = {$_SESSION['id']};";
        $result = $connect -> query($sql);
        $row = $result -> fetch_assoc();
    ?>
    
    <form action="change_profile.php" method= "POST" enctype="multipart/form-data">
        <div class="main-card">
            <div class="container1" style="flex: 0; align-items: center;">
                <p class="subtext" style="padding-top: 0px;">
                    Profile
                </p>
                <div style="flex: 1;">
                    <form action="leave_session.php" method="POST">
                        <button type="submit" id="logout" name="logout"  class="nobtnstyle" style="float:right; color: red;" >Log out</button>
                    </form>
                    <button type="button" id="editbtn" class="nobtnstyle" style="float:right;" >Edit</button>
                </div>
            </div>
            <hr>
            <br>
            <div class="container1" style="justify-items:center;">
                <div class="item1">
                    <div class="container2" style="align-items: center;" >
                        <div id="pfp" class="pfp" style="background-image: url('img/people_pfp/<?php echo ($row['image'] !="")?$row['image']:"man-user.png"; ?>');">
                        </div>
                        <div>
                            <input id="realfile" name="image" type="file"  hidden="hidden" accept="image/png, image/gif, image/jpeg">
                            <button type="button" id="change_picture" class="nobtnstyle" hidden>Change picture</button>
                        </div>
                    </div>
                </div>
                <div class="container2"> 
                    <div class="item2"> <?php echo $row['firstname']." ".$row['lastname'] ; ?> </div>
                    <div class="container1">
                        <div class="item3">
                            <label for="firstname">First Name</label>
                            <input name = "firstname" placeholder="First Name" id = "firstname" value = "<?php echo $row['firstname']; ?>" readonly/>
                            <label for="lastname">Last Name</label>
                            <input name = "lastname" placeholder="Last Name" id = "lastname" value = "<?php echo $row['lastname']; ?>" readonly/>
                            <label for="address">Address</label>
                            <input name = "address" placeholder="Address" id = "address" value = "<?php echo $row['address']; ?>" readonly/>
                        </div>
                        <div class="item4">
                            <label for="email">Email</label>
                            <input name = "email" placeholder="Email" id = "email" value="<?php echo $row['email']; ?>" readonly/>
                            <label for="username">User Name</label>
                            <input name = "username" placeholder="User name" id = "username" value="<?php echo $row['username']; ?>" readonly/>
                            <label for="password">Password</label>
                            <input name = "password" placeholder="Password" id = "password" value="<?php echo $row['password']; ?>" readonly/>
                            <label for="password">Phone</label>
                            <input name = "phone" placeholder="XXX-XXX-XXXX" id = "phone" value="<?php echo $row['phone']; ?>" readonly/>
                            <div class="box-case">
                                <button name="submit" type="submit" class="submitbtn" id="submitprofile" style="display: none;">Change</button>
                                <button type="button" class="submitbtn cancelbtn" id="cancelprofile" style="display: none;" >Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php include("footer.php"); ?>
</body>
<script src="js/angularJS.js"></script>
<script src="js/myjavascript.js" ></script>
</html>