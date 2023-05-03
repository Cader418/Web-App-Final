
<!DOCTYPE html>
<html lang="en-US">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <head>
        <title>
            Product
        </title>
        <link rel="stylesheet" href="css\markcss.css" />
        <?php include 'marketplace-init-item-info.php';?>
        
        <link rel="stylesheet" href="css/markcss.css" />
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/headers.css">
        <link rel="icon" type="image/x-icon" href="img/logo.png">
    </head>
    <body bgcolor="F3EAF4" ng-app="myApp" ng-controller="itemCtrl">
    <?php include('components/header.php') ?>
        <div class="container" style="width:80% !important">
        
            <!-- form -->
            <form id="sendId" action="marketplace-add-cart.php" method="post" style="display:none;">
                <input type="hidden" id="item_id" name="item_id" required>
            </form>
            <!-- form -->

            <!-- Banner -->
            <!-- <div class="cHeader">
                    <p1>PRODUCT</p1>
            </div> -->
                <!-- Banner -->

            <div id="hiddenPage" class="hiddenPage">
                <!-- Image -->
                <div id="pageOptLeft" class="pageOptLeft">
                    <div id="pageOptLeftImg" class="pageOptLeftImg">
                        
                    </div>

                    <div id="pageOptLeftScroll" class="pageOptLeftScroll">
                    </div>

                </div>
                <!-- Image -->


                <!-- Info -->
                <div class="pageOptRight">
                    <div id="pageOptRightTop" class="pageOptRightTop">
                        <h2>{{name}}</h2>
                        <h2>${{price}}</h2>
                        <div class="pageOptRightTopDsc">
                            <p2>Description</p2><br>
                            <p1>{{description}}</p1>
                        </div>
                        <div class="pageOptRightTopBtn">
                            <button class="addBtn" ng-click="addCart()">Add to Cart</button>
                        </div>
                    </div>

                    <div id="pageOptRightBottom" class="pageOptRightBottom">

                    </div>
                </div>
                <!-- Info -->
            </div>


        </div>
        <?php include("footer.php"); ?>
    </body>
    <script src="js/angularJS.js"></script>
    <script>
            app.controller('itemCtrl', function($scope) {
               $scope.name;
               $scope.price;
               $scope.description;
               $scope.image;
               $scope.categories;
               // at the bottom of your controller
                var init = function () {
                    document.getElementById('hiddenPage').style.display = "flex";
                    //Convert php lists to JavaScript lists
                    var name = <?php echo json_encode($name) ?>;
                    var price = <?php echo json_encode($price) ?>;
                    var description = <?php echo json_encode($description) ?>;
                    var image = <?php echo json_encode($image) ?>;
                    var categories = <?php echo json_encode($categories) ?>;
                    //Insert info
                    $scope.name = name[0];
                    $scope.price = price[0];
                    $scope.description = description[0];
                    //Add Categories
                    var cats = categories[0].split(",");
                    for(var i = 0; i < cats.length; i++){
                        var catDiv = document.createElement('div');
                        catDiv.setAttribute("class", 'category')
                        catDiv.innerHTML=cats[i];
                        document.getElementById('pageOptRightBottom').appendChild(catDiv);
                    }
                    //Add Images	
                    //Main img
                    var bookImg = document.createElement('img');
                    bookImg.setAttribute("src", "img/products/"+image[0]);
                    bookImg.setAttribute("class", 'pageOptLeftImgImg');
                    document.getElementById("pageOptLeftImg").appendChild(bookImg);
                
                    //Other Imgs
                    for(var i = 0; i < 3; i++){
                        bookImg = document.createElement('img');
                        bookImg.setAttribute("src", "img/products/"+image[0]);
                        bookImg.setAttribute("class", 'pageOptLeftScrollImg');
                        document.getElementById("pageOptLeftScroll").appendChild(bookImg);
                    }	 
                };
                init();
                $scope.addCart = function(){
                    var id = <?php echo json_encode($product_id) ?>;	
                    var cart_prods = <?php echo json_encode($cart_prods) ?>;
                    //check id item exists in cart
                    var found = 0;
                    for(var x = 0; x < cart_prods.length; x++){
                        if(id[0] == cart_prods[x]) found = 1;
                    }
                    if (found == 1){
                        alert("Could not add to Cart :(");
                    }
                    else{
                        alert("Added to Cart!");
                        document.getElementById("item_id").value = id[0];
                        document.getElementById("sendId").submit();
                        
                    }
                }
            });
            /* DO LATER
            function swapImgs(i){
                node.parentNode.removeChild(node);
                var bookImg = document.createElement('img');
                bookImg.setAttribute("src", 'img/books.jpg');
                bookImg.setAttribute("class", 'pageOptLeftImgImg');
                document.getElementById("pageOptLeftImg").appendChild(bookImg);
            }*/
        </script>	
</html>