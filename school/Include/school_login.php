<?php
    include('DB.php');
    class school_login{
      Public Static function isLoggedIn() {
        if (isset($_COOKIE['SNID'])) {
          if (DB::query('SELECT schl_id FROM school_logins WHERE logins = :logins', array(':logins'=>sha1($_COOKIE['SNID'])))) {
            $school_id = DB::query('SELECT schl_id FROM school_logins WHERE logins = :logins', array(':logins'=>sha1($_COOKIE['SNID'])))[0]['schl_id'];
            //return $user_id;
            if (isset($_COOKIE['SNID_'])) {
              return $school_id;
            }else {
              $cstrong = True;
              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
              DB::query('INSERT INTO school_logins VALUES(\'\', :schl_id,:logins)', array(':schl_id'=>$schlid,':logins'=>sha1($token)));
              DB::query('DELETE FROM school_logins WHERE logins = :logins', array(':logins'=>sha1($_COOKIE['SNID'])));

              setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
              return $schlid;
            }
          }
        }
        return false;
      }
    }
 ?>
