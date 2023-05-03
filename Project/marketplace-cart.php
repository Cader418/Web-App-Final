<!DOCTYPE html>
<html>

    <head>
        <title>
            Your Cart
        </title>
        <link rel="stylesheet" href="css/markcss.css" />
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/headers.css">
        <link rel="icon" type="image/x-icon" href="img/logo.png">
        <?php include 'marketplace-init-cart.php';?>
        <script>
            function addItems(){
                var name = <?php echo json_encode($name) ?>;
                var price = <?php echo json_encode($price) ?>;
                var image = <?php echo json_encode($image) ?>;
                var product_id = <?php echo json_encode($product_id) ?>;
                for(var x = 0; x<name.length; x++){
                    var pageOptScrollOpt= document.createElement("div");
                    pageOptScrollOpt.classList.add("pageOptScrollOpt");
                    var pageOptScrollOptLeftSide = document.createElement("div");
                    pageOptScrollOptLeftSide.classList.add("pageOptScrollOptLeftSide");
                    var pageOptScrollOptImg = document.createElement("div");
                    pageOptScrollOptImg.classList.add("pageOptScrollOptImg");

                        var bookImg = document.createElement('img');
                        bookImg.setAttribute("src", 'img/products/' + image[x]);
                        bookImg.setAttribute("width", 74);
                        pageOptScrollOptImg.appendChild(bookImg);

                    var pageOptScrollOptName = document.createElement("div");
                    pageOptScrollOptName.classList.add("pageOptScrollOptName");
                    pageOptScrollOptName.textContent=name[x];

                    var pageOptScrollOptRightSide = document.createElement("div");
                    pageOptScrollOptRightSide.classList.add("pageOptScrollOptRightSide");
                    var pageOptScrollOptPrice= document.createElement("div");
                    pageOptScrollOptPrice.classList.add("pageOptScrollOptPrice");
                    pageOptScrollOptPrice.textContent=price[x];
                    var remBtn = document.createElement("button");
                    remBtn.textContent="Remove";
                    remBtn.classList.add("remBtn");
                    remBtn.id = x;
                    remBtn.setAttribute( "onClick", "javascript: remItem(this);" );
                    
                    pageOptScrollOptLeftSide.appendChild(pageOptScrollOptImg);
                    pageOptScrollOptLeftSide.appendChild(pageOptScrollOptName);
                    pageOptScrollOptRightSide.appendChild(pageOptScrollOptPrice);
                    pageOptScrollOptRightSide.appendChild(remBtn);
                    pageOptScrollOpt.appendChild(pageOptScrollOptLeftSide);
                    pageOptScrollOpt.appendChild(pageOptScrollOptRightSide);
                    pageOptScrollOpt.id = x+"con";
                    pageOptScrollOpt.name = product_id[x];
                    document.getElementById("pageOptScroll").appendChild(pageOptScrollOpt);
                }
            }
            function remItem(x){
                var id = x.id+"con";
                document.getElementById("product_id").value = document.getElementById(id).name;
                document.getElementById(id).remove();
                document.getElementById("sendId").submit();
            }
            function purchase(){
                //make background dark
                // document.getElementById("page").style.filter = "brightness(50%)";
                // document.getElementById("cHeader").style.filter = "brightness(50%)";
                // document.body.style.backgroundColor="#6b616c";
                //convert to js lists
                var email = <?php echo json_encode($email) ?>;
                var phone = <?php echo json_encode($phone) ?>;
                console.log(document.getElementById("overlay").style.display);
                document.getElementById("overlay").hidden= false;

                console.log(document.getElementById("overlay").style.display);
                //display info
                for(var x = 0; x<email.length; x++){
                    var h = document.createElement("h1");
                    h.innerHTML = "Item " + (x+1);
                    document.getElementById("contact-info").appendChild(h);
                    var par = document.createElement("p");
                    par.innerHTML = (email[x] + "<br>" + phone[x]);
                    document.getElementById("contact-info").appendChild(par);
                }
                var b = document.createElement("button");
                b.textContent="OK";
                b.classList.add("conBtn");
                b.setAttribute('onclick','purchasephp()')
                document.getElementById("contact-info").appendChild(b);
                document.getElementById("contact-info").style.display = "block";
            }
            function purchasephp(){
                document.getElementById("sendIdPurchase").submit();
            }
            function addInfo(){
                //for(var i = 0; i < 8; i++){
                    // var newItem = document.createElement('div');
                    // newItem.className = 'pageOptScrollOpt';
                    //  document.getElementById('pageOptScroll').appendChild(newItem);
                    /*var bookImg = document.createElement('img');
                    bookImg.setAttribute("src", 'img/books.jpg');
                    bookImg.setAttribute("height", 115);
                    document.getElementById('dum').appendChild(bookImg);*/
                //}
            }
        </script>
    </head>
    <div>
        <div ng-app="myApp" ng-controller="homepageCtrl" >
        
            <body onload="addItems()">
                <?php include('components/header.php') ?>
                <div class="container">
                        <!-- form -->
                        <form id="sendId" action="marketplace-remove-cart.php" method="post" style="display:none;">
                            <input type="hidden" id="product_id" name="product_id" required>
                        </form>
                        <!-- form -->
                        <!-- form -->
                        <form id="sendIdPurchase" action="marketplace-purchase.php" method="post" style="display:none;">
                        </form>
                        <!-- form -->
                        <!-- Banner -->
                        <!-- <div id="cHeader" class="cHeader">
                            <p1>CART</p1>
                        </div> -->
                        <!-- Banner -->
                        <div id="page" class="page">
                            <!-- Cart -->
                            <div id="pageOptScroll" class="pageOptScroll">
                                
                            </div>
                            <!-- Cart -->
                            <!-- CHECKOUT -->
                            <div class="pageOpt">
                                <div>
                                    <h1>Total: $<?php echo $total_price ?></h1><br>
                                    <p1>Payment Method</p1><br>
                                    <select>
                                        <option>Mastercard</option>
                                        <option>Visa</option>
                                    </select><br>
                                    <button class="purchase_btn" onclick="purchase()" >Purchase</button>
                                </div>
                            </div>
                            <!-- CHECKOUT -->
                        </div>
                        <!-- Contact -->
                        <div id="contact-info" class="contact-info">
                        </div>
                        <div class="overlay" id="overlay" hidden>
                        </div>
                        <!-- Contact -->


                    </div>
                <?php include("footer.php"); ?>
            </body>
        </div>
    </div>
    <script src="js/angularJS.js"></script>
</html>