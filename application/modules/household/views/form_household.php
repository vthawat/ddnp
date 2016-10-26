<form method="post" class="form-horizontal" action="<?=base_url('household/post/'.$provice_id)?>">

 <div class="form-group bg-green">
    <label for="year_budget" class="col-sm-2 control-label">ปีงบประมาณ*</label>
    <div class="col-sm-10">
      <select class="form-control" name="BUDGET_YEAR_ID" id="year_budget" required="">
      	<?php if(!empty($year_budget)) foreach($year_budget as $item):?>
      		<?php if($Project->BUDGET_YEAR_ID!=$item->ID):?>
      		<option value="<?=$item->ID?>"><?=$item->YEAR?></option>
      		<?php else:?>
      			<option value="<?=$Project->BUDGET_YEAR_ID?>" selected><?=$Project->YEAR?></option>
      		<?php endif;?>
      	<?php endforeach;?>
      </select>      	
    </div>
  </div>

	<div class="form-group bg-yellow <?php if(form_error('AMPHUR_ID')) print 'has-error'?>">
    <label for="amphur" class="col-sm-2 control-label"><?=$this->amphur->desc?>*</label>
    <div class="col-sm-10">
      <select class="form-control" name="AMPHUR_ID" id="amphur" required="">
      	<option value=""></option>
      	<?php if(!empty($amphur)) foreach($amphur as $item):?>
      		<?php if($item->ID==set_value('AMPHUR_ID')||$item->ID==$Project->AMPHUR_ID):?>
      			<option value="<?=$item->ID?>" selected><?=$item->AMPHUR_NAME?></option>
      		<?php else:?>
      		<option value="<?=$item->ID?>"><?=$item->AMPHUR_NAME?></option>
      		<?php endif;?>
      	<?php endforeach;?>
      </select>      	
    </div>
  </div>

	<div class="form-group bg-aqua <?php if(form_error('DISTRICT_ID')) print 'has-error'?>">
    <label for="district" class="col-sm-2 control-label"><?=$this->district->desc?>*</label>
    <div class="col-sm-10">
    	<?php if(empty($Project))
		{
    		$district=$this->district->get_by_amphur_id(set_value('AMPHUR_ID'));
			$district_selected=set_value('DISTRICT_ID');
		}
		
		else{
				$district=$this->district->get_by_amphur_id($Project->AMPHUR_ID);
				$district_selected=$Project->DISTRICT_ID;
			}
			
    	?>
      <select class="form-control" name="DISTRICT_ID" id="district" required="">
      	<option value=""></option>
      	<?php foreach($district as $item):?>
      		<option value="<?=$item->ID?>" <?php if($district_selected==$item->ID) print ' selected'?>><?=$item->DISTRICT_NAME?></option>
      	<?php endforeach?>
      </select>
    </div>
  </div>


	<div class="form-group bg-gray">
    <label for="village" class="col-sm-2 control-label"><?=$this->village->desc?>*</label>
    <div class="col-sm-10">
    	<?php if(empty($Project))
		{
    		$village=$this->village->get_by_district_id(set_value('DISTRICT_ID'));
			$district_selected=set_value('DISTRICT_ID');
		}
		
		else{
				$village=$this->village->get_by_district_id($Project->DISTRICT_ID);
				$village_selected=$Project->DISTRICT_ID;
			}
			
    	?>
      <select class="form-control" name="VILL_ID" id="village" required="">
      	<option value=""></option>
      	<?php foreach($district as $item):?>
      		<option value="<?=$item->ID?>" <?php if($district_selected==$item->ID) print ' selected'?>><?=$item->DISTRICT_NAME?></option>
      	<?php endforeach?>
      </select>
    </div>
  </div>

<div class="form-group">
 	<label for="home-number" class="col-sm-2 control-label">บ้านเลขที่*</label>
 	<div class="col-sm-2"><input type="text" class="form-control" name="HOME_NUMBER" id="home-number" required=""></div>
</div>

<div class="form-group">
 	<label for="vill-number" class="col-sm-2 control-label">หมู่ที่*</label>
 	<div class="col-sm-1"><input type="text" class="form-control" name="VILL_NUMBER" id="vill-number" required=""></div>
</div>

<div class="form-group">
 	<label for="home-type" class="col-sm-2 control-label">สถานะการเป็นเจ้าของบ้านพักอาศัย</label>
 	<div class="col-sm-10">
 		<input type="checkbox" name="HOME_TYPE_A" value="1" id="home-type-a"> <label for="home-type-a">บ้านพักของตนเอง</label><br>
 		<input type="checkbox" name="HOME_TYPE_B" value="1" id="home-type-b"> <label for="home-type-b">บ้านเช่า</label><br>
 		<input type="checkbox" name="HOME_TYPE_C" value="1" id="home-type-c"> <label for="home-type-c">บ้านพัก/แฟรตราชการ</label>
 	</div>
</div>

<div class="form-group">
	<label for="prename" class="col-sm-2 control-label">คำนำหน้า</label>
	<div class="col-sm-2">
		<select class="form-control" name="PRE_NAME" id="prename">
			<option value="1">นาย</option>
			<option value="2">นาง</option>
			<option value="3">นางสาว</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">ชื่อ</label>
	<div class="col-sm-3"><input class="form-control" type="text" name="FIRST_NAME"></div>
</div>

<div class="form-group">
	<label for="lastname" class="col-sm-2 control-label">นามสกุล</label>
	<div class="col-sm-3"><input class="form-control" type="text" name="LAST_NAME"></div>
</div>

