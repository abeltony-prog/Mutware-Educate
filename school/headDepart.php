<!DOCTYPE html>
<?php include('include/school_login.php');
include('include/logout.php') ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mutware - Head Of Department</title>
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
                <i style="color:#4ECDC4;" class="mdi mdi-playlist-play"></i>
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
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"> <?php
                      echo $s['name'];
                    ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i style="color:#4ECDC4;" class="mdi mdi-logout"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <form class="" action="" method="post">
                        <input class="preview-subject mb-1 btn btn-default" type="submit" name="logout" value="logout">
                      </form>
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
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Head Of Department</h4>
                      <form class="forms-sample" action="" method="post">
                      <div class="row col-md-12">
                        <div class="form-group col-md-6">
                          <label for="exampleInputName1">Name</label>
                          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail3">Email address</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail3">Role</label>
                          <input type="text" name="role" class="form-control" id="exampleInputEmail3" value="Head Of Department">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail3">Tel numbers</label>
                          <input type="number" name="number" class="form-control" id="exampleInputEmail3" placeholder="Phone Number">
                        </div>
                      </div>
                      <div class="row col-md-12">
                        <div class="form-group col-md-6">
                          <label for="exampleSelectGender">Gender</label>
                          <select name="gender" class="form-control" id="exampleSelectGender">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Both</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleSelectGender">Department / Class</label>
                          <select name="department" class="form-control" id="exampleSelectGender">
                            <option>Select Department</option>
                            <?php
                            $one = DB::query('SELECT * FROM department WHERE schl_id=:sch', array(':sch'=>$s['id']));
                            foreach ($one as $key) {
                              ?>
                              <option value="<?php echo $key['name'] ?>"><?php echo $key['name'] ?></option>
                              <?php
                            }
                             ?>
                          </select>
                        </div>
                      </div>
                      <input style="background-color:#4ECDC4;" class="btn mr-2" type="submit" name="save" value="Add">
                      <button class="btn btn-dark">Reload</button>
                    </form>
                    <?php
                      if (isset($_POST['save'])) {
                        $schl_id = $s['id'];
                        $department = $_POST['department'];
                        $dep = DB::query('SELECT id FROM department WHERE name = :department',array(':department'=>$department))[0]['id'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $role = $_POST['role'];
                        $gender = $_POST['gender'];
                        $number = $_POST['number'];
                        $password = "1LY2T80";
                        $profile = "default.png";

                        DB::query('INSERT INTO teachers VALUES(\'\',:schl_id,:department_id, :name, :email,:role, :gender,:password,:profile,:number)', array(
                          ':schl_id'=>$schl_id,':department_id'=>$dep,':name'=>$name,':email'=>$email,':role'=>$role,':gender'=>$gender,':password'=>password_hash($password, PASSWORD_BCRYPT),':profile'=>$profile,':number'=>$number
                        ));
                        echo "data inserted";

                      }
                     ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Department Leader's List</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> User </th>
                            <th> Names </th>
                            <th> Email </th>
                            <th> Gender </th>
                            <th> Telphone </th>
                          </tr>
                        </thead>

                          <tbody>

            <?php
              $type = "Head of class";
              $role = DB::query('SELECT * FROM teachers WHERE role=:role', array(':role'=>$type));
              foreach ($role as $r) {
                ?>
                  <tr>
                                <td class="py-1">
                                  <img src="../files/image/<?php echo $r['profile'] ?>" alt="image" />
                                </td>
                                <td> <?php echo $r['name']; ?> </td>
                                <td>
                                  <?php echo $r['email'] ?>
                                </td>
                                <td> <?php echo $r['gender'] ?></td>
                                <td> <?php echo $r['number'] ?> </td>
                                </tr>

                <?php
              }
             ?>
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>
</div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php
    }
   }else {
    echo "<script>window.open('login/signin.php', '_self')</script>";
   }
   ?>
    <!-- plugins:js -->
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
