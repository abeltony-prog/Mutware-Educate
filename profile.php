<!DOCTYPE html>
<html lang="en">
<?php include('include/logins.php'); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Mutware - Student Profile</title>
  <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload.css">
  <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload-ui.css">
  <!-- CSS adjustments for browsers with JavaScript disabled -->
  <noscript>
      <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload-noscript.css">
    </noscript>
  <noscript>
      <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload-ui-noscript.css">
    </noscript>
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

</head>
<?php include('logout.php') ?>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <?php include('logo.php') ?>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <?php
          if (Logins::isLoggedIn()) {
            $stdname = DB::query('SELECT * FROM students WHERE id = :stdid',array(':stdid'=>Logins::isLoggedIn()));
            foreach ($stdname as $st) {
              ?>
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.php#">
              <i class="fa fa-users"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">Classmants</p>
              </li>
              <?php
              $online = DB::query('SELECT * FROM students');
              foreach ($online as $on) {
                  if ($on['id'] == $st['id']) {

                  }else {
                    if ($on['status'] == 1) {
                      ?>
                      <li>
                        <a href="chat.php?sms=msg&id=<?php echo $st['id'] ?>">
                          <span class="photo"><img alt="avatar" src="files/image/<?php echo $on['profile'] ?>"></span>
                          <span class="subject">
                          <span class="from"><?php echo $on['fname']." ".$on['lname'] ?></span>
                          <span class="time">Online</span>
                          </span>
                          <span class="message">
                            <?php
                                $departm = DB::query('SELECT * FROM department WHERE id=:depid', array(':depid'=>$on['dep_id']));
                                foreach ($departm as $d) {
                                  echo $d['name'];
                                }
                             ?>
                          </span>
                          </a>
                      </li>

                      <?php
                  }

                }
              }
                ?>
              <li>
                <a href="index.php#">All active Classmants</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" data-toggle="modal" href="index.php#myModal">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
          <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              <?php
                $img = DB::query('SELECT * FROM students WHERE id=:id', array(':id'=>$st['id']));
                foreach ($img as $key) {
                  ?>
                  <p class="centered"><a href="profile.php"><img src="files/image/<?php echo $key['profile']; ?>" class="img-circle" style="width:90px; height: 90px;border-radius:50px;"></a></p>
                  <?php
                }
                 ?>
              <h5 class="centered"> <?php
                echo $st['lname'];
              ?></h5>
              <li class="mt">
                <a class="active" href="index.php">
                  <i class="fa fa-dashboard"></i>
                  <span>Dashboard</span>
                  </a>
              </li>

              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-cogs"></i>
                  <span>Components</span>
                  </a>
                <ul class="sub">
                  <li><a class="fa fa-book" href="notes.php"> Notes</a></li>
                  <!--<li><a href="dropzone.php">Dropzone File Upload</a></li>-->
                  <li><a class="fa fa-pencil-square-o" href="hand_in_work.php"> Class work</a></li>
                </ul>
              </li>
              <!--<li>
                <a href="inbox.php">
                  <i class="fa fa-envelope"></i>
                  <span>Mail </span>
                  <span class="label label-theme pull-right mail-info">2</span>
                  </a>
              </li>-->

              <li>
                <a href="lock_screen.php">
                  <i class="fa fa-lock"></i>
                  <span>Lock_Screen</span>
                  </a>
              </li>
            </ul>
            <!-- sidebar menu end-->
          </div>
        </aside>
        <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <?php
                    $profile = DB::query('SELECT * FROM students WHERE id = :stdid',array(':stdid'=>Logins::isLoggedIn()));
                    foreach ($profile as $n) {
                      $result = DB::query('SELECT name FROM department WHERE id = :profile', array(':profile'=>$st['dep_id']));
                      foreach ($result as $k) {
                        ?>
                        <h6>CLASS INFO</h6>
                        <h4><?php echo $k['name'] ?></h4>
                        <?php
                      }
                    ?>
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                  <h3><?php echo $n['fname']; ?> <?php echo $n['lname']; ?></h3>
                  <?php
                  $schl_id = DB::query('SELECT name FROM schools WHERE id=:schl_id', array(':schl_id'=>$st['schl_id']));
                  foreach ($schl_id as $e) {
                   ?>
                  <p><?php echo $e['name'] ?></p>
                <?php
                  }
                }
                ?>
                <br>
                <a style="text-decoration:none; color:#fff" href="contactform.php">
                <p><button  class="btn btn-theme"><i class="fa fa-envelope"></i> Talk to US!</button></p>
                </a>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <?php
                  $img = DB::query('SELECT * FROM students WHERE id=:id', array(':id'=>$st['id']));
                  foreach ($img as $key) {
                    ?>
                    <p><img src="files/image/<?php echo $key['profile']; ?>" class="img-circle"></p>
                    <?php
                  }
                   ?>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#contact" class="contact-map">Contact</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Edit Profile</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <?php
                $alldetails = DB::query('SELECT * FROM students WHERE id=:stid', array(':stid'=>$st['id']));
                foreach ($alldetails as $key) {
                  ?>
              <div class="panel-body">
                <div class="tab-content">
                  <!-- /tab-pane -->
                  <div id="contact" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-6">
                        <div id="map"></div>
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        <h4>Location</h4>
                        <div class="col-md-8 col-md-offset-2 mt">
                          <p>
                            My Address<br/><?php echo $key['province'] ?>, <?php echo $key['district'] ?><br/>
                          </p>
                          <br>
                          <p>
                            <?php
                              $schl_id = DB::query('SELECT * FROM schools WHERE id=:id', array(':id'=>$key['schl_id']));
                              foreach ($schl_id as $value) {
                              ?>
                              School Address<br/><?php echo $value['province'] ?>, <?php echo $value['district'] ?>,<?php echo $value['sector'] ?><br/> <?php echo $value['type'] ?>
                              <?php
                              }
                             ?>
                          </p>
                        </div>
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Personal Information</h4>
                            <form role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                              <div class="form-group">
                                <label class="col-lg-2 control-label">District</label>
                                <div class="col-lg-6">
                                  <input type="text" name="district" placeholder="" value="<?php echo $key['district']; ?>" id="c-name" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-2 control-label">Province</label>
                                <div class="col-lg-6">
                                  <input type="text" name="province" placeholder="" value="<?php echo $key['province']; ?>" id="lives-in" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-2 control-label"> Profile</label>
                                <div class="col-lg-6">
                                  <input type="file" name="image" id="exampleInputFile" class="file-pos">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-lg-6">
                                  <input type="submit" name="change" value="Change" class="btn btn-info">
                                </div>
                              </div>
                            </form>
                            <?php
                              if (isset($_POST['change'])) {
                                $target = "files/image/".basename($_FILES['image']['name']);
                                $district = $_POST['district'];
                                $province = $_POST['province'];
                                $file = $_FILES['image']['name'];
                                $stdid = $st['id'];
                                DB::query('UPDATE students SET district=:district,province=:province,profile=:profile WHERE id=:id', array(
                                  ':district'=>$district,':province'=>$province,':profile'=>$file,':id'=>$stdid
                                ));
                                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                                  echo "<script>window.open('profile.php', '_self')</script>";
                                }else {
                                  echo "Image wasn't Changed";
                                }
                              }
                             ?>
                            <?php
                          }
                         ?>
                      </div>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <?php
  }
}else {
    echo "<script>window.open('login.php', '_self')</script>";
  }
     ?>
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script src="lib/file-uploader/js/jquery.fileupload.js"></script>
  <!-- The File Upload processing plugin -->
  <script src="lib/file-uploader/js/jquery.fileupload-process.js"></script>
  <!-- The File Upload image preview & resize plugin -->
  <script src="lib/file-uploader/js/jquery.fileupload-image.js"></script>
  <!-- The File Upload audio preview plugin -->
  <script src="lib/file-uploader/js/jquery.fileupload-audio.js"></script>
  <!-- The File Upload video preview plugin -->
  <script src="lib/file-uploader/js/jquery.fileupload-video.js"></script>
  <!-- The File Upload validation plugin -->
  <script src="lib/file-uploader/js/jquery.fileupload-validate.js"></script>
  <!-- The File Upload user interface plugin -->
  <script src="lib/file-uploader/js/jquery.fileupload-ui.js"></script>
  <!--script for this page-->
  <!-- MAP SCRIPT - ALL CONFIGURATION IS PLACED HERE - VIEW OUR DOCUMENTATION FOR FURTHER INFORMATION -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
  <script>
    $('.contact-map').click(function() {

      //google map in tab click initialize
      function initialize() {
        var myLatlng = new google.maps.LatLng(40.6700, -73.9400);
        var mapOptions = {
          zoom: 11,
          scrollwheel: false,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Mutware Admin Theme!'
        });
      }
      google.maps.event.addDomListener(window, 'click', initialize);
    });
  </script>
</body>

</html>
