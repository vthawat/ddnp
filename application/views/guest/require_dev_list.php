<div class="box box-info">
	<div class="box-header"><h3>จังหวัด<?=$this->province->get_by_id($province_id)->PROVINCE_NAME?></h3></div>
	<div class="box-footer pull-right">
		<div class="btn-group input-group btn-breadcrumb">
	<input type="text" class="form-control search" style="width: 200px;" placeholder="ค้นหา">
</div>
	</div>
	<div class="box-body">
		<table class="table table-hover table-responsive">
	<thead>
		<th>#</th>
		<th>ชื่อโครงการ/กิจกรรมแก้ปัญหาหรือพัฒนา</th>
		<th>ปีงบประมาณ</th>
		<th>ตำบล</th>
		<th>อำเภอ</th>
		<th>รายละเอียด</th>
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
							  <a class="btn btn-primary" href="<?=base_url($this->router->fetch_class())?>/view/<?=$item->ID?>"><i class="fa fa-fw fa-search"></i>ดูรายละเอียด</a>
							</div>
			</td>
		</tr>	
	<?php $num++;endforeach;?>
	</tbody>
</table>
	</div>
</div>