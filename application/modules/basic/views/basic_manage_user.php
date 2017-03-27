<?php if(!empty($Basic_items)):?>
	<table class="table table-hover tb-basic">
		<thead>
			<th>#ID</th>
			<th>อีเมล</th>
            <th>ระดับสิทธิ์</th>
			<th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>หมายเลขโทรศัพท์</th>
            <th>การจัดการ</th>
		</thead>
		<tbody>
			<?php foreach($Basic_items as $item):?>
				<tr>
					<td><?=$item->id?></td>
					<td><?=$item->email?></td>
                    <td><?=$item->role_name?></td>
                    <td><?=$item->first_name?></td>
                    <td><?=$item->last_name?></td>
                    <td><?=$item->phone?></td>
					<td>
						<!-- Single button -->
							<div class="btn-group">
							  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <span class="fa fa-cog fa-fw"></span><span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							    <li><a href="<?=base_url()?>basic/manage_user/edit/<?=$item->id?>" class="text-yellow"><span class="fa fa-edit fa-fw"></span>แก้ไข</a></li>
							    <li><a href="<?=base_url()?>basic/delete/manage_user/<?=$item->id?>" class="text-red" onclick="return confirm('ยืนยันการลบรายการ?')"><span class="fa fa-remove fa-fw"></span>ลบ</a></li>
							  </ul>
							</div>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php endif;?>