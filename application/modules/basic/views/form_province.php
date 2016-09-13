<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
	<div class="form-group">
    <label for="potentiality" class="col-sm-2 control-label">เลือกจังหวัด*</label>
    <div class="col-sm-10">
      <select class="form-control" name="PROVINCE_ID">
      	<option value=""></option>
      	<?php $province_list=$this->province->get_all(FALSE);foreach($province_list as $item):?>
      	<option value="<?=$item->ID?>"><?=$item->PROVINCE_NAME?></option>
      	
      	<?php endforeach?>
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