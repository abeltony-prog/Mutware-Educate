<!DOCTYPE html>
<html lang="en">
<?php include('include/logins.php'); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Mutware - File upload</title>

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
  <!-- blueimp Gallery styles -->
  <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
  <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
  <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload.css">
  <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload-ui.css">
  <!-- CSS adjustments for browsers with JavaScript disabled -->
  <noscript>
      <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload-noscript.css">
    </noscript>
  <noscript>
      <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload-ui-noscript.css">
    </noscript>

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
  padding: 16px;
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
                <a  class="active"  href="javascript:;">
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
        <?php
        $result = DB::query('SELECT * FROM work WHERE dep_id=:dep_id',array(':dep_id'=>$st['dep_id']));
        foreach ($result as $key) {
          ?>
        <h3><i class="fa fa-file-pdf-o "></i> <?php echo $key['file']; ?> : <span style="color:red"><?php echo $key['deadline'] ?></span> </h3>
        <div class="row mt">
          <div class="col-lg-12">
                    <object width="100%" height="500px" data="files/docs/work/<?php echo $key['file']; ?>"></object>
              <noscript>
                  <input type="hidden" name="redirect" value="">
                </noscript>
              <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
              <div class="row fileupload-buttonbar">
                <div class="col-lg-8">
                  <form action="" method="post" enctype="multipart/form-data">
                    <span style="background:gray; border:none;" class="btn btn-success fileinput-button">
                      <i class="glyphicon glyphicon-plus"></i>
                      <span>Add files...</span>
                    <input type="file" name="image" value="">
                    </span>
                    <button type="submit" name="handin" class="btn btn-theme start">
                      <i class="glyphicon glyphicon-upload"></i>
                      <span>Hand in Work</span>
                      </button>
                      <a class="btn btn-danger" href="hand_in_work.php">Go Back</a>
                  </form>
                  <?php
                  if (isset($_POST['handin'])) {
                    $target = "files/docs/return/".basename($_FILES['image']['name']);
                    $stdid = $st['id'];
                    $file = $_FILES['image']['name'];
                    $subid = $key['sub_id'];
                    $depid = $key['dep_id'];
                    $schlid = $key['schl_id'];
                    $workid = $_GET['id'];
                    DB::query('INSERT INTO handed_in VALUES(\'\', :std_id,:file,:sub_id,:dep_id,:schl_id,:work_id,NOW())', array(
                      ':std_id'=>$stdid,':file'=>$file,':sub_id'=>$subid,':dep_id'=>$depid,':schl_id'=>$schlid,':work_id'=>$workid
                    ));
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                      echo "<script>window.open('hand_in_work.php', '_self')</script>";
                    }else {
                      echo "<script>alert('Work wasn't submit')</script>";
                    }
                    }
                    }
                   ?>
              </div>
              <div class="col-lg-12">
                  <table style="width:100%">
                    <tr>
                      <td><span> Files</span> </td>
                      <td>Date</td>
                    </tr>
                    <?php
                    $file = DB::query('SELECT * FROM handed_in WHERE std_id=:stdid', array(':stdid'=>$st['id']));
                    foreach ($file as $f) {

                      ?>
                      <tr>
                        <td><a class="fa fa-file-pdf-o" style="text-decoration:none" href="view1.php?handin=view&id=<?php echo $f['id'] ?>"> <?php echo $f['file'] ?></a></td>
                        <td><?php echo $f['posted_at'] ?></td>
                      </tr>
                      <?php
                    }
                     ?>
                  </table>
           </div>
              </div>
              <!-- /row -->
              <!-- The table listing the files available for upload/download -->
            <br>
            <!-- /panel -->
            <!-- The blueimp Gallery widget -->
          </div>
        </div>
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
  <!--script for this page-->
  <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
  <script src="lib/file-uploader/js/vendor/jquery.ui.widget.js"></script>
  <!-- The Templates plugin is included to render the upload/download listings -->
  <script src="http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
  <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
  <script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
  <!-- The Canvas to Blob plugin is included for image resizing functionality -->
  <script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
  <!-- blueimp Gallery script -->
  <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
  <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
  <script src="lib/file-uploader/js/jquery.iframe-transport.js"></script>
  <!-- The basic File Upload plugin -->
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
  <!-- The main application script -->
  <script src="lib/file-uploader/js/main.js"></script>
  <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
  <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="assets/file-uploader/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
  <!-- The template to display files available for upload -->
  <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
      <td>
        <span class="preview"></span>
      </td>
      <td>
        <p class="name">{%=file.name%}</p>
        <strong class="error text-danger"></strong>
      </td>
      <td>
        <p class="size">Processing...</p>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="progress-bar progress-bar-success" style="width:0%;"></div>
        </div>
      </td>
      <td>
        {% if (!i && !o.options.autoUpload) { %}
        <button class="btn btn-primary start" disabled>
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Start</span>
              </button> {% } %} {% if (!i) { %}
        <button class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
              </button> {% } %}
      </td>
    </tr>
    {% } %}
  </script>
  <!-- The template to display files available for download -->
  <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
      <td>
        <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
      </td>
      <td>
        <p class="name">
          {% if (file.url) { %}
          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
          <span>{%=file.name%}</span> {% } %}
        </p>
        {% if (file.error) { %}
        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
        {% } %}
      </td>
      <td>
        <span class="size">{%=o.formatFileSize(file.size)%}</span>
      </td>
      <td>
        {% if (file.deleteUrl) { %}
        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
              <i class="glyphicon glyphicon-trash"></i>
              <span>Delete</span>
              </button>
        <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
        <button class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
              </button> {% } %}
      </td>
    </tr>
    {% } %}
  </script>

</body>

</html>
