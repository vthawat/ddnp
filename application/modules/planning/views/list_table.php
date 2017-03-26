<table class="projec-planning table table-hover table-responsive">
	<thead>
		<th>#</th>
		<th>ชื่อโครงการ</th>
		<th>ปีงบประมาณ</th>
		<th>ตำบล</th>
		<th>อำเภอ</th>
		<th>การจัดการ</th>
	</thead>
	<tbody>
	<?php $num=1;foreach($project_list as $item):?>
		<tr>
			<td><?=$num?></td>
			<td><?=$item->PROJECT_NAME?></td>
			<td><?=$item->YEAR?></td>
			<td><?=$item->DISTRICT_NAME?></td>
			<td><?=$item->AMPHUR_NAME?></td>
			<td>
					<!-- Single button -->
							<div class="btn-group">
							  <a class="btn btn-primary" href="<?=base_url($this->router->fetch_class())?>/view/<?=$item->ID?>"><i class="fa fa-fw fa-search-plus"></i>ดูรายละเอียด</a>
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <span class="fa fa-cog fa-fw"></span><span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
									<li><a href="<?=base_url($this->router->fetch_class())?>/edit/response_household/<?=$item->ID?>"><i class="fa fa-fw fa-home"></i>ความครอบคลุมของครัวเรือน</a></li>
									<li><a href="<?=base_url($this->router->fetch_class())?>/edit/location/<?=$item->ID?>"><i class="fa fa-fw fa-map-marker"></i>เอกสารหรือสื่อประกอบและแผนที่ตั้งโครงการ</a></li>
									<li><a href="<?=base_url($this->router->fetch_class())?>/edit/activity/<?=$item->ID?>"><i class="fa fa-fw fa-history"></i>แผนงานและกิจกรรมของโครงการ</a></li>
									<li role="separator" class="divider"></li>
							    <li><a href="<?=base_url($this->router->fetch_class())?>/edit/planning/<?=$item->ID?>" class="text-yellow"><span class="fa fa-edit fa-fw"></span>แก้ไขโครงการ</a></li>
							    <li><a href="<?=base_url($this->router->fetch_class())?>/del/<?=$item->PROVINCE_ID?>/<?=$item->ID?>" class="text-red" onclick="return confirm('ยืนยันการลบรายการ: <?=$item->PROJECT_NAME?>?')"><span class="fa fa-remove fa-fw"></span>ลบโครงการ</a></li>
							  </ul>
							</div>
			</td>
		</tr>	
	<?php $num++;endforeach;?>
	</tbody>
</table>