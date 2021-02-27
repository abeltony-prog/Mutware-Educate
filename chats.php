<!-- Modal -->
<form class="" action="" method="post">
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myChat" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background:#0f181b"  class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <?php
          $result = DB::query('SELECT * FROM students WHERE id=:id', array(':id'=>$_GET['id']));
          foreach ($result as $var) {
            ?>
            <p class="modal-title"><?php echo $var['fname'] ?></p>
            <?php
          }
         ?>
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
<!-- modal -->
