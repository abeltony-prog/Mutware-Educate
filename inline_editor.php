<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mutware</title>

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
    Template URL: https://templatemag.com/mutware-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
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
              if (Logins::isLoggedIn()) {
                $stdname = DB::query('SELECT * FROM students WHERE id = :stdid',array(':stdid'=>Logins::isLoggedIn()));
                foreach ($stdname as $st) {
                ?>
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
                  <li><a class="fa fa-archive" href="potifolio.php"> My Potifolio</a></li>
                </ul>
              </li>
              <li>
                <a href="inbox.php">
                  <i class="fa fa-envelope"></i>
                  <span>Mail </span>
                  <span class="label label-theme pull-right mail-info">2</span>
                  </a>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-user-o"></i>
                  <span>All Classmants</span>
                  </a>
                <ul class="sub">
                  <?php
                  $names = DB::query('SELECT * FROM students WHERE dep_id=:depid', array(':depid'=>$st['dep_id']));
                  foreach ($names as $key) {
                    if ($key['id'] != $st['id']) {
                    ?>
                    <div style="margin-left:-30px;"><br>
                      <li>
                        <a data-toggle="modal" href="index.php#?mychat=message=sms&id=<?php echo $id['id'] ?>">
                        <span class="photo"><img style="border-radius:50px;width:30px; height:30px;" alt="avatar" src="files/image/<?php echo $key['profile'];?>"></span>
                        <span class="subject">
                        <span class="from"><?php echo $key['lname']." ".$key['fname'] ?></span>
                        <?php
                        if ($key['status'] == 1) {
                          ?>
                          <span style="background:gray" class="label label-theme mail-theme">Online</span>
                          <?php
                        }else {
                          ?>
                          <span style="background:gray" class="label label-theme mail-theme02">Offline</span>
                          <?php
                        }
                         ?>
                        </span>
                    </a>
                  </li>
                    </div>
                    <?php
                    }
                  }
                    ?>
                    <li style="margin-left:30px;margin-top:-10px;"><a class="fa fa-plus" href="class.php"> Join Class</a></li>

                </ul>
              </li>

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
        <h3><i class="fa fa-angle-right"></i> Inline Editor</h3>
        <div class="row content-panel mt mb">
          <div class="col-md-6">
            <h2 contenteditable="true">mutware is a fully responsive admin dashboard template built with Bootstrap 3.1.1 Framework</h2>
            <h3 contenteditable="true">Following the Equator, Complete</h3>
            <h4 contenteditable="true">Mark Twain (Samuel Clemens)</h4>
          </div>
          <div class="col-md-6">
            <p contenteditable="true" class="mt">Later, when we reached the city, and glanced down the chief avenue, smouldering in its crushed-strawberry tint, those splendid effects were repeated; for every balcony, and every fanciful bird-cage of a snuggery countersunk in the house-fronts,
              and all the long lines of roofs were crowded with people, and each crowd was an explosion of brilliant color.</p>
            <p contenteditable="true">For color, and picturesqueness, and novelty, and outlandishness, and sustained interest and fascination, it was the most satisfying show I had ever seen, and I suppose I shall not have the privilege of looking upon its like again.</p>
            <p contenteditable="true">In the first place God made idiots. This was for practice. Then He made School Boards. --Pudd'nhead Wilson's New Calendar.</p>
            <p contenteditable="true">"I pray please to give me some action (work) for I am very poor boy I have no one to help me even so father for it so it seemed in thy good sight, you give the Telegraph Office, and another work what is your wish I am very poor boy, this understand
              what is your wish you my father I am your son this understand what is your wish.</p>
          </div>
        </div>
        <div class="mt"></div>
        <div class="row content-panel mt mb">
          <div class="col-md-6">
            <h3 contenteditable="true">The Count of Monte Cristo</h3>
            <h4 contenteditable="true">Alexander Dumas, Pere</h4>
          </div>
          <div class="col-md-6">
            <p contenteditable="true" class="mt">"What, still keeping up this silly jest? My dear fellow, it is perfectly ridiculous--stupid! You had better tell me at once that you intend starving me to death."</p>
            <p contenteditable="true">"And what am I to pay with, brute?" said Danglars, enraged. "Do you suppose I carry 100,000 francs in my pocket?"</p>
            <p contenteditable="true">"Your excellency has 5,050,000 francs in your pocket; that will be fifty fowls at 100,000 francs apiece, and half a fowl for the 50,000."</p>
            <p contenteditable="true">Danglars shuddered. The bandage fell from his eyes, and he understood the joke, which he did not think quite so stupid as he had done just before. "Come," he said, "if I pay you the 100,000 francs, will you be satisfied, and allow me to eat
              at my ease?"</p>
          </div>
        </div>
        <div class="mt"></div>
        <div class="row content-panel mt mb">
          <div class="col-md-6 mt">
            <blockquote contenteditable="true">A bird sitting on a tree is never afraid of the branch breaking, because her trust is not in the branch, but in her own wings.</blockquote>
            <h5 contenteditable="true">Believe in yourself</h5>
          </div>
          <div class="col-md-6 mt">
            <blockquote contenteditable="true">Gossip is started by the insecure, spread by fools, and accepted by idiots. Don't be any of the three.</blockquote>
            <h5 contenteditable="true">Unknown</h5>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <?php
  }
}
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
  <script src="lib/ckeditor/ckeditor.js"></script>

</body>

</html>
