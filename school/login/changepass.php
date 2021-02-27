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
  <title>Mutware Educate - Change Password</title>

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
        <h2 class="form-login-heading">Change Password</h2>
        <?php
          $all = DB::query('SELECT * FROM schools WHERE id=:id', array(':id'=>$_GET['id']));
          foreach ($all as $value) {
            ?>
            <div class="login-wrap">
              <input type="password" name="recent" class="form-control" value="<?php echo $value['password'] ?>" placeholder="Recent Password">
              <br>
              <input type="text" name="password" class="form-control" placeholder="New password"><br>
            <?php
          }
         ?>
         <input style="background:#0f181b;border:none" class="btn btn-theme btn-block" type="submit" name="change" value="Change"><br>
         <a style="margin-left: 120px;" href="../index.php">Go back</a>
       <hr>
     </div>
        </form>
        <?php
        if (isset($_POST['change'])) {
          $recent = $_POST['recent'];
          $new = $_POST['password'];
          DB::query('UPDATE schools SET password=:newpassword WHERE id=:id', array(':newpassword'=>password_hash($new, PASSWORD_BCRYPT),':id'=>$_GET['id']));
          echo "
          <div class='alert alert-success'>
          Password Changed
          </div>
          ";
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
