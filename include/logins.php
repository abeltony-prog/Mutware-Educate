<?php
    include('include/DB.php');
    class Logins{
      Public Static function isLoggedIn() {
        if (isset($_COOKIE['SNID'])) {
          if (DB::query('SELECT std_id FROM logins WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))) {
            $std_id = DB::query('SELECT std_id FROM logins WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['std_id'];
            //return $user_id;
            if (isset($_COOKIE['SNID_'])) {
              return $std_id;
            }else {
              $cstrong = True;
              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
              DB::query('INSERT INTO logins VALUES(\'\', :std_id,:schl_id, :department_id,:token)', array(':std_id'=>$stdid,':schl_id'=>$schl_id,':department_id'=>$dep_id,':token'=>sha1($token)));
              DB::query('DELETE FROM logins WHERE token = :token', array(':token'=>sha1($_COOKIE['SNID'])));
              setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
              return $stdid;
            }
          }
        }
        return false;
      }
    }
 ?>
