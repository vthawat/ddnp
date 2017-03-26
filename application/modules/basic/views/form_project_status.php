<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
	<div class="form-group">
    <label for="status" class="col-sm-2 control-label">ชื่อสถานะ*</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="STATUS" id="status" placeholder="ละทิ้งงาน" value="<?php if(!empty($edit_item)) print $edit_item->STATUS?>">
    </div>
  </div>
  <?php if(!empty($action_btn)):?>
  	<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <?=$action_btn?>
    </div>
  </div>
  <?php endif;?>
</form>