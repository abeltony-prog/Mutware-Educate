<?php
if (isset($_POST['logout'])) {
    DB::query('DELETE FROM school_logins WHERE schl_id =:schlid', array(':schlid'=>Login::isLoggedIn()));
      echo "<script>window.open('login/signin.php', '_self')</script>";
    if (isset($_COOKIE['SNID'])) {
    DB::query('DELETE FROM school_logins WHERE logins =:token', array(':token'=>sha1($_COOKIE['SNID'])));
        echo "<script>window.open('login/signin.php', '_self')</script>";
    }
    setcookie('SNID', '1' , time()-3600);
    setcookie('SNID_', '1' , time()-3600);
}
 ?>
