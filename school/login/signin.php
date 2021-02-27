<!DOCTYPE html>
<html lang="en">
<?php
  include('../include/DB.php');
 ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Mutware Educate - Signin</title>

  <!-- Favicons -->
  <link href="img/mutware icon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Mutware
    Template URL: https://templatemag.com/Mutware-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT

      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="post" enctype="multipart/form-data">
        <h2 class="form-login-heading">Sign in now</h2>
        <div class="login-wrap">
          <input type="email" name="email" class="form-control" placeholder="School Email" autofocus>
          <br>
          <input type="password" name="password" class="form-control" placeholder="*************">
          <label class="checkbox">
            <span class="pull-right">
            <a data-toggle="modal" href="login.php#myModal"> Forgot Password?</a>
            </span>
            </label>
            <input style="background:#0f181b;border:none" class="btn btn-theme btn-block" type="submit" name="login" value="Login">
          <hr>
        </div>
        </form>
        <?php
					if (isset($_POST['login'])) {
						$email = $_POST['email'];
						$password = $_POST['password'];
						if (DB::query('SELECT email FROM schools WHERE email = :email', array(':email'=>$email))) {
							if (password_verify($password , DB::query('SELECT password FROM schools WHERE email=:email', array(':email'=>$email))[0]['password'])) {
								$cstrong = True;
								$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
								$schl_id = DB::query('SELECT id FROM schools WHERE email=:email', array(':email'=>$email))[0]['id'];
								DB::query('INSERT INTO school_logins VALUES(\'\', :schl_id,:logins)', array(':schl_id'=>$schl_id,':logins'=>sha1($token)));
								setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
								setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
								echo "<h1><script>alert('Welcome, click OK to continue')</script></h1>";
								echo "<script>window.open('../index.php', '_self')</script>";
							}else {
								echo "<script>alert('Unknown Password')</script>";
							}
						}else {
							echo "<script>alert('Unknown User and Wrong password')</script>";
						}
				}
				 ?>
        <!-- Modal -->
        <form class="" action="" method="post">
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div style="background:#0f181b" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button style="background:#0f181b;border:none;" class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/logi-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
