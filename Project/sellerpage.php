<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller</title>
    <link rel="stylesheet" href="css/seller.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/headers.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
</head>
<body ng-app="myApp" ng-controller="sellerCtrl">
    
    <?php include('components/header.php') ?>
    <div class="contents">
        <div class="sub_header">
            <p class="subtext" style="flex: 1;">
                Your products
            </p>
            <div style="width: 20%;">
                <button class="new_item" ng-click="redirectToAddProduct()">Post New Item</button>
            </div>
        </div>
        

        <hr>
        <div class="list-container">

            <div ng-repeat="x in products" class="container" style="width:75% !important; opacity:{{isAvailable(x.product_id)}};">
                <div class="content" >
                    <div class="picture" style="background-image: url(img/products/{{x.image}});">
                    </div>
                    <div class="name">
                        <p title="{{x.name}}" class="max-lines">{{trimText(x.name)}}</p>
                    </div>
                    <div class="price">${{x.price}}</div>
                    <div class="sold-to">
                        <small style="opacity: 50%;">sold to:</small><br>
                        <div id="sold{{x.product_id}}">
                            {{(x.available == "1")?"-":wasItSold(x.product_id)}}
                        </div>
                    </div>
                    <div class="available">{{(x.available == "1")?"ONLINE":"SOLD"}}</div>
                    <div class="edit">
                        <form action="update_product.php" method="GET">
                            <input type="hidden" name="p_id" value="{{x.product_id}}" >
                            <button class="nobtnstyle" id="edit{{x.product_id}}">
                                <i class='far fa-edit' style='font-size:17px'></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="bottom" style="background-color: rgb({{(x.available == '0')?'163, 42, 42':'48, 169, 68'}});"></div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
<script src="js/angularJS.js"></script>