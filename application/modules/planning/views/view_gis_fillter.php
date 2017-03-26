<form method="post" class="form-horizontal country-fillter" action="<?=base_url('planning/gis')?>">
	<div class="form-group">
		 <label for="budget-year" class="col-sm-3 control-label">ปีงบประมาณ</label>
		 <div class="col-sm-9">
		 	<select class="form-control" id="budget-year" name="BUDGET_YEAR_ID">
		 		<option value="">--เลือกปีงบประมาณ--</option>
                 <?php foreach($budget_year_list as $item):?>
                 <option value="<?=$item->BUDGET_YEAR_ID?>" <?php if($this->input->post('BUDGET_YEAR_ID')==$item->BUDGET_YEAR_ID):?>selected<?php endif;?>><?=$item->YEAR?></option>
                 <?php endforeach;?>
		 	</select>
		 </div>
	</div>
	<div class="form-group">
		 <label for="province" class="col-sm-3 control-label">จังหวัด</label>
		 <div class="col-sm-9">
		 	<select class="form-control" id="province" name="PROVINCE_ID">
		 		<option value="">--เลือกจังหวัด--</option>
                 <?php foreach($provice_list as $item):?>
                 <option value="<?=$item->PROVINCE_ID?>" <?php if($this->input->post('PROVINCE_ID')==$item->PROVINCE_ID):?>selected<?php endif;?>><?=$item->PROVINCE_NAME?></option>
                 <?php endforeach;?>
		 	</select>
		 </div>
	</div>
	<div class="form-group">
		 <label for="amphur" class="col-sm-3 control-label">อำเภอ</label>
		 <div class="col-sm-9">
		 	<select class="form-control" id="amphur" name="AMPHUR_ID">
		 		<option value="">--เลือกอำเภอ--</option>
		 	</select>
		 </div>
	</div>
    	<div class="form-group">
		 <label for="district" class="col-sm-3 control-label">ตำบล</label>
		 <div class="col-sm-9">
		 	<select class="form-control" id="district" name="DISTRICT_ID">
		 		<option value="">--เลือกตำบล--</option>
		 	</select>
		 </div>
	</div>

		<div class="form-group">
		 <label for="status" class="col-sm-3 control-label">สถานะ</label>
		 <div class="col-sm-9">
		 	<select class="form-control" id="status" name="PROJECT_STATUS_ID">
		 		<option value="">--เลือกสถานะ--</option>
                <?php foreach($project_status_list as $item):?>
                 <option value="<?=$item->ID?>"><?=$item->STATUS?></option>
                 <?php endforeach;?>
		 	</select>
		 </div>
	</div>
	  	<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
      <button class="btn icon-btn btn-success save" type="submit"><span class="btn-glyphicon fa fa-check img-circle text-success"></span>ตกลง</button>
    </div>
  </div>

						
</form>