<?php 
	session_start(); 
	if(isset( $_SESSION['id'])){
		header("Location: homepage.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="javascript" href="codejs.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<br><br>
<div class="box">
	<div class="rowbox" style="padding-bottom:30px; justify-content: space-evenly;">
		<div class="accessbtn">
			<a onclick="activate_login()">LOGIN</a>
		</div>
		<div class="accessbtn">
			<a onclick="activate_singup()">SIGN UP</a>
		</div>
	</div>
	<div id = "login_section" class="login-section">
		<form action="process_credentials.php" method="post" >
			<label for="username">USERNAME</label>
			<input type="text" name="username" id="username">
			<label for="password">PASSWORD</label>
			<div class="input-flex">
				<input id="input_password_login" class="password-input" type="password" name="password" id="password">
				<button id="show_btn_login" class="show-password" type="button">
					<i id="open_eye_login" class="fa fa-eye" style="font-size:24px;color:rgb(255, 255, 255)"></i>
					<i id="slash_eye_login" class="fa fa-eye-slash" style="font-size:24px;color:rgb(255, 255, 255); display: none;"></i>
				</button>
			</div>
			<label for="username">Forgot your password?</label>
			<input type="hidden" name="type" value="login" />
			<br>
			<button type="submit">LOGIN</button>
		</form>
	</div>
	<div id = "signup_section" class="login-section" style="display: none;">
		<form action="process_credentials.php" method="post">
			<label for="username">FIRSTNAME</label>
			<input type="text" name="firstname" id="firstname">

			<label for="lastname">LASTNAME</label>
			<input type="text" name="lastname" id="lastname">

			<label for="address">ADDRESS</label>
			<input type="text" name="address" id="username">

			<label for="username">USERNAME</label>
			<input type="text" name="username" id="username">

			<label for="password">PASSWORD</label>
			<div class="input-flex">
				<input id="input_password_signup" class="password-input" type="text" name="password" id="password">
				<button id="show_btn_signup" class="show-password" type="button">
					<i id="open_eye_signup" class="fa fa-eye" style="font-size:24px;color:rgb(255, 255, 255)"></i>
					<i id="slash_eye_signup" class="fa fa-eye-slash" style="font-size:24px;color:rgb(255, 255, 255); display: none;"></i>
				</button>
			</div>

			<label for="email">EMAIL</label>
			<input type="text" name="email" id="email">
			<input type="hidden" name="type" value="signup" />
			<br>
			<button type="submit">SIGN UP</button>
		</form>
	</div>
	<div>
	</div>
</div>

</body>
</html>
<script src="js/login.js"></script>