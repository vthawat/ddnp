<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
	<div class="form-group">
    <label for="ministry" class="col-sm-2 control-label">ชื่อหมู่บ้าน*</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="MINISTRY_NAME" id="ministry" placeholder="ชื่อหมู่บ้าน" value="<?php if(!empty($edit_item)) print $edit_item->MINISTRY_NAME?>">
    </div>
  </div>
  <div class="form-group">
   <label for="ministry" class="col-sm-2 control-label">จังหวัด*</label>
   <div class="col-sm-10">
   <select class="form-control provice_id">
     <option >---เลือกจังหวัด----</option>
     <?php foreach($this->province->get_all() as $item):?>
      <option value="<?=$item->ID?>"><?=$item->PROVINCE_NAME?></option>
     <?php endforeach;?>
   </select>
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