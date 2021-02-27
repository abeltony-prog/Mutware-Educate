<!DOCTYPE html>
<html lang="en">
<?php include('Include/teacher_login.php'); ?>
<head>
  <meta charset="utf-8">
  <title>Mutware - WorkView</title>

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

</head>
<?php include('logout.php') ?>
<?php include('selectDep.php') ?>

<style media="screen">
  body{
    overflow-y: hidden;
  }
</style>
<body>
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
              if (teacher_login::isLoggedIn()) {
                $teachername = DB::query('SELECT * FROM teachers WHERE id = :teacherid',array(':teacherid'=>teacher_login::isLoggedIn()));
                ?>
                <?php
               foreach ($teachername as $t) {
                 ?>
                 <p class="centered"><a href="profile.php"><img src="../files/image/<?php echo $t['profile']; ?>"
                   class="img-circle" width="80" height="80"></a></p>
                <h5 class="centered"> <?php  echo $t['name']?></h5>

              <li class="mt">
                <a href="index.php">
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
                  <!--<li><a href="dropzone.php">Dropzone File Upload</a></li>-->
                </ul>
              </li>

              <li class="sub-menu">
                <a class="active" href="javascript:;">
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
            <?php
            $result = DB::query('SELECT * FROM Work WHERE file=:file',array(':file'=>$_GET['file']));
            foreach ($result as $key) {
              ?>
            <div class="row mt">
              <div class="col-lg-12">
                  <object width="100%" height="600px" data="../files/docs/work/<?php echo $key['file']; ?>"></object>
                  <form class="pull-right" action="" method="post" enctype="multipart/form-data" >
                      <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash-o "></i></button>
                    </form>
                    <?php
                    if (isset($_POST['delete'])) {
                      DB::query('DELETE FROM work WHERE id=:id', array(':id'=>$key['id']));
                      echo "<script>window.open('index.php', '_self')</script>";
                    }
                     ?>
              </div>
            </div>
          </section>
<?php   } ?>
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
