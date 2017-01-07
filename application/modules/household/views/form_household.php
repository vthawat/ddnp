<form method="post" class="form-horizontal" action="<?=$action_url?>">

 <div class="form-group bg-green">
    <label for="year_budget" class="col-sm-2 control-label">ปีงบประมาณ*</label>
    <div class="col-sm-10">
      <select class="form-control" name="BUDGET_YEAR_ID" id="year_budget" required="">
      	<?php if(!empty($year_budget)) foreach($year_budget as $item):?>
      		<?php if($household->BUDGET_YEAR_ID!=$item->ID):?>
      		<option value="<?=$item->ID?>"><?=$item->YEAR?></option>
      		<?php else:?>
      			<option value="<?=$household->BUDGET_YEAR_ID?>" selected><?=$household->YEAR?></option>
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
      		<?php if($item->ID==$household->AMPHUR_ID):?>
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
    	<?php if(!empty($household))
		{

				$district=$this->district->get_by_amphur_id($household->AMPHUR_ID);
				$district_selected=$household->DISTRICT_ID;
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
    <label for="village" class="col-sm-2 control-label">ชื่อ<?=$this->village->desc?>*</label>
    <div class="col-sm-10">
    	<?php if(!empty($household))
		{

				$village=$this->village->get_by_district_id($household->DISTRICT_ID);
				$village_selected=$household->VILL_ID;
			}
			
    	?>
      <select class="form-control" name="VILL_ID" id="village" required="">
      	<option value=""></option>
      	<?php foreach($village as $item):?>
      		<option value="<?=$item->ID?>" <?php if($village_selected==$item->ID) print ' selected'?>><?=$item->VILLAGE_NAME?></option>
      	<?php endforeach?>
      </select>
    </div>
  </div>

<div class="form-group">
 	<label for="home-number" class="col-sm-2 control-label">บ้านเลขที่</label>
 	<div class="col-sm-2"><div class="input-group">
  <input type="text" class="form-control" name="HOME_NUMBER" id="home-number" <?php if(!empty($household)):?> value="<?=$household->HOME_NUMBER?>"<?php endif?>>
  <span class="input-group-btn">
        <button class="btn btn-info null-home-number" type="button">ไม่มีบ้านเลขที่ให้คลิกปุ่มนี้</button>
      </span>
  </div></div>
</div>

<div class="form-group">
 	<label for="vill-number" class="col-sm-2 control-label">หมู่ที่</label>
 	<div class="col-sm-2">
<div class="input-group">
  <input type="text" class="form-control" name="VILL_NUMBER" id="vill-number" <?php if(!empty($household)):?> value="<?=$household->VILL_NUMBER?>"<?php endif?>>
    <span class="input-group-btn">
        <button class="btn btn-info null-vill-number" type="button">ไม่มีหมู่ที่ให้คลิกปุ่มนี้</button>
      </span>
  </div>
  </div>
</div>

<div class="form-group">
 	<label for="home-type" class="col-sm-2 control-label">สถานะการเป็นเจ้าของบ้านพักอาศัย</label>
 	<div class="col-sm-10">
 		<input type="checkbox" name="HOME_TYPE_A" value="1" id="home-type-a" <?php if(!empty($household)) if($household->HOME_TYPE_A):?> checked<?php endif?>> <label for="home-type-a">บ้านพักของตนเอง</label><br>
 		<input type="checkbox" name="HOME_TYPE_B" value="1" id="home-type-b" <?php if(!empty($household)) if($household->HOME_TYPE_B):?> checked<?php endif?>> <label for="home-type-b">บ้านเช่า</label><br>
 		<input type="checkbox" name="HOME_TYPE_C" value="1" id="home-type-c" <?php if(!empty($household)) if($household->HOME_TYPE_C):?> checked<?php endif?>> <label for="home-type-c">บ้านพัก/แฟรตราชการ</label>
    <p class="help-block">*หากไม่มีบ้านพักไม่ต้องคลิกเลือกรายการใดๆ ให้ไปกรอกข้อมูลในด้านความเดือนร้อนของที่อยู่อาศัยด้านล่าง</p>
 	</div>
</div>
<div class="form-group">
  <label for="prename" class="col-sm-2 control-label">หมายเลขบัตรประจำตัวประชาชน</label>
  <div class="col-sm-2">
  <input type="text" name="PERSON_ID" class="form-control person-id" <?php if(!empty($household)):?> value="<?=$household->PERSON_ID?>"<?php endif?>>
  </div>
</div>

<div class="form-group">
	<label for="prename" class="col-sm-2 control-label">คำนำหน้า</label>
	<div class="col-sm-2">
		<select class="form-control" name="PRE_NAME" id="prename">
			<option value="1" <?php if(!empty($household) && $household->PRE_NAME=='1'):?> selected<?php endif?>>นาย</option>
			<option value="2" <?php if(!empty($household) && $household->PRE_NAME=='2'):?> selected<?php endif?>>นาง</option>
			<option value="3" <?php if(!empty($household) && $household->PRE_NAME=='3'):?> selected<?php endif?>>นางสาว</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">ชื่อ</label>
	<div class="col-sm-3"><input class="form-control" type="text" name="FIRST_NAME" <?php if(!empty($household)):?> value="<?=$household->FIRST_NAME?>"<?php endif?>></div>
</div>

<div class="form-group">
	<label for="lastname" class="col-sm-2 control-label">นามสกุล</label>
	<div class="col-sm-3"><input class="form-control" type="text" name="LAST_NAME" <?php if(!empty($household)):?> value="<?=$household->LAST_NAME?>"<?php endif?>></div>
</div>

<div class="form-group">
	<label for="num-male" class="col-sm-2 control-label">จำนวนสมาชิกในครัวเรือนเพศชาย</label>
	<div class="col-sm-1"><input class="form-control num-male" type="text" name="NUM_MALE" <?php if(!empty($household)):?> value="<?=$household->NUM_MALE?>"<?php endif?>></div>
</div>

<div class="form-group">
	<label for="num-female" class="col-sm-2 control-label">จำนวนสมาชิกในครัวเรือนเพศหญิง</label>
	<div class="col-sm-1"><input class="form-control num-female" type="text" name="NUM_FEMALE" <?php if(!empty($household)):?> value="<?=$household->NUM_FEMALE?>"<?php endif?>></div>
</div>

<div class="form-group">
	<label for="num-family-member" class="col-sm-2 control-label">จำนวนทั้งหมดของสมาชิกในครัวเรือน</label>
	<div class="col-sm-1"><input class="form-control num-family-member" type="text" name="NUM_FAMILY_MEMBER" <?php if(!empty($household)):?> value="<?=$household->NUM_FAMILY_MEMBER?>"<?php endif?>></div>
</div>

<div class="form-group">
	<label for="money-per-month" class="col-sm-2 control-label">รายได้ต่อเดือน</label>
	<div class="col-sm-2"><input class="form-control money-per-month" type="text" name="MONEY_PER_MONTH" <?php if(!empty($household)):?> value="<?=$household->MONEY_PER_MONTH?>"<?php endif?>></div>
</div>

<div class="form-group">
 	<label class="col-sm-2 control-label">ทัศนคติต่อรัฐ</label>
 	<div class="col-sm-10">
 		<input type="checkbox" name="ATTIRUDE_GO_LEVEL_H" value="1" id="att-h" <?php if(!empty($household)) if($household->ATTIRUDE_GO_LEVEL_H):?> checked<?php endif?>> <label for="att-h">บวก</label><br>
 		<input type="checkbox" name="ATTIRUDE_GO_LEVEL_M" value="1" id="att-m" <?php if(!empty($household)) if($household->ATTIRUDE_GO_LEVEL_M):?> checked<?php endif?>> <label for="att-m">ปานกลาง</label><br>
 		<input type="checkbox" name="ATTIRUDE_GO_LEVEL_L" value="1" id="att-l" <?php if(!empty($household)) if($household->ATTIRUDE_GO_LEVEL_L):?> checked<?php endif?>> <label for="att-l">ลบ</label><br>
 		<input type="checkbox" name="ATTIRUDE_GO_LEVEL_ETC" value="1" id="att-etc" <?php if(!empty($household)) if($household->ATTIRUDE_GO_LEVEL_ETC):?> checked<?php endif?>> <label for="att-etc">อื่นๆ</label><br>
 	</div>
</div>

<div class="form-group">
 	<label class="col-sm-2 control-label">ผู้หลบหนี/ผกร.</label>
 	<div class="col-sm-2">
 			<select name="NUM_FUGITIVE_PERSON" class="form-control fugitive-person">
 			<option value="0">-ไม่มี-</option>
 			<option value="1" <?php if(!empty($household)&& $household->NUM_FUGITIVE_PERSON=='1'):?> selected <?php endif?>>1</option>
 			<option value="2" <?php if(!empty($household)&& $household->NUM_FUGITIVE_PERSON=='2'):?> selected <?php endif?>>2</option>
 			<option value="3" <?php if(!empty($household)&& $household->NUM_FUGITIVE_PERSON=='3'):?> selected <?php endif?>>3</option>
 			<option value="4" <?php if(!empty($household)&& $household->NUM_FUGITIVE_PERSON=='4'):?> selected <?php endif?>>4</option>
 			<option value="5" <?php if(!empty($household)&& $household->NUM_FUGITIVE_PERSON=='5'):?> selected <?php endif?>>5</option>
 			<option value="6" <?php if(!empty($household)&& $household->NUM_FUGITIVE_PERSON=='6'):?> selected <?php endif?>>6</option>
 		</select>
 	</div>
 	<br><br>
 		 <div class="fugitive-name">
      <?php if(!empty($household) && $household->NUM_FUGITIVE_PERSON!=0 && $household->NUM_FUGITIVE_PERSON!=''):?>
      <?php $fugitive_prename=explode(',', $household->FUGITIVE_PRENAME);
              $fugitive_first_name=explode(',', $household->FUGITIVE_FIRST_NAME);
              $fugitive_last_name=explode(',', $household->FUGITIVE_LAST_NAME);
              $fugitive_status=explode(',', $household->FUGITIVE_STATUS);

      foreach($fugitive_prename as $key=>$value):?>
            <div class="col-sm-offset-2 col-sm-10"><div class="col-sm-2">
                        <select name="FUGITIVE_PRENAME[]" class="form-control">
                         <option value="1"<?php if($value=='1'):?> selected <?php endif?>>นาย</option>
                          <option value="2"<?php if($value=='2'):?> selected <?php endif?>>นาง</option>
                          <option value="3"<?php if($value=='3'):?> selected <?php endif?>>นางสาว</option>
                          <option value="4"<?php if($value=='4'):?> selected <?php endif?>>เด็กชาย</option>
                          <option value="5"<?php if($value=='5'):?> selected <?php endif?>>เด็กหญิง</option>
                        </select>
                      </div>
                     <div class="col-sm-3"><input type="text" name="FUGITIVE_FIRST_NAME[]" class="form-control" placeholder="ชื่อ" value="<?=$fugitive_first_name[$key]?>"></div>
                      <div class="col-sm-3"><input type="text" name="FUGITIVE_LAST_NAME[]" class="form-control" placeholder="นามสกุล" value="<?=$fugitive_last_name[$key]?>"></div>
                      <div class="col-sm-2">
                        <select name="FUGITIVE_STATUS[]" class="form-control">
                          <option value="0"<?php if($fugitive_status[$key]=='0'):?> selected <?php endif?>>-สถานะ-</option>
                          <option value="1"<?php if($fugitive_status[$key]=='1'):?> selected <?php endif?>>ป.วิอาญา</option>
                          <option value="2"<?php if($fugitive_status[$key]=='2'):?> selected <?php endif?>>พรก.</option>
                          <option value="3"<?php if($fugitive_status[$key]=='3'):?> selected <?php endif?>>ระแวง</option>
                        </select>
                      </div>
                </div>
      <?php endforeach;endif?>
     </div>
 </div>

 <div class="form-group bg-danger">
 	<label class="col-sm-2 control-label">ความเดือดร้อน</label>
 	<div class="col-sm-10">
 		<input type="checkbox" class="cls-desc" name="AFFLICTION_INCOME" value="1" id="income" <?php if(!empty($household)) if($household->AFFLICTION_INCOME):?> checked<?php endif?>> <label for="income">รายได้</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AFFLICTION_INCOME_DESC"><?php if(!empty($household)):?><?=$household->AFFLICTION_INCOME_DESC?><?php endif?></textarea><br>
 		<input type="checkbox" class="cls-desc" name="AFFLICTION_AILING" value="1" id="ailing" <?php if(!empty($household)) if($household->AFFLICTION_AILING):?> checked<?php endif?>> <label for="ailing">ความเจ็บป่วย</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AFFLICTION_AILING_DESC"><?php if(!empty($household)):?><?=$household->AFFLICTION_AILING_DESC?><?php endif?></textarea><br>
 		<input type="checkbox" class="cls-desc" name="AFFLICTION_HOUSE" value="1" id="house" <?php if(!empty($household)) if($household->AFFLICTION_HOUSE):?> checked<?php endif?>> <label for="house">ที่อยู่อาศัย</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AFFLICTION_HOUSE_DESC"><?php if(!empty($household)):?><?=$household->AFFLICTION_HOUSE_DESC?><?php endif?></textarea><br>
 		<input type="checkbox" class="cls-desc" name="AFFLICTION_SAFETY" value="1" id="safety" <?php if(!empty($household)) if($household->AFFLICTION_SAFETY):?> checked<?php endif?>> <label for="safety">ความปลอดภัย</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AFFLICTION_SAFETY_DESC"><?php if(!empty($household)):?><?=$household->AFFLICTION_SAFETY_DESC?><?php endif?></textarea><br>
 		<input type="checkbox" class="cls-desc" <?php if(!empty($household)) if($household->AFFLICTION_ETC):?> checked<?php endif?>> <label for="affliction-etc">อื่นๆ</label><br><label>(ระบุรายละเอียด)</label><br><textarea name="AFFLICTION_ETC" class="form-control auto-check"><?php if(!empty($household)&&$household->AFFLICTION_ETC!='0'):?><?=$household->AFFLICTION_ETC?><?php endif?></textarea><br>
 	</div>
 </div>

  <div class="form-group bg-info">
 	<label class="col-sm-2 control-label">ความต้องการอาชีพ</label>
 	<div class="col-sm-10">
 		<input type="checkbox" class="cls-desc" name="AVOCATION_FARM" value="1" id="farm" <?php if(!empty($household)) if($household->AVOCATION_FARM):?> checked<?php endif?>> <label for="farm">เกษตร</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AVOCATION_FARM_DESC"><?php if(!empty($household)):?><?=$household->AVOCATION_FARM_DESC?><?php endif?></textarea>
    <p class="help-block">ตัวอย่างเช่น อุปกรณ์การเกษตร ปุ๋ย การพัฒนาความรู้ ที่ดินทำกิน</p>
 		<input type="checkbox" class="cls-desc" name="AVOCATION_ANIMAL" value="1" id="animal" <?php if(!empty($household)) if($household->AVOCATION_ANIMAL):?> checked<?php endif?>> <label for="animal">เลี้ยงสัตว์</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AVOCATION_ANIMAL_DESC"><?php if(!empty($household)):?><?=$household->AVOCATION_ANIMAL_DESC?><?php endif?></textarea><br>
 		<input type="checkbox" class="cls-desc" name="AVOCATION_FISHER" value="1" id="fisher" <?php if(!empty($household)) if($household->AVOCATION_FISHER):?> checked<?php endif?>> <label for="fisher">ประมง</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AVOCATION_FISHER_DESC"><?php if(!empty($household)):?><?=$household->AVOCATION_FISHER_DESC?><?php endif?></textarea><br>
 		<input type="checkbox" class="cls-desc" name="AVOCATION_TECH" value="1" id="tech" <?php if(!empty($household)) if($household->AVOCATION_TECH):?> checked<?php endif?>> <label for="tech">ช่างฝีมือ/คหกรรม</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AVOCATION_TECH_DESC"><?php if(!empty($household)):?><?=$household->AVOCATION_TECH_DESC?><?php endif?></textarea>
    <p class="help-block">ตัวอย่างเช่น ช่างไฟฟ้า ประปา ช่างซ่อมอุปกรณ์ต่างๆ ช่างตัดผม การทำขนม อาหาร</p>
 		<input type="checkbox" class="cls-desc" name="AVOCATION_TRADE" value="1" id="trade" <?php if(!empty($household)) if($household->AVOCATION_TRADE):?> checked<?php endif?>> <label for="trade">ค้าขาย</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AVOCATION_TRADE_DESC"><?php if(!empty($household)):?><?=$household->AVOCATION_TRADE_DESC?><?php endif?></textarea><br>
 		<input type="checkbox" class="cls-desc" name="AVOCATION_CAREER" value="1" id="career" <?php if(!empty($household)) if($household->AVOCATION_CAREER):?> checked<?php endif?>> <label for="career">ทุนประกอบอาชีพ</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AVOCATION_CAREER_DESC"><?php if(!empty($household)):?><?=$household->AVOCATION_CAREER_DESC?><?php endif?></textarea><br>
 		<input type="checkbox" class="cls-desc" name="AVOCATION_EDUCATION" value="1" id="education" <?php if(!empty($household)) if($household->AVOCATION_EDUCATION):?> checked<?php endif?>> <label for="education">ทุนการศึกษา</label><br>
    <label>(ระบุรายละเอียด)</label><br><textarea class="form-control auto-check" name="AVOCATION_EDUCATION_DESC"><?php if(!empty($household)):?><?=$household->AVOCATION_EDUCATION_DESC?><?php endif?></textarea><br>
 		<input type="checkbox" class="cls-desc" <?php if(!empty($household)) if($household->AVOCATION_ETC):?> checked<?php endif?>> <label for="avocation-etc">อื่นๆ</label><br><label>(ระบุรายละเอียด)</label><br><textarea name="AVOCATION_ETC" class="form-control auto-check"><?php if(!empty($household)&&$household->AVOCATION_ETC!='0'):?><?=$household->AVOCATION_ETC?><?php endif?></textarea><br>
 	</div>
 </div>

<div class="form-group">
 	<label class="col-sm-2 control-label">คนเจ็บป่วย</label>
 	<div class="col-sm-2">
 			<select name="NUM_PATIENT_PERSON" class="form-control patient-person">
 			<option value="0">-ไม่มี-</option>
 			<option value="1"<?php if(!empty($household)&& $household->NUM_PATIENT_PERSON=='1'):?> selected <?php endif?>>1</option>
 			<option value="2"<?php if(!empty($household)&& $household->NUM_PATIENT_PERSON=='2'):?> selected <?php endif?>>2</option>
 			<option value="3"<?php if(!empty($household)&& $household->NUM_PATIENT_PERSON=='3'):?> selected <?php endif?>>3</option>
 			<option value="4"<?php if(!empty($household)&& $household->NUM_PATIENT_PERSON=='4'):?> selected <?php endif?>>4</option>
 			<option value="5"<?php if(!empty($household)&& $household->NUM_PATIENT_PERSON=='5'):?> selected <?php endif?>>5</option>
 			<option value="6"<?php if(!empty($household)&& $household->NUM_PATIENT_PERSON=='6'):?> selected <?php endif?>>6</option>
 		</select>
 	</div>
 	<br><br>
 		 <div class="patient-name">
            <?php if(!empty($household) && $household->NUM_PATIENT_PERSON!=0 && $household->NUM_PATIENT_PERSON!=''):?>
      <?php $patient_prename=explode(',', $household->PATIENT_PRENAME);
              $patient_first_name=explode(',', $household->PATIENT_FIRST_NAME);
              $patient_last_name=explode(',', $household->PATIENT_LAST_NAME);
              $patient_desc=explode(',', $household->PATIENT_DESC);
      foreach($patient_prename as $key=>$value):?>
            <div class="col-sm-offset-2 col-sm-10"><div class="col-sm-2">
                        <select name="PATIENT_PRENAME[]" class="form-control">
                         <option value="1"<?php if($value=='1'):?> selected <?php endif?>>นาย</option>
                          <option value="2"<?php if($value=='2'):?> selected <?php endif?>>นาง</option>
                          <option value="3"<?php if($value=='3'):?> selected <?php endif?>>นางสาว</option>
                          <option value="4"<?php if($value=='4'):?> selected <?php endif?>>เด็กชาย</option>
                          <option value="5"<?php if($value=='5'):?> selected <?php endif?>>เด็กหญิง</option>
                        </select>
                      </div>
                     <div class="col-sm-3"><input type="text" name="PATIENT_FIRST_NAME[]" class="form-control" placeholder="ชื่อ" value="<?=$patient_first_name[$key]?>"></div>
                      <div class="col-sm-3"><input type="text" name="PATIENT_LAST_NAME[]" class="form-control" placeholder="นามสกุล" value="<?=$patient_last_name[$key]?>"></div>
                      <div class="col-sm-3"><input type="text" name="PATIENT_DESC[]" class="form-control" placeholder="ความเจ็บป่วย/อาการ" value="<?=$patient_desc[$key]?>"></div>
                </div>
      <?php endforeach;endif?> 
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