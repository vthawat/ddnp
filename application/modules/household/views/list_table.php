<table class="table table-hover table-responsive">
	<thead>
		<th>#</th>
		<th>บ้านเลขที่</th>
		<th>ชื่อ-นามสกุล</th>
		<th>หมู่ที่</th>
		<th>ชื่อหมู่บ้าน/ชุมชน</th>		
		<th>ตำบล</th>
		<th>อำเภอ</th>
		<th>ปีที่สำรวจ</th>
		<th>การจัดการ</th>
	</thead>
	<tbody>
	<?php $num=1;foreach($project_list as $item):?>
		<tr>
			<td><?=$num?></td>
			<td><?=$item->HOME_NUMBER?></td>
			<td><?=$item->FIRST_NAME?> <?=$item->LAST_NAME?></td>
			<td><?=$item->VILL_NUMBER?></td>
			<td><?=$item->VILLAGE_NAME?></td>
			<td><?=$item->DISTRICT_NAME?></td>
			<td><?=$item->AMPHUR_NAME?></td>
			<td><?=$item->YEAR?></td>
			<td>
					<!-- Single button -->
							<div class="btn-group">
							  <a class="btn btn-primary" href="<?=base_url($this->router->fetch_class())?>/view/<?=$item->ID?>"><i class="fa fa-fw fa-search-plus"></i>ดูรายละเอียด</a>
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <span class="fa fa-cog fa-fw"></span><span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							    <li><a href="<?=base_url($this->router->fetch_class())?>/update/<?=$item->ID?>" class="text-yellow"><span class="fa fa-edit fa-fw"></span>แก้ไข</a></li>
							    <li><a href="<?=base_url($this->router->fetch_class())?>/del/<?=$item->ID?>" class="text-red" onclick="return confirm('ยืนยันการลบรายการ: บ้านเลขที่ <?=$item->HOME_NUMBER?>? <?=$item->FIRST_NAME?> <?=$item->LAST_NAME?>')"><span class="fa fa-remove fa-fw"></span>ลบ</a></li>
							  </ul>
							</div>
			</td>
		</tr>	
	<?php $num++;endforeach;?>
	</tbody>
</table>