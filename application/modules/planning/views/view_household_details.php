<div class="col-lg-6">
	<h3>รายละเอียดเกี่ยวกับครัวเรือน</h3>
	<table class="table table-responsive">		
		<tbody>
			<tr>
				<th class="bg-green text-right col-lg-4">ปีงบประมาณ</th>
				<td><?=$household->YEAR?></td>
			</tr>
			<tr>
				<th class="bg-primary text-right"><?=$this->province->desc?></th>
				<td><?=$household->PROVINCE_NAME?></td>
			</tr>
			<tr>
				<th class="bg-yellow text-right"><?=$this->amphur->desc?></th>
				<td><?=$household->AMPHUR_NAME?></td>
			</tr>
			<tr>
				<th class="bg-aqua text-right"><?=$this->district->desc?></th>
				<td><?=$household->DISTRICT_NAME?></td>
			</tr>
			<tr>
				<th class="bg-gray text-right"><?=$this->village->desc?></th>
				<td><?=$household->VILLAGE_NAME?></td>
			</tr>
			<tr>
				<th class="text-right">บ้านเลขที่</th>
				<td><?=$household->HOME_NUMBER?></td>
			</tr>
			<tr>
				<th class="text-right">หมู่ที่</th>
				<td><?=$household->VILL_NUMBER?></td>
			</tr>			
			<tr>
				<th class="text-right">เจ้าบ้าน ชื่อ-นามสกุล</th>
				<td><?=prename($household->PRE_NAME)?><?=$household->FIRST_NAME?> <?=$household->LAST_NAME?></td>
			</tr>
			<tr>
				<th class="text-right">สถานะการเป็นเจ้าของบ้านพักอาศัย</th>
				<td><?=home_type_checked($household->HOME_TYPE_A)?> <label>บ้านพักของตนเอง</label><br>
 		<?=home_type_checked($household->HOME_TYPE_B)?> <label>บ้านเช่า</label><br>
 		<?=home_type_checked($household->HOME_TYPE_C)?> <label>บ้านพัก/แฟรตราชการ</label></td>
			</tr>
			<tr>
				<th class="text-right">จำนวนสมาชิกเพศชาย</th>
				<td><i class="fa fa-fw fa-male"></i><?=$household->NUM_MALE?> คน</td>
			</tr>	
			<tr>
				<th class="text-right">จำนวนสมาชิกเพศหญิง</th>
				<td><i class="fa fa-fw fa-female"></i><?=$household->NUM_FEMALE?> คน</td>
			</tr>
			<tr>
				<th class="text-right">จำนวนสมาชิกในครัวเรือนทั้งหมด</th>
				<td><i class="fa fa-fw fa-home"></i><?=$household->NUM_FAMILY_MEMBER?> คน</td>
			</tr>
			<tr>
				<th class="text-right">รายได้ต่อเดือน</th>
				<td><i class="fa fa-fw fa-btc"></i><?=number_format($household->MONEY_PER_MONTH,2)?> บาท</td>
			</tr>
			<tr>
				<th class="text-right">ทัศนคติต่อรัฐ</th>
				<td><?=attitude_level_checked($household->ATTIRUDE_GO_LEVEL_H)?> <label>บวก</label><br>
 		<?=attitude_level_checked($household->ATTIRUDE_GO_LEVEL_M)?> <label>ปานกลาง</label><br>
 		<?=attitude_level_checked($household->ATTIRUDE_GO_LEVEL_L)?> <label>ลบ</label><br>
 		<?=attitude_level_checked($household->ATTIRUDE_GO_LEVEL_ETC)?> <label>อื่นๆ</label></td>
			</tr>
			<tr>
				<th class="text-right">ผู้หลบหนี/ผกร.</th>
				<td>
					<?php if(empty($household->NUM_FUGITIVE_PERSON)):?>
						<label>ไม่มี</label>
					<?php else:?>
						<?php
							$fugitive_prename=explode(',', $household->FUGITIVE_PRENAME);
							$fugitive_first_name=explode(',', $household->FUGITIVE_FIRST_NAME);
							$fugitive_last_name=explode(',', $household->FUGITIVE_LAST_NAME);
							$fugitive_status=explode(',', $household->FUGITIVE_STATUS);
						?>
						<ul class="list-group">
						<?php foreach($fugitive_prename as $key=>$value):?>
							
								<li class="list-group-item"><span><?=$key+1;?>.<?=fugitive_prename($value)?><?=$fugitive_first_name[$key]?> <?=$fugitive_last_name[$key]?></span> <label class="pull-right">สถานะ<i class="fa fa-fw fa-angle-double-right"></i><?=fugitive_status($fugitive_status[$key])?></label></li>
							
						<?php endforeach;?>
						</ul>
					<?php endif;?>
				</td>
			</tr>									
		</tbody>
	</table>
