<?php include('include/teacher_login.php');
$teachername = DB::query('SELECT * FROM teachers WHERE id = :teacherid',array(':teacherid'=>teacher_login::isLoggedIn()));
foreach ($teachername as $t) {
?>
<form class="" action="" method="post" enctype="multipart/form-data">
  <select class="" name="subject">
    <option value="">Select subject</option>
    <?php
      $win = DB::query('SELECT subject FROM subjects WHERE department_id=:dep_id',array(':dep_id'=>$t['department_id']));
      foreach ($win as $value) {
        ?>
        <option value="<?php echo $value['subject']; ?>"><?php echo $value['subject']; ?></option>
        <?php
        }
     ?>
  </select>
  <select class="" name="trainer">
    <option value="">Select trainer name</option>
    <?php
      $win = DB::query('SELECT name FROM teachers WHERE schl_id=:schl_id',array(':schl_id'=>$t['schl_id']));
      foreach ($win as $value) {
        ?>
        <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
        <?php
        }
     ?>
  </select>
  <input type="date" name="date" value="">
  <input type="file" name="image" value="">
  <input type="submit" name="upload" value="Upload">
</form>
<?php
  if (isset($_POST['upload'])) {
    $target = "../files/docs/work/".basename($_FILES['image']['name']);
    $subject = $_POST['subject'];
    $sub_id = DB::query('SELECT id FROM subjects WHERE subject=:subject', array(':subject'=>$subject))[0]['id'];
    $schl_id = $t['schl_id'];
    $dep_id = $t['department_id'];
    $date = $_POST['date'];
    $file = $_FILES['image']['name'];
    DB::query('INSERT INTO work VALUES(\'\',:sub_id,:schl_id,:dep_id,:deadline,:file)', array(
      ':sub_id'=>$sub_id,':schl_id'=>$schl_id,':dep_id'=>$dep_id,':deadline'=>$date,':file'=>$file
    ));
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo "<script>window.open('file_upload.php', '_self')</script>";
    }else {
      echo "file wasn't submited";
    }
  }
  $one = DB::query('SELECT * FROM students WHERE dep_id=:dep_id', array(':dep_id'=>$t['department_id']));
  foreach ($one as $k) {
    echo $k['fname'];
    ?>
    <img src="../files/image/<?php echo $k['profile']; ?>" alt="">
    <?php
  }
}
 ?>
