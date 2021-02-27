<!DOCTYPE html>
<?php include('Include/DB.php'); ?>
<html lang="en">
<head>
	<title>Mutware</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="loginCss/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="loginCss/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="loginCss/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="loginCss/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="loginCss/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="loginCss/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="loginCss/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="loginCss/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="loginCss/css/util.css">
	<link rel="stylesheet" type="text/css" href="loginCss/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>
				</form>
				<?php
					if (isset($_POST['login'])) {
						$username = $_POST['username'];
						$password = $_POST['pass'];
						//$p = DB::query('SELECT fullname FROM user WHERE password=:password', array(':password'=>$password))[0]['fullname'];
						//print_r($p);
						//$one = DB::query('SELECT department_id FROM user WHERE fullname=:fullname', array(':fullname'=>$fullname))[0]['department_id'];
						//$two = DB::query('SELECT department FROM department WHERE id = :one', array(':one'=>$one))[0]['department'];
						//$p = DB::query('SELECT * FROM user WHERE id = :two',  array(':two'=>$two));
						if (DB::query('SELECT username FROM admin WHERE username = :username', array(':username'=>$username))) {
							if (DB::query('SELECT password FROM admin WHERE username=:username', array(':username'=>$username))[0]['password']) {
								$cstrong = True;
								$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
								$admin_id = DB::query('SELECT id FROM admin WHERE username=:username', array(':username'=>$username))[0]['id'];
								DB::query('INSERT INTO admin_logins VALUES(\'\', :admin_id,:logins)', array(':admin_id'=>$admin_id,':logins'=>sha1($token)));
								setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
								setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
								echo "<h1><script>alert('Welcome ".$username.", click OK to continue')</script></h1>";
								echo "<script>window.open('index.php', '_self')</script>";
							}else {
								echo "<script>alert('Unknown Password')</script>";
							}
						}else {
							echo "<script>alert('Unknown User and Wrong password')</script>";
						}
				}
				 ?>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
