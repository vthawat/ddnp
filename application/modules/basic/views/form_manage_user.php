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
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
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
                            <option value="">---เลือกระดับสิทธิ์----</option>
                            <?php foreach($this->manage_user->get_role_all() as $item):?>
                            <option value="<?=$item->id?>" <?php if(!empty($edit_item)&& $item->id==$edit_item->user_role_id) print 'selected';?>><?=$item->role_name?></option>
                            <?php endforeach;?>
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