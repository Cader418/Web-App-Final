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
    <title>Add New Item</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <link rel="stylesheet" href="css/seller.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/headers.css">
    <link rel="stylesheet" href="css/forms.css">

</head>
<body ng-app="myApp">
    
    
    <?php include('components/header.php') ?>
    <div id = "main-card" class="main-card" ng-controller="addingProductCtrl" style="align-items: center;">
		<form action="process_new_product.php" method="post" style="width: 50%;" enctype="multipart/form-data">
			<div class="mb-3">
                <label for="name" class="form-label" style="float: left;">NAME</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
			<div class="form-group">
                <label for="image">IMAGE</label><br>
                <!-- <label for="image">Example file input</label> -->
                <input type="file" class="form-control-file" name="image" style="border: 0px !important;" id="image" accept="image/png, image/gif, image/jpeg">
                <!-- <input id="realfile" name="image" type="file"  hidden="hidden" accept="image/png, image/gif, image/jpeg">
                <button type="button" id="change_picture" class="nobtnstyle" >Change picture</button> -->
            </div>

            <div class="form-group">
                <label for="desc">DESCRIPTION</label>
                <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label" style="float: left;">PRICE</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" >
            </div>
            <label for="condition" class="form-label" >QUALITY</label>
			<select class="form-select" name="condition" id="condition">
                <option selected value="">Select...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="categories" class="form-label" style="margin-top: 17px;" >CATEGORIES</label>
			<select class="form-select" name="categories" ng-change="addToCategory()" ng-model="value">
                <option ng-repeat="u in categories_available track by $index" value="{{u}}" >{{u}}</option>
            </select>  
            <div style="padding: 10px;">
                <button id="{{x.toLowerCase()}}" ng-click="deleteTag(x.toLowerCase())" type="button" class="active_btn" style="float:left;margin: 5px;" ng-repeat="x in cat" >
                    {{x}}
                </button>
            </div>
            <input type="hidden" name="extraVar" id="extraVar" value="">
            <div class="form-check">
                <input name="available" class="form-check-input" type="checkbox" value="" id="available" checked="true">
                <label class="form-check-label" for="flexCheckDefault">
                  Available
                </label>
            </div>
            <div id="alert" class="alert alert-warning fade-in" role="alert" hidden>
                Fill all the fields!
            </div>
			<br>
			<button id="originalSubmit" class="active_btn" type="submit" hidden></button>
			<button id="fakeOne" class="active_btn" type="button" ng-click="submitBtn()">ADD</button>
		</form>
	</div>
    <script>
        var cat = [];
        var app = angular.module('myApp', []);
        
    </script>

    
<?php include("footer.php"); ?>
</body>
<script src="js/angularJS.js" ></script>
</html>