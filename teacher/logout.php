<!-- Modal -->
<form class="" action="" method="post">
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p class="modal-title">You user you want to logout?</p>
      </div>
      <div class="modal-body">
         Logout from all devices? <input type="checkbox" name="alldevices" value="alldevices">
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
        <input class="btn btn-theme" type="submit" name="logout" value="Conferm">
      </div>
    </div>
  </div>
</div>
</form>
<?php
if (!teacher_login::isLoggedIn()) {
  die("<script>window.open('login.php', '_self')</script>");
}
if (isset($_POST['logout'])) {
  if (isset($_POST['alldevices'])) {
    DB::query('DELETE FROM teacher_logins WHERE teacher_id =:teacherid', array(':teacherid'=>teacher_login::isLoggedIn()));
      echo "<script>window.open('login.php', '_self')</script>";
  }else {
    if (isset($_COOKIE['SNID'])) {
    DB::query('DELETE FROM teacher_logins WHERE token =:token', array(':token'=>sha1($_COOKIE['SNID'])));
        echo "<script>window.open('login.php', '_self')</script>";
    }
    setcookie('SNID', '1' , time()-3600);
    setcookie('SNID_', '1' , time()-3600);

  }
}
 ?>
<!-- modal -->
