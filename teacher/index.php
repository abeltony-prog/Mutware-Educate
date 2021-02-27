<!DOCTYPE html>
<html lang="en">
<?php
  include('Include/teacher_login.php');
 ?>
<head>
  <title>Mutware - Home</title>

  <!-- Favicons -->
  <link href="img/mutware icon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
</head>
<?php include('selectDep.php'); ?>
<?php include('logout.php') ?>
<body>
  <?php
  if (teacher_login::isLoggedIn()) {
    $teachername = DB::query('SELECT * FROM teachers WHERE id = :teacherid',array(':teacherid'=>teacher_login::isLoggedIn()));
    ?>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <?php include('header_menu.php') ?>
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
           foreach ($teachername as $t) {
             ?>
             <p class="centered"><a href="profile.php"><img src="../files/image/<?php echo $t['profile']; ?>"
               class="img-circle" width="80" height="80"></a></p>
            <h5 class="centered"> <?php  echo $t['name']?></h5>

          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Handed In work</span>
              </a>
            <ul class="sub">
              <?php
              $department = DB::query('SELECT * FROM department WHERE schl_id=:schlid', array(':schlid'=>$t['schl_id']));
              foreach ($department as $dep) {
                ?>
                <li style="margin-left:-15px;"><a class="fa fa-eye" href="sel_subject.php?Review=view&id=<?php echo $dep['id'] ?>"> <?php echo $dep['name']; ?></a></li>
                <?php
              }
               ?>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Components</span>
              </a>
            <ul class="sub">
              <!--<li><a href="dropzone.php">Dropzone File Upload</a></li>-->
              <li style="margin-left:-25px;"><a class="fa fa-plus" data-toggle="modal" href="index.php#myselect"> Add work to Department</a></li>
              <?php
                //$g=DB::query('SELECT role FROM teachers WHERE id=:id', array(':id'=>$t['id']));
                if ($t['role'] == "Head of class") {
                  ?>
                  <li style="margin-left:-25px;"><a class="fa fa-plus" href="file_upload.php"> Add Notes to Department</a></li>
                  <li style="margin-left:-25px;" ><a class="fa fa-plus" href="addSub.php"> Add Subject</a></li>
                  <?php
                }
               ?>
            </ul>
          </li>
          <?php
            //$g=DB::query('SELECT role FROM teachers WHERE id=:id', array(':id'=>$t['id']));
            if ($t['role'] == "Head of class") {
              ?>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-user"></i>
                  <span>User</span>
                  </a>
                <ul class="sub">
                  <li><a class="fa fa-users" href="allstudents.php"> All students</a></li>
                  <!--<li><a href="dropzone.php">Dropzone File Upload</a></li>-->
                  <li><a class="fa fa-plus" href="students.php"> Students</a></li>
                </ul>
              </li>
              <?php
            }
           ?>
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
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>DASHBOARD</h3>
              <?php
              $posts = DB::query('SELECT * FROM posts WHERE schl_id=:schlid ORDER BY id DESC LIMIT 30', array(':schlid'=>$t['schl_id']));
              foreach ($posts as $key) {
                ?>
                  <div class="room-box">
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
                <?php
            }
               ?>
            </div>
            <!--custom chart end-->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
  </section>
  <?php
}
}else {
  echo "<script>window.open('login.php', '_self')</script>";
}
   ?>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        <?php
          $departmen = DB::query('SELECT * FROM department WHERE id=:depid', array(':depid'=>$t['department_id']));
          foreach ($departmen as $key) {
            ?>
                    title: 'Welcome in <?php echo $key['name'] ?>',
            <?php
          }
         ?>
        // (string | mandatory) the text inside the notification
        text: '<?php echo $t['name']; ?>',
        // (string | optional) the image to display on the left
        image: '../files/image/<?php echo $t['profile'] ?>',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
