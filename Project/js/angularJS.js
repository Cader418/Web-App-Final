var app = angular.module('myApp', []);
app.controller('homepageCtrl', function($scope, $http) {
    $scope.condition =[];
    $http.get("get_available_products.php")
    .then(function (response) {
        
        $scope.products = response.data;
    });
    
    $scope.trimText = function(text){
        maxtextLength = 45;
        return ( text.length >= maxtextLength )? text.substring(0,maxtextLength)+"..." :text;
    }
    $scope.lengthOfCondition = function(text){
        return [].constructor(parseInt(text));
    }
    $scope.itemInfofunction =  function(x){
        document.getElementById("item_id").value = x;
        document.getElementById("sendId").submit();
    }
});

app.controller('categoriesCtrl', function($scope, $http) {
    $http.get("get_categories.php")
    .then(function (response) {
      $scope.Categories = response.data;
      console.log();
    });
});

app.controller('searchCtrl', function($scope, $http) {
    $scope.condition =[];
    $scope.itemInfofunction =  function(x){
        document.getElementById("item_id").value = x;
        document.getElementById("sendId").submit();
    }
    $http.get("get_available_products.php")
    .then(function (response) {
        $scope.products = response.data;
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const result = urlParams.toString().split('=');

        const filteredArray = [];
        
        for (let i = 0; i < $scope.products.length; i++) {
            if (result[0] == "category"){
                if ( $scope.products[i].categories.toLowerCase().includes(result[1].toLowerCase())) {
                    filteredArray.push($scope.products[i]);
                }
            }else{
                if ( $scope.products[i].name.toLowerCase().includes(result[1].toLowerCase())) {
                    filteredArray.push($scope.products[i]);
                }
            }

        }
        $scope.products = filteredArray;
    });
    
    $scope.trimText = function(text){
        maxtextLength = 45;
        return ( text.length >= maxtextLength )? text.substring(0,maxtextLength)+"..." :text;
    }
    $scope.lengthOfCondition = function(text){
        return [].constructor(parseInt(text));
    }

});

app.controller('sellerCtrl', function($scope, $http) {
    $http.get("get_products_seller.php")
    .then(function (response) {$scope.products = response.data;});
    $scope.sold_p = [];
    $scope.users = [];


    $scope.redirectToAddProduct = function(){
        window.location.assign('add_product.php');
    }
    $scope.trimText = function(text){
        maxtextLength = 45;
        return ( text.length >= maxtextLength )? text.substring(0,maxtextLength)+"..." :text;
    }
    $http.get("get_sold_products.php")
    .then(function (response) {
        $scope.sold_p = response.data;
    }); 
    $http.get("get_users.php")
    .then(function (response) {
        $scope.users = response.data;
    }); 
    $scope.isAvailable = function(_id){
        var s = $scope.sold_p.find(obj => obj.product_id == _id);
        if( !s ){
            return "100%";
        }
        document.getElementById("edit"+_id).disabled = true;
        return "50%";
    }
    $scope.wasItSold = function(_id){
        var s = $scope.sold_p.find(obj => obj.product_id == _id);
        if( !s ){
            return "unavailable";
        }
        var us = $scope.users.find(obj => obj.user_id == s.user_id);
        document.getElementById("sold"+_id).disabled = true;
        return us.lastname;
    }
});
app.controller('addingProductCtrl',function( $http , $scope ) {
    $scope.cat =[];
    $scope.categories_available = [];
    $scope.value = "";

    $http.get("get_categories.php")
    .then(function (response) {
        response.data.forEach(element => {
            $scope.categories_available.push(element.name);
        });
    });

    $scope.deleteTag = function(item){
        for (let i = 0; i < $scope.cat.length; i++) {
            if($scope.cat[i].toLowerCase() == item){
                document.getElementById(item).remove();
                $scope.cat.splice(i, 1);
            }
        }
    }

    $scope.addToCategory = function(){
        if(!$scope.cat.includes($scope.value) && $scope.value!=""){
            $scope.cat.push($scope.value);
        }
    }
    $scope.submitBtn = function(){
        var t = "";
        const name = document.getElementById("name");
        const image = document.getElementById("image");
        const desc = document.getElementById("desc");
        const price = document.getElementById("price");
        const cond = document.getElementById("condition");
        const avail = document.getElementById("available");
        
        for (let i = 0; i < $scope.cat.length; i++) {
            t+=$scope.cat[i]+ ((i != $scope.cat.length-1)?",":"") ;
        }
        document.getElementById("extraVar").value = t;

        var s = name.value!="" && desc.value!="" && price.value!="" && cond.value !="" && $scope.cat.length>0 ;
        if (s){
            avail.value = (avail.checked )?"true":"false";
            document.getElementById("originalSubmit").click();
        }else{
            document.getElementById("alert").hidden = true;
            document.getElementById("alert").hidden = false;
            // console.log("nose podra broder");
        }
    }
});

