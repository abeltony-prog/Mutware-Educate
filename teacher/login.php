<!DOCTYPE html>
<html lang="en">
<?php
  include('Include/DB.php');
 ?>
<head>
  <meta charset="utf-8">
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
        <h2 style="background:#0f181b;" class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" name="email" class="form-control" placeholder="email" autofocus>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password">
            <input style="background:#0f181b;border:none" class="btn btn-theme btn-block" type="submit" name="login" value="Login">
          <hr>
          <div class="registration">
            Don't have an account yet?<br/>
            <a data-toggle="modal" href="login.php#myModal">
              Create an account
              </a>
          </div>
        </div>
        </form>
        <?php
          if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            //$p = DB::query('SELECT fullname FROM user WHERE password=:password', array(':password'=>$password))[0]['fullname'];
            //print_r($p);
            //$one = DB::query('SELECT department_id FROM user WHERE fullname=:fullname', array(':fullname'=>$fullname))[0]['department_id'];
            //$two = DB::query('SELECT department FROM department WHERE id = :one', array(':one'=>$one))[0]['department'];
            //$p = DB::query('SELECT * FROM user WHERE id = :two',  array(':two'=>$two));
            if (DB::query('SELECT email FROM teachers WHERE email = :email', array(':email'=>$email))) {
              if (password_verify($password , DB::query('SELECT password FROM teachers WHERE email=:email', array(':email'=>$email))[0]['password'])) {
                $cstrong = True;
                $status = "Available";
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                $teacher_id = DB::query('SELECT id FROM teachers WHERE email=:email', array(':email'=>$email))[0]['id'];
                $schl_id = DB::query('SELECT schl_id FROM teachers WHERE email=:email', array(':email'=>$email))[0]['schl_id'];
                DB::query('INSERT INTO teacher_logins VALUES(\'\', :teacher_id, :schl_id, :token,:status)', array(':teacher_id'=>$teacher_id,':schl_id'=>$schl_id,':token'=>sha1($token),':status'=>$status));
                setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
                setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
                echo "<h1><script>alert('Welcome click OK to continue')</script></h1>";
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
        <form class="" action="" method="post" enctype="multipart/form-data">
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div style="background:#0f181b" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Sign Up</h4>
              </div>
              <div class="modal-body">
                <p>Enter your fullnames</p>
                <input type="text" name="fullname" placeholder="Enter your names" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-body">
                <p>Select school</p>
                <select  autocomplete="off" class="form-control placeholder-no-fix" name="school">
                  <option value="">Select Any School</option>
                  <?php
                    $allschools = DB::query('SELECT * FROM schools');
                    foreach ($allschools as $key) {
                      ?>
                      <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                      <?php
                    }
                   ?>
                </select>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail</p>
                <input type="text" name="email" placeholder="example@gmail.com" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-body">
                <p>Enter your Telphone Number</p>
                <input type="text" name="tel" placeholder="+250" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-body">
                <p>Select Gender</p>
                <select  autocomplete="off" class="form-control placeholder-no-fix" name="gender">
                  <option value="">Select Gender</option>
                  <option value="male">male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="modal-body">
                <p>Enter Password</p>
                <input type="password" name="password" placeholder="password" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" name="register" type="submit">Register</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
      <?php
        if (isset($_POST['register'])) {
          $fullname = $_POST['fullname'];
          $school = $_POST['school'];
          $email = $_POST['email'];
          $tel = $_POST['tel'];
          $gender = $_POST['gender'];
          $password = $_POST['password'];
          $dep = "0";
          $image = "default.png";
          $role = "teacher";
          if (!DB::query('SELECT email FROM teachers WHERE email=:email', array(':email'=>$email))) {
            if (DB::query('SELECT name FROM teachers WHERE schl_id=:school', array(':school'=>$school))) {
              DB::query('INSERT INTO teachers VALUES(\'\', :schl_id,:department_id,:name,:email,:role,:gender,:password,:profile,:number)', array(
                ':schl_id'=>$school,':department_id'=>$dep, ':name'=>$fullname,':email'=>$email,':role'=>$role,':gender'=>$gender,':password'=>password_hash($password, PASSWORD_BCRYPT),':profile'=>$image,':number'=>$tel
              ));
              echo "<h1><script>alert('You are now registered Enjoy this socialNetwork')</script></h1>";
              echo "<script>window.open('login.php', '_self')</script>";
            }else {
              echo '
              <div class="alert alert-warning">
              Sorry, you already have a school you belong to
              </div>
              ';
            }
          }else {
            echo '
            <div class="alert alert-warning">
            Sorry, Email is alredy in use
            </div>
            ';
          }
        }
       ?>
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
