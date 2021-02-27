<?php
    include('Class/Database.php');
    class Logins{
      Public Static function isLoggedIn() {
        if (isset($_COOKIE['SNID'])) {
          if (DB::query('SELECT user_id FROM logins WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))) {
            $user_id = DB::query('SELECT user_id FROM logins WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['user_id'];
            //return $user_id;
            if (isset($_COOKIE['SNID_'])) {
              return $user_id;
            }else {
              $cstrong = True;
              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
              DB::query('INSERT INTO logins VALUES(\'\', :user_id, :department_id, :token)', array(':user_id'=>$userid,':department_id'=>$dep_id,':token'=>sha1($token)));
              DB::query('DELETE FROM logins WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])));

              setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
              return $userid;
            }
          }
        }
        return false;
      }
    }
 ?>
