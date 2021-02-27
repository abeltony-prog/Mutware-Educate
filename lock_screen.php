<!DOCTYPE html>
<html lang="en">
<?php include('include/logins.php'); ?>
<head>
  <meta charset="utf-8">
    <title>Mutware - Lock_Screen</title>

  <!-- Favicons -->
  <link href="img/mutware icon" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
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
          <div style="width:30%" class="modal-dialog">
            <div class="modal-content">
              <div style="background:#0f181b" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <?php
                if (Logins::isLoggedIn()) {
                  $student = DB::query('SELECT * FROM students WHERE id = :stdid',array(':stdid'=>Logins::isLoggedIn()));
                  ?>
                <?php
                foreach ($student as $st) {
                  ?>
                  <?php
                  $img = DB::query('SELECT * FROM students WHERE id=:id', array(':id'=>$st['id']));
                  foreach ($img as $key) {
                    ?>
                    <p class="centered"><a href="profile.php"><img src="files/image/<?php echo $key['profile']; ?>" class="img-circle" style="width:50px; height: 50px;border-radius:50px;"></a></p>
                </div>
                <form class="" method="post">
                  <div class="modal-body">
                      <?php
                    }
                     ?>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">
                  </div>
                  <div class="modal-footer centered">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <input style="background:#0f181b;color:#fff" class="btn" type="submit" name="login" value="Login">
                  </div>
                </form>
                  <?php
                  if (isset($_POST['login'])) {
                    $email  = $st['email'];
                    $password = $_POST['password'];
                    if (password_verify($password , DB::query('SELECT password FROM students WHERE email=:email', array(':email'=>$email))[0]['password'])) {
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
