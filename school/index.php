<!DOCTYPE html>
<html lang="en">
<?php include('include/school_login.php'); ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Mutware - Home</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/fafa.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="profile-name">
                  <?php
                  if (school_login::isLoggedIn()) {
                    //$user = DB::query('SELECT user_id FROM logins WHERE user_id=:userid', array(':userid'=>Logins::isLoggedIn()));
                    //$name = DB::query('SELECT fullname FROM user WHERE id=:user', array(':user'=>$user));
                    $schlname = DB::query('SELECT * FROM schools WHERE id = :schlid',array(':schlid'=>school_login::isLoggedIn()));
                    ?>
                  <p class="mb-0 font-weight-normal">
                    <?php
                    foreach ($schlname as $s) {
                      echo $s['name'];
                    ?>
                  </p>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <div class="dropdown-divider"></div>
                <a href="login/changepass.php?one=view&id=<?php echo $s['id'] ?>" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i style="color:#4ECDC4;" class="mdi mdi-onepassword"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
              </div>
            </div>
          </li><hr>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i style="color:#4ECDC4;" class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i style="color:#4ECDC4;" class="mdi mdi-plus"></i>
              </span>
              <span class="menu-title">Add</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="addDepart.php">Department / Class</a></li>
                <li class="nav-item"> <a class="nav-link" href="headDepart.php">Head Of Department</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="DepartList.php">
              <span class="menu-icon">
                <i style="color:#4ECDC4;" class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Student List</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="teachers.php">
              <span class="menu-icon">
                <i style="color:#4ECDC4;" class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Teachers List</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="lock/lock_screen.php">
              <span class="menu-icon">
                <i style="color:#fff;" class="mdi mdi-lock"></i>
              </span>
              <span class="menu-title">Lock Screen</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.php -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                       <?php
                         echo $s['name'];
                        ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div style="color:#4ECDC4;" class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <form class="" action="" method="post">
                        <input class="preview-subject mb-1 btn btn-default" type="submit" name="logout" value="logout">
                      </form>
                      <?php
                      if (isset($_POST['logout'])) {
                          DB::query('DELETE FROM school_logins WHERE schl_id =:schlid', array(':schlid'=>$s['id']));
                            echo "<script>window.open('login/signin.php', '_self')</script>";
                          if (isset($_COOKIE['SNID'])) {
                          DB::query('DELETE FROM school_logins WHERE logins =:token', array(':token'=>sha1($_COOKIE['SNID'])));
                              echo "<script>window.open('login/signin.php', '_self')</script>";
                          }
                          setcookie('SNID', '1' , time()-3600);
                          setcookie('SNID_', '1' , time()-3600);
                      }
                       ?>
                    </div>
                  </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <!--<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <?php
                            $count = DB::query('SELECT COUNT(fname) FROM students WHERE schl_id=:schlid', array(':schlid'=>$s['id']));
                            foreach ($count as $c) {
                              ?>
                              <h3 class="mb-0"><?php echo $c['id']; ?></h3>
                              <?php
                            }
                           ?>
                        </div>
                      </div>
                      <div style="background-color: none;" class="col-3">
                        <div style="color:#4ECDC4;background: none;" class="icon icon-box-success">
                          <span class="mdi mdi-worker icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Teachers</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$17.34</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="color:#4ECDC4;background: none;" class="icon icon-box-success">
                          <span class="mdi mdi-account-convert icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Students</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$12.34</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="color:#4ECDC4;background: none;" class="icon icon-box-danger">
                          <span class="mdi mdi-account-multiple-outline icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Head Of Departments</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$31.53</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div style="color:#4ECDC4;background: none;" class="icon icon-box-success ">
                          <span class="mdi mdi-animation icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Departments</h6>
                  </div>
                </div>
              </div>
            </div>-->
            <div class="row">
              <div class="col-md-12  col-xl-12 grid-margin stretch-card">
                <div class="card col-md-12">
                  <div class="card-body col-md-12">
                    <aside class="mid-side col-md-12">
                      <div class="chat-room-head">
                        <div class="room-desk col-md-12">
                          <div style="padding: 20px 10px 10px 10px;border-radius: 10px 0px 10px 0px;" class="room-box col-md-12">
                            <form class="" action="" method="post" enctype="multipart/form-data">
                              <div class="row col-md-12">
                                <div class="col-md-12">
                                  <textarea style="color:white" class="form-control bg-dark" name="subject" rows="4" cols="80" placeholder="Share Something"></textarea>
                                </div>
                              <div class="col-md-6">
                                <input style="margin-top:8px;" class="form-control" type="submit" name="post" value="Post">
                              </div>
                              <div class="col-md-6">
                              <select style="margin-top:8px;color:#fff;" class="form-control" name="type">
                                <option value="all">Select Wwho to see the post</option>
                                <option value="all">All</option>
                                <option value="teachers">Teachers</option>
                              </select>
                            </div>
                            </div>
                            </form>
                            <?php
                            if (isset($_POST['post'])) {
                              $subject = $_POST['subject'];
                              $type = $_POST['type'];
                              $schl_id = $s['id'];
                              DB::query('INSERT INTO posts VALUES (\'\',:schl_id,:subject,:type,NOW())', array(':schl_id'=>$schl_id,':subject'=>$subject,':type'=>$type));
                              echo "Notification sent";
                            }
                             ?>
                          </div>
                        </div>
                        <h3>Posts</h3>

                      </div><hr>
                      <?php
                      $posts = DB::query('SELECT * FROM posts WHERE schl_id=:schlid ORDER BY id DESC LIMIT 30', array(':schlid'=>$s['id']));
                      foreach ($posts as $key) {
                        ?>
                        <div class="room-desk">
                          <div style="padding: 20px 10px 10px 10px;border-radius: 10px 0px 10px 0px;" class="room-box">
                            <?php
                            $schl_id = DB::query('SELECT * FROM schools WHERE id=:schlid', array(':schlid'=>$key['schl_id']));
                            foreach ($schl_id as $schl) {
                              ?>
                              <h5  class="text"><a style="color:#4ECDC4;" href="chat_room.php"><?php echo $schl['name'] ?></a></h5>
                              <?php
                            }
                             ?>
                            <p><?php echo $key['subject'] ?></p>
                            <p><span class="text-muted">For :</span> <?php echo $key['type'] ?> | <span class="text-muted">Posted at :</span> <?php echo $key['posted_at'] ?></p>
                          </div>
                        </div><hr>
                        <?php
                      }
                       ?>
                    </aside>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php
     }
   }else {
    echo "<script>window.open('login/signin.php', '_self')</script>";
   }
   ?>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
