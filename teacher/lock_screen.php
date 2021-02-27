<!DOCTYPE html>
<html lang="en">
<?php include('Include/teacher_login.php'); ?>
<head>
  <meta charset="utf-8">
    <title>Mutware - Lock_Screen</title>

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
    Template Name: mutware
    Template URL: https://www.mutware.com.com/mutware-bootstrap-admin-template/
    Author: www.mutware.com.com
    License: https://www.mutware.com.com/license/
  ======================================================= -->
</head>
<body onload="getTime()">
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div class="container">
    <div id="showtime"></div>
    <div class="col-lg-4 col-lg-offset-4">
      <div class="lock-screen">
        <h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a></h2>
        <p>UNLOCK</p>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div style="background-color:#191c24 ;" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <?php
                if (teacher_login::isLoggedIn()) {
                  $teachername = DB::query('SELECT * FROM teachers WHERE id = :teacherid',array(':teacherid'=>teacher_login::isLoggedIn()));
                  ?>
                <?php
                foreach ($teachername as $t) {
                  ?>
                  <h4 class="modal-title">Welcome Back <?php  echo $t['name']; ?></h4>
                </div>
                <form class="" method="post">
                  <div class="modal-body">
                    <p class="centered"><img class="img-circle" width="50" src="../files/image/<?php echo $t['profile']; ?>"></p>

                    <input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">
                  </div>
                  <div class="modal-footer centered">
                    <input style="background-color:#191c24;border: none;" class="btn btn-primary" type="submit" name="login" value="Login">
                  </div>
                </form>
                  <?php
                  if (isset($_POST['login'])) {
                    $email  = $t['email'];
                    $password = $_POST['password'];
                    if (password_verify($password , DB::query('SELECT password FROM teachers WHERE email=:email', array(':email'=>$email))[0]['password'])) {
                      echo "<h1><script>alert('Welcome come back, click OK to continue')</script></h1>";
                      echo "<script>window.open('index.php', '_self')</script>";
                    }else {
                      echo "<h1><script>alert('Wrong password')</script></h1>";
                    }
                  }
                }
                ?>

            </div>
          </div>
        </div>
        <!-- modal -->
      </div>
      <!-- /lock-screen -->
    </div>
    <!-- /col-lg-4 -->
  </div>
  <?php
}else {
  echo "<script>window.open('login.php', '_self')</script>";
}
   ?>
  <!-- /container -->
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("../img/logi-bg.jpg", {
      speed: 500
    });
  </script>
  <script>
    function getTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      // add a zero in front of numbers<10
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
      t = setTimeout(function() {
        getTime()
      }, 500);
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
  </script>
</body>

</html>
