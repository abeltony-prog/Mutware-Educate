<!-- Modal -->
<form class="" action="" method="post">
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background:#0f181b"  class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p class="modal-title">You user you want to logout?</p>
      </div>
      <div class="modal-body">
         Logout from all devices? <input type="checkbox" name="alldevices" value="alldevices">
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
        <input style="background:#0f181b;border:none;"  class="btn btn-theme" type="submit" name="logout" value="Conferm">
      </div>
    </div>
  </div>
</div>
</form>
<?php
if (!Logins::isLoggedIn()) {
  die("<script>window.open('login.php', '_self')</script>");
}
if (isset($_POST['logout'])) {
  $status = "0";
  DB::query('UPDATE students SET status=:status WHERE id=:id', array(':status'=>$status,':id'=>Logins::isLoggedIn()));
  if (isset($_POST['alldevices'])) {
    DB::query('DELETE FROM Logins WHERE std_id =:stdid', array(':stdid'=>Logins::isLoggedIn()));
    $id = DB::query('SELECT std_id FROM logins WHERE std_id=:stdid', array(':stdid'=>Logins::isLoggedIn()));
    DB::query('UPDATE students SET status=:status WHERE id=:id', array(':status'=>$status,':id'=>$id));
    echo "<script>window.open('login.php', '_self')</script>";
  }else {
    if (isset($_COOKIE['SNID'])) {
      DB::query('DELETE FROM Logins WHERE token =:token', array(':token'=>sha1($_COOKIE['SNID'])));
        echo "<script>window.open('login.php', '_self')</script>";
    }
    setcookie('SNID', '1' , time()-3600);
    setcookie('SNID_', '1' , time()-3600);

  }
}
 ?>
<!-- modal -->
