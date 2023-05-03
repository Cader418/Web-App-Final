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
    <title>Update Item</title>

    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <link rel="stylesheet" href="css/seller.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/headers.css">
    <link rel="stylesheet" href="css/forms.css">

</head>
<body ng-app="myApp" ng-controller="updateProductCtrl">
    <?php 
        include('components/header.php');
    ?>
    <div id = "main-card" class="main-card" style="align-items: center;">
		<form action="process_update_product.php" method="post" style="width: 50%;" enctype="multipart/form-data">
            <div id="alert" class="alert alert-warning fade-in" role="alert" hidden>
                Fill all the fields!
            </div>
			<div class="mb-3">
                <label for="name" class="form-label" style="float: left;">NAME</label>
                <input type="text" class="form-control" id="name" name="name" value="{{product.name}}">
            </div>
			<div class="form-group">
                <label for="image">IMAGE</label><br>
                <div style="display:flex;margin-bottom:20px;justify-items:center; align-items:center;">
                    <input type="file" class="form-control-file" name="image" style="border: 0px !important;" id="image" accept="image/png, image/gif, image/jpeg">
                    <button class="nobtnstyle" type="button" ng-click="removePicture()">{{product.image}}</button>
                </div>
            </div>
            <div class="form-group">
                <label for="desc">DESCRIPTION</label>
                <textarea class="form-control" id="desc" rows="3" name="desc">{{product.description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label" style="float: left;">PRICE</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{product.price}}" >
            </div>
            <label for="condition" class="form-label" >QUALITY</label>
			<select class="form-select" name="condition" id="condition">
                <option value="">Select...</option>
                <option id="option1" value="1">1</option>
                <option id="option2" value="2">2</option>
                <option id="option3" value="3">3</option>
                <option id="option4" value="4">4</option>
                <option id="option5" value="5">5</option>
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
            <div class="form-check" id="available_check">
                <input name="available" class="form-check-input" type="checkbox" value="" id="available" checked="true">
                <label class="form-check-label" for="flexCheckDefault">
                  Available
                </label>
            </div>
			<br>
            <input name="no_picture" type="hidden" value="" id="no_picture" >
            <input name="image_value" type="hidden" value="" id="image_value" >
            <input name="p_id" type="hidden" value="{{product.product_id}}" id="p_id" >
            <input name="submit" type="hidden" value="" id="submit" >
			<button id="originalSubmit" class="active_btn" type="submit" hidden></button>
			<button id="fakeOne" class="active_btn" type="button" ng-click="submitBtn('submit')">UPDATE</button><br>
			<button id="cancel" class="active_btn cancelbtn" type="button" ng-click="submitBtn('cancel')">CANCEL</button><br>
			<button id="cancel" class="active_btn deletebtn" type="button" ng-click="submitBtn('delete')">DELETE</button>
		</form>
	</div>
    <script src="js/angularJS.js"></script>
    <?php include("footer.php"); ?>
</body>
<!-- <script src="js/myjavascript.js" ></script> -->
</html>