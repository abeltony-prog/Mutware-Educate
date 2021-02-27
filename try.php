<form id="fileupload" method="POST" enctype="multipart/form-data">
  <?php include('include/logins.php'); ?>

  <!-- Redirect browsers with JavaScript disabled to the origin page -->
  <noscript>
      <input type="hidden" name="redirect" value="">
    </noscript>
  <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
  <div class="row fileupload-buttonbar">
    <div style="margin-left:90px;" class="col-lg-8">
      <!-- The fileinput-button span is used to style the file input field as button -->
      <span style="background:#0f181b; border:none;" class="fileinput-button btn btn-theme ">
        <i class="glyphicon"></i>
        <span>Select Image</span>
      <input type="file" name="image" multiple>
      </span>
      <input class="btn btn-theme" type="submit" name="change" value="Change Profile">
    </div>
  </div>
</form>
<?php
$count = DB::query("SELECT count(*) FROM students");
  $one = $count->fetch(PDO::FETCH_NUM);
  echo $one;
 ?>
