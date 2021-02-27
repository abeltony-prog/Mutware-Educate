<!DOCTYPE html>
<html lang="en">
<?php include('../include/school_login.php'); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Mutware - Lock_Screen</title>

  <!-- Favicons -->
  <link href="../assets/images/fafa.png" rel="icon">
  <link href="../assets/images/fafa.png" rel="apple-touch-icon">

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
              <div style="background:#0f181b" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <?php
                if (school_login::isLoggedIn()) {
                  $schlname = DB::query('SELECT * FROM schools WHERE id = :schlid',array(':schlid'=>school_login::isLoggedIn()));
                  ?>
                <?php
                foreach ($schlname as $s) {
                  ?>
                    <p class="centered"><?php echo $s['name']; ?></p>
                </div>
                <form class="" method="post">
                  <div class="modal-body">
                    <input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">
                  </div>
                  <div class="modal-footer centered">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <input style="background:#0f181b;color:#fff" class="btn" type="submit" name="login" value="Login">
                  </div>
                </form>
                  <?php
                  if (isset($_POST['login'])) {
                    $email  = $s['email'];
                    $password = $_POST['password'];
                    if (password_verify($password , DB::query('SELECT password FROM schools WHERE email=:email', array(':email'=>$email))[0]['password'])) {
                      echo "<script>window.open('../index.php', '_self')</script>";
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
    $.backstretch("img/logi-bg.jpg", {
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
