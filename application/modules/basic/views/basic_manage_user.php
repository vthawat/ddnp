<?php if(!empty($Basic_items)):?>
	<table class="table table-hover tb-basic">
		<thead>
			<th>#ID</th>
			<th>อีเมล</th>
            <th>ระดับสิทธิ์</th>
			<th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>สถานะ</th>
            <th>การจัดการ</th>
		</thead>
		<tbody>
			<?php foreach($Basic_items as $item):?>
				<tr>
					<td><?=$item->user_id?></td>
					<td><?=$item->email?></td>
                    <td><?=$item->role_name?>
					<?php if($item->user_role_id!=1):?>
						<blockquote>
							<?php if($item->user_role_id==3):?>
								<small><?=$this->ministry->get_by_id($item->village_id)->MINISTRY_NAME?></small>
							<?php endif;?>
							<?php if($item->user_role_id==2):?>
								<small>จ.<?=$this->province->get_by_id($this->province->find_info_by_village($item->village_id)->PROVINCE_ID)->PROVINCE_NAME?>,
								อ.<?=$this->province->find_info_by_village($item->village_id)->AMPHUR_NAME?>,
								ต.<?=$this->province->find_info_by_village($item->village_id)->DISTRICT_NAME?>,
								หมู่บ้าน<?=$this->village->get_by_id($item->village_id)->VILLAGE_NAME?>
								</small>
							<?php endif;?>
						</blockquote>
					<?php endif;?>
					</td>
                    <td><?=$item->first_name?></td>
                    <td><?=$item->last_name?></td>
                    <td>
                    <?php if($item->status):?>
                        <span class="label label-success">เปิดใช้งาน</span>
                     <?php else:?>
                        <span class="label label-danger">ระงับการใช้งาน</span>
                    <?php endif;?>
                    </td>
					<td>
						<!-- Single button -->
							<div class="btn-group">
							  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <span class="fa fa-cog fa-fw"></span><span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							    <li><a href="<?=base_url()?>basic/manage_user/edit/<?=$item->user_id?>" class="text-yellow"><span class="fa fa-edit fa-fw"></span>แก้ไข</a></li>
							    <li><a href="<?=base_url()?>basic/delete/manage_user/<?=$item->user_id?>" class="text-red" onclick="return confirm('ยืนยันการลบรายการ?')"><span class="fa fa-remove fa-fw"></span>ลบ</a></li>
							  </ul>
							</div>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php endif;?>