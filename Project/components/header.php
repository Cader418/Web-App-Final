<?php 
    include("check_existing_credentials.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<div class="sticky-top">

  <div class="header">
      <div><a href="homepage.php" class="logo"> <img src="img/logo.png" alt="logo"> </a></div>
      <div class="search-bar">
        <form action="./product_search.php" method="GET">
          <input name="result" class="search-input" placeholder="Search..." type="text">
        </form>
      </div>
      <div>
        <a href="sellerpage.php">
          <img src="img/seller_icon.png" alt="seller">
        </a>
        <a href="marketplace-cart.php"><img src="img/cart_icon@2x.png" alt="cart"></a>
        <a href="profile.php"><img src="img/user_icon@2x.png" alt="profile"></a>
      </div>
  </div>
  <?php include("categories.html");?>
</div>