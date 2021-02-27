<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myselect" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p class="modal-title">Select Department / Class</p>
      </div>
      <div class="row col-md-12">
        <?php
          $teachers = DB::query('SELECT * FROM teachers WHERE id=:id', array(':id'=>teacher_login::isLoggedIn()));
          foreach ($teachers as $t) {
            $allDep = DB::query('SELECT * FROM department WHERE schl_id=:schlid', array(':schlid'=>$t['schl_id']));
            foreach ($allDep as $value) {
            ?>
               <div class="col-md-4 mt-5">
                <a href="work.php?View=work&id=<?php echo $value['id'] ?>"><div class="p-2 border btn btn-default"><?php echo $value['name'] ?></div></a>
               </div>
            <?php
          }
        }
         ?>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
