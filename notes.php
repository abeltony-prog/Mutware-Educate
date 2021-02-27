<!DOCTYPE html>
<html lang="en">
<?php include('include/logins.php'); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Mutware - To_Do List</title>
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
  <link rel="stylesheet" href="css/to-do.css">

  <!-- =======================================================
    Template Name: Mutware
    Template URL: https://www.mutware.com.com/Mutware-bootstrap-admin-template/
    Author: www.mutware.com.com
    License: https://www.mutware.com.com/license/
  ======================================================= -->
</head>
<?php include('logout.php') ?>
<style media="screen">
table {
  border-spacing: 0;
  width: 100%;
  border: 2px solid #ddd;
}

th, td {
  text-align: left;
  padding: 6px;
  border: 2px solid #dde;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>
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
                <a href="index.php">
                  <i class="fa fa-dashboard"></i>
                  <span>Dashboard</span>
                  </a>
              </li>

              <li class="sub-menu">
                <a  class="active" href="javascript:;">
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
      <section class="wrapper">
        <h3><i class="fa fa-book"></i> Class Notes</h3>
        <!-- COMPLEX TO DO LIST -->
        <div class="row mt">
          <div class="col-md-12">
            <section class="task-panel tasks-widget">
              <div class="panel-heading">
                <div class="pull-left">
                  <?php
                  $dep = DB::query('SELECT name FROM department WHERE id=:schl_id', array(':schl_id'=>$st['schl_id']));
                  foreach ($dep as $key) {
                  ?>
                  <h5><i class="fa fa-tasks"></i> <?php echo $key['name']; ?></h5>
                  <?php
                    }
                  }
                   ?>
                </div>
                <br>
              </div>
              <div class="panel-body">
                  <div class="adv-table">
                  <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                    <thead>
                      <tr>
                        <th>File Name</th>
                        <th>Subject</th>
                        <th>View</th>
                      </tr>
                    </thead>
                    <?php
                    $depart = DB::query('SELECT department_id FROM logins WHERE std_id = :id', array('id'=>Logins::isLoggedIn()))[0]['department_id'];
                    $work = DB::query('SELECT * FROM notes WHERE dep_id =:dep_id',array(':dep_id'=>$depart));
                    foreach ($work as $key) {
                      ?>
                      <tbody>
                      <tr>
                        <td><span class="fa fa-file-pdf-o"> <?php echo $key['file']; ?></span> </td>
                        <?php
                        $re = DB::query('SELECT subject FROM subjects WHERE id=:sub_id',array(':sub_id'=>$key['sub_id']));
                        foreach ($re as $k) {
                          ?>
                          <td><?php echo $k['subject']; ?></td>
                          <?php
                        }
                         ?>
                         <td style="color:red">
                             <a class="fa fa-eye" href="read.php?Reading=view&id=<?php echo $key['id'] ?>">
                        </td>
                        </tr>
                        </tbody>
                      <?php
                    }
                     ?>
                    </table>
                </div>
              </div>
            </section>
          </div>
          <!-- /col-md-12-->
        </div>
        <!-- /row -->
        <!-- SORTABLE TO DO LIST -->
        <!-- /row -->
      </section>
      <br><br><br><br><br><br><p /><p /><br><br><br><p /><p />
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <?php
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
  <!--script for this page-->
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="lib/tasks.js" type="text/javascript"></script>
  <script>
    jQuery(document).ready(function() {
      TaskList.initTaskWidget();
    });

    $(function() {
      $("#sortable").sortable();
      $("#sortable").disableSelection();
    });
  </script>

</body>

</html>
