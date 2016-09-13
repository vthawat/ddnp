<?php $add_year=$this->year_budget->get_next_year()?>
<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
	<div class="form-group">
		 <label for="yaer_budget" class="col-sm-2 control-label">ปีงบประมาณ*</label>
		 <div class="col-sm-10">
		 	<input type="text" id="yaer_budget" class="form-control" name="YEAR" value="<?=$add_year?>">
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