</div>
<div class="col-lg-6">
	<h3>รายละเอียดเกี่ยวกับความต้องการและความเดือดร้อน</h3>
<table class="table table-responsive">		
		<tbody>
			<tr>
				<th class="text-right">ความเดือดร้อน</th>
				<td>
					<?=affliction_checked($household->AFFLICTION_INCOME)?> <label>รายได้</label><br>
 		<?=affliction_checked($household->AFFLICTION_AILING)?> <label>ความเจ็บป่วย</label><br>
 		<?=affliction_checked($household->AFFLICTION_HOUSE)?> <label>ที่อยู่อาศัย</label><br>
 		<?=affliction_checked($household->AFFLICTION_SAFETY)?> <label>ความปลอดภัย</label><br>
 		<?=affliction_checked($household->AFFLICTION_ETC)?> <label>อื่นๆ</label> <label><?php if($household->AFFLICTION_ETC!='0'):?><?=$household->AFFLICTION_ETC?><?php endif;?></label>

				</td>
			</tr>
		<tr>
			<th class="text-right">ความต้องการอาชีพ</th>
			<td>
				<?=avocation_checked($household->AVOCATION_FARM)?> <label>เกษตร(อุปกรณ์การเกษตร ปุ๋ย การพัฒนาความรู้ ที่ดินทำกิน)</label><br>
 		<?=avocation_checked($household->AVOCATION_ANIMAL)?> <label>เลี้ยงสัตว์</label><br>
 		<?=avocation_checked($household->AVOCATION_FISHER)?> <label>ประมง</label><br>
 		<?=avocation_checked($household->AVOCATION_TECH)?> <label>ช่างฝีมือ/คหกรรม (ช่างไฟฟา ประปา ช่างซ่อมอุปกรณ์ต่างๆ ช่างตัดผม การทำขนม อาหาร)</label><br>
 		<?=avocation_checked($household->AVOCATION_TRADE)?> <label>ค้าขาย</label><br>
 		<?=avocation_checked($household->AVOCATION_CAREER)?> <label>ทุนประกอบอาชีพ</label><br>
 		<?=avocation_checked($household->AVOCATION_EDUCATION)?> <label>ทุนการศึกษา</label><br>
 		<?=avocation_checked($household->AVOCATION_ETC)?> <label>อื่นๆ</label> <label><?php if($household->AVOCATION_ETC!='0'):?><?=$household->AVOCATION_ETC?><?php endif;?></label>
			</td>
		</tr>

			<tr>
				<th class="text-right">คนเจ็บป่วย</th>
				<td>
					<?php if(empty($household->NUM_PATIENT_PERSON)):?>
						<label>ไม่มี</label>
					<?php else:?>
						<?php
							$patient_prename=explode(',', $household->PATIENT_PRENAME);
							$patient_first_name=explode(',', $household->PATIENT_FIRST_NAME);
							$patient_last_name=explode(',', $household->PATIENT_LAST_NAME);
						?>
						<ul class="list-group">
						<?php foreach($patient_prename as $key=>$value):?>
							
								<li class="list-group-item"><span><?=$key+1;?>.<?=fugitive_prename($value)?><?=$patient_first_name[$key]?> <?=$patient_last_name[$key]?></span></li>
							
						<?php endforeach;?>
						</ul>
					<?php endif;?>
				</td>
			</tr>		

		</tbody>
</table>
</div>