<div class="form-group">
	<label for="num-male" class="col-sm-2 control-label">จำนวนสมาชิกในครัวเรือนเพศชาย</label>
	<div class="col-sm-1"><input class="form-control num-male" type="text" name="NUM_MALE"></div>
</div>

<div class="form-group">
	<label for="num-female" class="col-sm-2 control-label">จำนวนสมาชิกในครัวเรือนเพศหญิง</label>
	<div class="col-sm-1"><input class="form-control num-female" type="text" name="NUM_FEMALE"></div>
</div>

<div class="form-group">
	<label for="num-family-member" class="col-sm-2 control-label">จำนวนทั้งหมดของสมาชิกในครัวเรือน</label>
	<div class="col-sm-1"><input class="form-control num-family-member" type="text" name="NUM_FAMILY_MEMBER"></div>
</div>

<div class="form-group">
	<label for="money-per-month" class="col-sm-2 control-label">รายได้ต่อเดือน</label>
	<div class="col-sm-2"><input class="form-control money-per-month" type="text" name="MONEY_PER_MONTH"></div>
</div>

<div class="form-group">
 	<label class="col-sm-2 control-label">ทัศนคติต่อรัฐ</label>
 	<div class="col-sm-10">
 		<input type="checkbox" name="ATTIRUDE_GO_LEVEL_H" value="1" id="att-h"> <label for="att-h">บวก</label><br>
 		<input type="checkbox" name="ATTIRUDE_GO_LEVEL_M" value="1" id="att-m"> <label for="att-m">ปานกลาง</label><br>
 		<input type="checkbox" name="ATTIRUDE_GO_LEVEL_L" value="1" id="att-l"> <label for="att-l">ลบ</label><br>
 		<input type="checkbox" name="ATTIRUDE_GO_LEVEL_ETC" value="1" id="att-etc"> <label for="att-etc">อื่นๆ</label><br>
 	</div>
</div>

<div class="form-group">
 	<label class="col-sm-2 control-label">ผู้หลบหนี/ผกร.</label>
 	<div class="col-sm-2">
 			<select name="NUM_FUGITIVE_PERSON" class="form-control fugitive-person">
 			<option value="0">-ไม่มี-</option>
 			<option value="1">1</option>
 			<option value="2">2</option>
 			<option value="3">3</option>
 			<option value="4">4</option>
 			<option value="5">5</option>
 			<option value="6">6</option>
 		</select>
 	</div>
 	<br><br>
 		 <div class="fugitive-name"></div>
 </div>

 <div class="form-group">
 	<label class="col-sm-2 control-label">ความเดือดร้อน</label>
 	<div class="col-sm-10">
 		<input type="checkbox" name="AFFLICTION_INCOME" value="1" id="income"> <label for="income">รายได้</label><br>
 		<input type="checkbox" name="AFFLICTION_AILING" value="1" id="ailing"> <label for="ailing">ความเจ็บป่วย</label><br>
 		<input type="checkbox" name="AFFLICTION_HOUSE" value="1" id="house"> <label for="house">ที่อยู่อาศัย</label><br>
 		<input type="checkbox" name="AFFLICTION_SAFETY" value="1" id="safety"> <label for="safety">ความปลอดภัย</label><br>
 		<label for="affliction-etc">อื่นๆ</label><input type="text" name="AFFLICTION_ETC" class="form-control"><br>
 	</div>
 </div>

  <div class="form-group">
 	<label class="col-sm-2 control-label">ความต้องการอาชีพ</label>
 	<div class="col-sm-10">
 		<input type="checkbox" name="AVOCATION_FARM" value="1" id="farm"> <label for="farm">เกษตร(อุปกรณ์การเกษตร ปุ๋ย การพัฒนาความรู้ ที่ดินทำกิน)</label><br>
 		<input type="checkbox" name="AVOCATION_ANIMAL" value="1" id="animal"> <label for="animal">เลี้ยงสัตว์</label><br>
 		<input type="checkbox" name="AVOCATION_FISHER" value="1" id="fisher"> <label for="fisher">ประมง</label><br>
 		<input type="checkbox" name="AVOCATION_TECH" value="1" id="tech"> <label for="tech">ช่างฝีมือ/คหกรรม (ช่างไฟฟา ประปา ช่างซ่อมอุปกรณ์ต่างๆ ช่างตัดผม การทำขนม อาหาร)</label><br>
 		<input type="checkbox" name="AVOCATION_TRADE" value="1" id="trade"> <label for="trade">ค้าขาย</label><br>
 		<input type="checkbox" name="AVOCATION_CAREER" value="1" id="career"> <label for="career">ทุนประกอบอาชีพ</label><br>
 		<input type="checkbox" name="AVOCATION_EDUCATION" value="1" id="education"> <label for="education">ทุนการศึกษา</label><br>
 		<label for="avocation-etc">อื่นๆ</label><input type="text" name="AVOCATION_ETC" class="form-control"><br>
 	</div>
 </div>

<div class="form-group">
 	<label class="col-sm-2 control-label">คนเจ็บป่วย</label>
 	<div class="col-sm-2">
 			<select name="NUM_PATIENT_PERSON" class="form-control patient-person">
 			<option value="0">-ไม่มี-</option>
 			<option value="1">1</option>
 			<option value="2">2</option>
 			<option value="3">3</option>
 			<option value="4">4</option>
 			<option value="5">5</option>
 			<option value="6">6</option>
 		</select>
 	</div>
 	<br><br>
 		 <div class="patient-name"></div>
 </div>


  <?php if(!empty($action_btn)):?>
  	<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <?=$action_btn?>
    </div>
  </div>
  <?php endif;?>
</form>