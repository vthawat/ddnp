<form method="post" class="form-horizontal country-fillter" action="<?=base_url('planning/gis/fillter')?>">
	<div class="form-group">
		 <label for="province" class="col-sm-3 control-label">จังหวัด</label>
		 <div class="col-sm-9">
		 	<select class="form-control" id="province" name="PROVINCE_ID">
		 		<option value="">--เลือกจังหวัด--</option>
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
		 <label for="amphur" class="col-sm-3 control-label">ตำบล</label>
		 <div class="col-sm-9">
		 	<select class="form-control" id="amphur" name="DISTRICT_ID">
		 		<option value="">--เลือกตำบล--</option>
		 	</select>
		 </div>
	</div>
	<div class="form-group">
		 <label for="amphur" class="col-sm-3 control-label">หมู่บ้าน</label>
		 <div class="col-sm-9">
		 	<select class="form-control" id="amphur" name="amphur_id">
		 		<option value="">--เลือกหมู่บ้าน--</option>
		 	</select>
		 </div>
	</div>

		<div class="form-group">
		 <label for="published" class="col-sm-3 control-label">สถานะ</label>
		 <div class="col-sm-9">
		 	<select class="form-control" id="published" name="published">
		 		<option value="">--เลือกสถานะ--</option>
		 	</select>
		 </div>
	</div>
	  	<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
      <button class="btn icon-btn btn-success save" type="submit"><span class="btn-glyphicon fa fa-check img-circle text-success"></span>ตกลง</button>
    </div>
  </div>

						
</form>