app.controller('updateProductCtrl',function( $http , $scope ) {
    $scope.cat =[];
    $scope.categories_available = [];
    $scope.value = "";
    $scope.product =Object;
    $scope.removedPicture = false;
    $scope.sold_p = [];

    $http.get("get_products.php")
    .then(function (response) {
        $scope.products = response.data;
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const result = urlParams.toString().split('=');

        
        for (let i = 0; i < $scope.products.length; i++) {
            if (result[0] == "p_id"){
                if ( $scope.products[i].product_id == result[1]) {
                    $scope.product = $scope.products[i];
                    $scope.cat = [];
                    $scope.products[i].categories.split(",").forEach(element => {
                        $scope.cat.push(element);
                    });
                    
                    // console.log("asdasda: "+$scope.product.condition);
                    document.getElementById("condition").value = $scope.product.condition;
                    document.getElementById("available").checked = ($scope.product.available=="1")?true:false;
                    
                    
                    break;
                }
            }

        }

    });

    

    

    $http.get("get_categories.php")
    .then(function (response) {
        response.data.forEach(element => {
            $scope.categories_available.push(element.name);
        });
    });
    

    $scope.deleteTag = function(item){

        for (let i = 0; i < $scope.cat.length; i++) {
            if($scope.cat[i].toLowerCase() == item){
                document.getElementById(item).remove();
                $scope.cat.splice(i, 1);
            }
        }
    }

    $scope.addToCategory = function(){
        if(!$scope.cat.includes($scope.value) && $scope.value!=""){
            $scope.cat.push($scope.value);
        }
    }
    $scope.submitBtn = function(submitmode){
        var t = "";
        const name = document.getElementById("name");
        const img = document.getElementById("image").value.split(/(\\|\/)/g).pop();
        const desc = document.getElementById("desc");
        const price = document.getElementById("price");
        const cond = document.getElementById("condition");
        const avail = document.getElementById("available");
        document.getElementById("submit").value = submitmode;
        if(img != ""){//image chosen
            $scope.product.image = "";
        }else{
            if($scope.product.image!="")
                document.getElementById("no_picture").value = "false";
            else
                document.getElementById("no_picture").value = "true";
        }
        if(submitmode=="delete"){
            var con = confirm("Do you want to remove this item from your products?");
            if(con == false) return;
        }

        // document.getElementById("image_value").value = ;
        
        for (let i = 0; i < $scope.cat.length; i++) {
            t+=$scope.cat[i]+ ((i != $scope.cat.length-1)?",":"") ;
        }
        // console.log(t);
        document.getElementById("extraVar").value = t;

        var s = name.value!="" && desc.value!="" && price.value!="" && cond.value !="" && $scope.cat.length>0 ;
        if (s){
            
            avail.value = (avail.checked )?"true":"false";
            document.getElementById("originalSubmit").click();
        }else{
            document.getElementById("alert").hidden = true;
            document.getElementById("alert").hidden = false;
            // console.log("nose podra broder");
        }
    }

    $scope.removePicture = function(){
        $scope.removedPicture = confirm("Do you want to remove this picture?");
        $scope.product.image = ($scope.removedPicture)?"":$scope.product.image;
    }


});
