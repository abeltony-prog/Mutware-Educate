<!DOCTYPE html>
<html lang="en">
<?php
  include('include/DB.php');
 ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Mutware - Signin</title>

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
          <input type="email" name="email" class="form-control" placeholder="Student Email" autofocus>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Student Password">
          <label class="checkbox">
            <span class="pull-right">
            <a data-toggle="modal" href="login.php#myModal"> Forgot Password?</a>
            </span>
            </label>
            <input style="background:#0f181b;border:none" class="btn btn-theme btn-block" type="submit" name="signin" value="Login">
          <hr>
        </div>
        </form>
        <?php
          if (isset($_POST['signin'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            //$p = DB::query('SELECT fullname FROM user WHERE password=:password', array(':password'=>$password))[0]['fullname'];
            //print_r($p);
            //$one = DB::query('SELECT department_id FROM user WHERE fullname=:fullname', array(':fullname'=>$fullname))[0]['department_id'];
            //$two = DB::query('SELECT department FROM department WHERE id = :one', array(':one'=>$one))[0]['department'];
            //$p = DB::query('SELECT * FROM user WHERE id = :two',  array(':two'=>$two));
            if (DB::query('SELECT email FROM students WHERE email = :email', array(':email'=>$email))) {
              if (password_verify($password , DB::query('SELECT password FROM students WHERE email=:email', array(':email'=>$email))[0]['password'])) {
                $cstrong = True;
                $status = "1";
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                $schl_id = DB::query('SELECT schl_id FROM students WHERE email=:email', array(':email'=>$email))[0]['schl_id'];
                $dep_id = DB::query('SELECT dep_id FROM students WHERE email=:email', array(':email'=>$email))[0]['dep_id'];
                $std_id = DB::query('SELECT id FROM students WHERE email=:email', array(':email'=>$email))[0]['id'];
                DB::query('INSERT INTO logins VALUES(\'\', :schl_id, :department_id,:std_id, :token)', array(':schl_id'=>$schl_id,':department_id'=>$dep_id,':std_id'=>$std_id,':token'=>sha1($token)));
                setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
                setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
                DB::query('UPDATE students SET status=:status WHERE email=:email', array(':status'=>$status,':email'=>$email));
                echo "<script>window.open('index.php', '_self')</script>";
              }else {
                echo "<script>alert('Unknown Password')</script>";
              }
            }else {
              echo "<script>alert('Unknown User and Wrong password')</script>";
            }
        }
         ?>
        <!-- Modal -->
        <form class="" action="index.php" method="post">
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
