<?php 
    session_start(); 
    include("connection_db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/headers.css">
</head>
<body ng-app="myApp" ng-controller="searchCtrl">
  <?php include('components/header.php') ?>
  <?php $search_result = $_GET['result'];?>
  <div class="contents">
    <p class="subtext">
      <?php 
        if(isset( $_GET['category'] )){
          echo "\"".$_GET['category']."\" category";
        }else if (isset( $_GET['result'] )){
          echo "\"".$_GET['result']."\"";
        }
      ?>
    </p>
    <hr>
    <div class="grid-container">
      <form id="sendId" action="marketplace-item-info.php" method="post" style="display:none;">
        <input type="hidden" id="item_id" name="item_id" required>
      </form>
      <div class="product-card" ng-repeat="x in products" ng-click = "itemInfofunction(x.product_id)">
        <div class="product-card-img" style="background-image: url('img/products/{{x.image}}'); "></div>
        <div class="card-content">
          <div title="{{x.name}}" class="card-title"> {{trimText(x.name)}} </div>
          
          <img ng-repeat="y in lengthOfCondition(x.condition) track by $index " src="img/thumbs_up_filled.png" alt="thumbs_up_filled.png">
          <img ng-repeat="j in lengthOfCondition(5 - x.condition) track by $index " src="img/thumbs_up_empty.png" alt="thumbs_up_empty.png">

          <div class="card-price">
            ${{x.price}}
          </div>
        </div>
      </div>

    </div>
  </div>
  <?php include("footer.php"); ?>
</body>
<script src="js/angularJS.js"></script>
</html>