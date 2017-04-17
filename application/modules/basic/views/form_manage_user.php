<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
			 <div class="form-group">
					<label for="email" class="col-sm-2 control-label">อีเมล</label>
					<div class="col-md-4 col-sm-10">
					<input type="email" class="form-control" id="email" name="email" value="<?php if(!empty($edit_item)) print $edit_item->email?>" placeholder="newuser@email.com" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">รหัสผ่าน</label>
					<div class="col-md-4 col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					<span class="help-block">*กำหนดอย่างน้อย 6 ตัวอักษร</span>
					</div>
				</div>
				<div class="form-group">
					<label for="first_name" class="col-sm-2 control-label">ชื่อ</label>
					<div class="col-md-4 col-sm-10">
					<input type="text" class="form-control" id="first_name" name="first_name" value="<?php if(!empty($edit_item)) print $edit_item->first_name?>" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="last_name" class="col-sm-2 control-label">นามสกุล</label>
					<div class="col-md-4 col-sm-10">
					<input type="text" class="form-control" id="last_name" name="last_name" value="<?php if(!empty($edit_item)) print $edit_item->last_name?>" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="phone" class="col-sm-2 control-label">หมายเลขโทรศัพท์</label>
					<div class="col-md-4 col-sm-10">
					<input type="text" class="form-control" id="phone" name="phone" value="<?php if(!empty($edit_item)) print $edit_item->phone?>" placeholder="" required>
					</div>
				</div>
                <div class="form-group">
                    <label for="role" class="col-sm-2 control-label">ระดับสิทธิ์</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="role" name="user_role_id" required>
                            <option value="0">---เลือกระดับสิทธิ์----</option>
                            <?php foreach($this->manage_user->get_role_all() as $item):?>
                            <option value="<?=$item->id?>" <?php if(!empty($edit_item)&& $item->id==$edit_item->user_role_id) print 'selected';?>><?=$item->role_name?></option>
                            <?php endforeach;?>
                        </select>
                 </div>
 			 </div>
			   <?php if(!empty($edit_item)):?>
			   	 <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">สถานะการใช้งาน</label>
					<div class="col-sm-3">
						<select class="form-control" id="role" name="status">
							<?php $status_list=array(0=>'ระงับการใช้งาน',1=>'เปิดใช้งาน')?>
							<?php foreach($status_list as $key=>$status):?>
							<option value="<?=$key?>" <?php if($edit_item->status==$key) print 'selected';?>><?=$status?></option>
							<?php endforeach;?>
						</select>
					</div>
				 </div>
			   <?php endif;?>
			  <div class="set-scope">

			  <?php if(!empty($edit_item)):?>
			  	<?php if($edit_item->user_role_id==2):?>
				<div class="form-group"><label for="province" class="col-sm-2 control-label">จังหวัด</label>
						<div class="col-sm-3">
						<select class="form-control province"><option value="0">--เลือกจังหวัด--</option>
						<?php foreach($this->province->get_all(TRUE) as $item):?>
							<option value="<?=$item->ID?>" <?php if($this->province->find_info_by_village($edit_item->village_id)->PROVINCE_ID==$item->ID) print 'selected'?>><?=$item->PROVINCE_NAME?></option>
						<?php endforeach;?>	
						</select>
						</div></div>
						<div class="form-group"><label for="amphur" class="col-sm-2 control-label">อำเภอ</label>
						<div class="col-sm-3">
						<select class="form-control" id="amphur"><option value="0">--เลือกอำเภอ--</option>
						<?php foreach($this->amphur->get_by_province($this->province->find_info_by_village($edit_item->village_id)->PROVINCE_ID) as $item):?>
							<option value="<?=$item->ID?>" <?php if($this->province->find_info_by_village($edit_item->village_id)->AMPHUR_ID==$item->ID) print 'selected'?>><?=$item->AMPHUR_NAME?></option>
						<?php endforeach;?>	
						</select>
						</div></div>
						<div class="form-group"><label for="district" class="col-sm-2 control-label">ตำบล</label>
						<div class="col-sm-3">
						<select class="form-control" id="district"><option value="0">--เลือกตำบล--</option>
						<?php foreach($this->district->get_by_amphur_id($this->province->find_info_by_village($edit_item->village_id)->AMPHUR_ID) as $item):?>
							<option value="<?=$item->ID?>" <?php if($this->province->find_info_by_village($edit_item->village_id)->DISTRICT_ID==$item->ID) print 'selected'?>><?=$item->DISTRICT_NAME?></option>
						<?php endforeach;?>	
						</select>
						</div></div>
						<div class="form-group bg-blue"><label for="village" class="col-sm-2 control-label">หมู่บ้าน</label>
						<div class="col-sm-3">
						<select class="form-control" id="village" name="village_id"><option value="0">-เลือกหมู่บ้าน-</option>
						<?php foreach($this->village->get_by_district_id($this->province->find_info_by_village($edit_item->village_id)->DISTRICT_ID) as $item):?>
							<option value="<?=$item->ID?>" <?php if($edit_item->village_id==$item->ID) print 'selected'?>><?=$item->VILLAGE_NAME?></option>
						<?php endforeach;?>	
						</select>
						</div></div>
				<?php endif;?>
				<?php if($edit_item->user_role_id==3):?>
					<div class="form-group bg-blue"><label for="permiss" class="col-sm-2 control-label">กระทรวง</label>
					<div class="col-sm-3">
					<select class="form-control" name="village_id"><option value="0">--เลือกกระทรวง--</option>
					<?php foreach($this->ministry->get_all() as $item):?>
					<option value="<?=$item->ID?>" <?php if($edit_item->village_id==$item->ID) print 'selected'?>><?=$item->MINISTRY_NAME?></option>
					<?php endforeach;?>		
					</select></div></div>
					
					<?php endif;?>

					<?php endif;?>
					</div>


  <?php if(!empty($action_btn)):?>
  	<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <?=$action_btn?>
    </div>
  </div>
  <?php endif;?>
</form>