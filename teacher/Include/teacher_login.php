<?php
    include('DB.php');
    class teacher_login{
      Public Static function isLoggedIn() {
        if (isset($_COOKIE['SNID'])) {
          if (DB::query('SELECT teacher_id FROM teacher_logins WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))) {
            if (isset($_COOKIE['SNID_'])) {
              $schl_id = DB::query('SELECT schl_id FROM teacher_logins WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['schl_id'];

              $teacher_id = DB::query('SELECT teacher_id FROM teacher_logins WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['teacher_id'];
              return $teacher_id;
            }else {
              $cstrong = True;
              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
              DB::query('INSERT INTO teacher_logins VALUES(\'\', :teacher_id,:schl_id,:token)', array(':teacher_id'=>$teacher_id,':schl_id'=>$schl_id,':token'=>sha1($token)));
              DB::query('DELETE FROM teacher_logins WHERE logins = :logins', array(':logins'=>sha1($_COOKIE['SNID'])));

              setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
              return $teacherid;
            }
          }
        }
        return false;
      }
    }
 ?>
