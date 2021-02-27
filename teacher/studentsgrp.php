<!DOCTYPE html>
<?php include('Include/teacher_login.php'); ?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Mutware - work</title>

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
  <link rel="stylesheet" href="">
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
<?php include('selectDep.php') ?>

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
                <a class="active"  href="javascript:;">
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
        <h3><i class="fa fa-folder-open"></i> Create Class Groups</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <!-- The file upload form used as target for the file upload widget -->
            <form action="" method="POST" enctype="multipart/form-data">
              <!-- Redirect browsers with JavaScript disabled to the origin page -->
              <noscript>
                  <input type="hidden" name="redirect" value="#">
                </noscript>
              <div class="row">
                <div class="form-group col-md-4">
                    <label for="subject">Group numbering</label>
                    <select class="form-control" name="group">
                      <option value="">Select group number</option>
                      <option value="Group one">Group one</option>
                      <option value="Group two">Group two</option>
                      <option value="Group three">Group three</option>
                      <option value="Group four">Group four</option>
                      <option value="Group five">Group five</option>
                      <option value="Group six">Group six</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="subject">Students</label>
                      <select class="form-control" name="student">
                        <option value="">Select Students</option>
                        <?php
                        $dep = DB::query('SELECT dep_id FROM classgrp WHERE sub_id=:subid', array(':subid'=>$_GET['id']))[0]['dep_id'];
                        $allstudents = DB::query('SELECT * FROM students WHERE dep_id=:depid',array(':depid'=>$dep));
                          foreach ($allstudents as $st) {
                            ?>
                            <option value="<?php echo $st['id']; ?>"><?php echo $st['fname']; ?> <?php echo $st['lname']; ?></option>
                            <?php
                          }
                         ?>
                      </select>
                    </div>
                    <div style="margin-top:23px;" class="form-group col-md-4">
                      <div class="row fileupload-buttonbar">
                        <div class="col-lg-8">
                          <!-- The fileinput-button span is used to style the file input field as button -->
                            <button class="btn btn-theme" type="submit" name="add"><i class="fa fa-plus"></i> Add</button>
                        </div>
                  </div>
              </div>
              <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->

              </div>
              <!-- /row -->
              <!-- The table listing the files available for upload/download -->
            </form>
            <?php
              if (isset($_POST['add'])) {
                $group = $_POST['group'];
                $student = $_POST['student'];
                $sub_id= $_GET['id'];
                $dep_id = DB::query('SELECT dep_id FROM classgrp WHERE sub_id=:subid', array(':subid'=>$_GET['id']))[0]['dep_id'];
                DB::query('INSERT INTO groups VALUES(\'\',:group_numb,:std_id,:sub_id,dep_id)', array(
                  ':group_numb'=>$group,':std_id'=>$student,':sub_id'=>$sub_id,':dep_id'=>$dep_id
                ));
                echo '
                 <div class="alert alert-success">
                    Group Created!!!!!
                </div>';
                echo "<script>window.open('studentsgrp.php', '_self')</script>";
              }
             ?>
            <br>
            <!-- /panel -->
            <div class="row mt">
              <div class="col-md-12">
                <section class="task-panel tasks-widget">
                  <div class="panel-heading">
                    <div class="pull-left">
                      <h5><i class="fa fa-folder"></i> Class Work</h5>
                    </div>
                    <br>
                  </div>
                  <div class="content-panel">
                    <div class="adv-table">
                      <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                        <thead>
                          <tr>
                            <th>File Name</th>
                            <th class="hidden-phone">Deadline Date</th>
                            <th class="hidden-phone">Subject</th>
                            <th>Option</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = DB::query('SELECT * FROM work WHERE dep_id=:dep_id',array(':dep_id'=>$t['department_id']));
                        foreach ($result as $key) {
                          ?>
                          <tr class="gradeX">
                            <td><?php echo $key['file']; ?></td>
                            <td class="hidden-phone"><?php echo $key['deadline']; ?></td>
                            <?php
                            $re = DB::query('SELECT subject FROM subjects WHERE id=:sub_id',array(':sub_id'=>$key['sub_id']));
                            foreach ($re as $value): ?>
                            <td class="hidden-phone"><?php echo $value['subject']; ?></td>
                            <?php endforeach; ?>
                            <td>
                              <div class="pull-right">
                                <a href="view.php?View=work&file=<?php echo $key['file'] ?>"><button class="btn btn-info btn-xs"><i class=" fa fa-eye"></i></button>
                                </i></button></a>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                              </div>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                           ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </section>
              </div>
              <!-- /col-md-12-->
            </div>
            <!-- The blueimp Gallery widget -->
          </div>
        </div>

      </section>
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
