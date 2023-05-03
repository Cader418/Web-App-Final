<?php 
  session_start();
  include("connection_db.php");
  if (!isset($_SESSION['id'])){
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/headers.css">
    <title>Home</title>

    <link rel="icon" type="image/x-icon" href="img/logo.png">
</head>
<body ng-app="myApp" ng-controller="homepageCtrl">

    <?php include('components/header.php') ?>


    <div id="carouselExampleDark" class="carousel carousel-dark slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="img/others/banner1.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p> -->
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="img/others/banner1.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p> -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/others/banner1.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> -->
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="contents">
      <p class="subtext">
        Products
      </p>
      <hr>
      
      <div class="grid-container">
        <!-- cade view item form -->
        <form id="sendId" action="marketplace-item-info.php" method="post" style="display:none;">
            <input type="hidden" id="item_id" name="item_id" required>
        </form>
        <!-- cade view item form -->

        <!-- cade cart form -->
        <form id="sendIdCart" action="marketplace-cart.php" method="post" style="display:none;">
            <!-- <input type="hidden" id="sessid" name="sessid" required> -->
        </form>
        <!-- cade cart form -->
        <div class="product-card" ng-repeat="x in products" ng-click = "itemInfofunction(x.product_id)">
          <div class="product-card-img" style="background-image: url('img/products/{{x.image}}'); "></div>
          <div class="card-content">
            <div class="card-title"> {{trimText(x.name)}} </div>
            
            <img ng-repeat="y in lengthOfCondition(x.condition) track by $index " src="img/thumbs_up_filled.png" alt="thumbs_up_filled.png">
            <img ng-repeat="j in lengthOfCondition(5 - x.condition) track by $index " src="img/thumbs_up_empty.png" alt="thumbs_up_empty.png">

            <div class="card-price">
              ${{x.price}}
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

  <?php include("footer.php"); ?>
</body>
<script>
  function itemInfo(x){
    document.getElementById("item_id").value = x;
    document.getElementById("sendId").submit();
  }
  function toCart(){
    var sessid = <?php echo $_SESSION['id'] ?>;
    document.getElementById("sessid").value = sessid;
    document.getElementById("sendIdCart").submit();
  }
</script>
<script src="js/angularJS.js"></script>
</html>