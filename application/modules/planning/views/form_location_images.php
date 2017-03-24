<form method="post" class="form-horizontal" action="<?=$action_url?>">
<div class="col-md-12">
    <h4 class="text-success">เอกสารหรือสื่อประกอบและแผนที่ตั้งโครงการ</h4>
	<p>อธิบายเกี่ยวกับภาพตัวอย่างเช่นภาพก่อนทำโครงการ หรือสื่อวิดีโอ รูปภาพ ประกอบโครงการ</p>
		<div class="form-group">
		 <div class="col-md-12">
		 	<textarea rows="28" class="form-control" name="MEDIAS" id="content_detail"><?php if(!empty($project_planning->MEDIAS)):?><?=$project_planning->MEDIAS?><?php endif;?></textarea>
		 </div>
	</div>	
</div>
<div class="col-md-12">
<h4 class="text-success">แผนที่ตั้งโครงการ</h4>
<label>ปีงบประมาณ</label> <?=$project_planning->YEAR?> <label>จังหวัด</label> <?=$project_planning->PROVINCE_NAME?> <label>อำเภอ</label> <?=$project_planning->AMPHUR_NAME?> <label>ตำบล</label> <?=$project_planning->DISTRICT_NAME?><br>
		<div class="form-group">
		  <div>
			  <input <?php if(!empty($trader)):?>value="<?=$trader->map_address?>"<?php endif?> id="map-address" name="map_address" type="text" class="form-control">
			  <span class="help-block">ค้นหาสถานที่ ระบุชื่อสถานที่</span> 
			 </div>
		 </div>		
		<div class="input-group">
      		<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i>Latitude</span>
			<input <?php if(!empty($project_planning->LATITUDE)):?>value="<?=$project_planning->LATITUDE?>"<?php endif?> class="form-control" type="text" name="latitude" id="latitude" />
			<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i>Longtitude</span>
			<input <?php if(!empty($project_planning->LONGTITUDE)):?>value="<?=$project_planning->LONGTITUDE?>"<?php endif?> class="form-control" type="text" name="longtitude"  id="longtitude" />
		</div>
	
<div id="gm-map"></div>
</div>
<div class="col-md-12">
  <?php if(!empty($action_btn)):?>
  <br>
  	<div class="form-group">
    <div class="col-md-offset-5">
      <?=$action_btn?>
    </div>
  </div>
  <?php endif;?>	
</div>
</form>