<div class="col-md-6">
    <h4 class="text-success">ภาพเกี่ยวกับโครงการ</h4>
</div>
<div class="col-md-6">
<h4 class="text-success">กำหนดแผนที่ตั้งโครงการ</h4>
<label>ปีงบประมาณ</label> <?=$project_planning->YEAR?> <label>จังหวัด</label> <?=$project_planning->PROVINCE_NAME?> <label>อำเภอ</label> <?=$project_planning->AMPHUR_NAME?> <label>ตำบล</label> <?=$project_planning->DISTRICT_NAME?><br>
		<div class="form-group">
		  <div>
			  <input <?php if(!empty($trader)):?>value="<?=$trader->map_address?>"<?php endif?> id="map-address" name="map_address" type="text" class="form-control">
			  <span class="help-block">ค้นหาสถานที่ ระบุชื่อสถานที่</span> 
			 </div>
		 </div>		
		<div class="input-group">
      		<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i>Latitude</span>
			<input <?php if(!empty($trader)):?>value="<?=$trader->latitude?>"<?php endif?> class="form-control" type="text" name="latitude" id="latitude" />
			<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i>Longtitude</span>
			<input <?php if(!empty($trader)):?>value="<?=$trader->longtitude?>"<?php endif?> class="form-control" type="text" name="longtitude"  id="longtitude" />
		</div>
	
<div id="gm-map"></div>
</div>