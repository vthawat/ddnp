<div class="box box-info">
	<div class="box-header"><h3><?=$this->potentiality->get_by_id($potentail_id)->POTENTIALITY_NAME?></h3></div>
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
		<th>จังหวัด</th>
		<th>รายละเอียด</th>
	</thead>
	<tbody>
	<?php $num=1;foreach($Potential_require_dev as $item):?>
	<?php $Require_dev=$this->require_develop->get_by_id($item->REQUIRE_DEVELOP_ID);?>	
		<tr>
			<td><?=$num?></td>
			<td><?=$Require_dev->PROJECT_NAME?></td>
			<td><?=$Require_dev->YEAR?></td>
			<td><?=$Require_dev->DISTRICT_NAME?></td>
			<td><?=$Require_dev->AMPHUR_NAME?></td>
			<td><?=$Require_dev->PROVINCE_NAME?></td>
			<td>
					<!-- Single button -->
							<div class="btn-group">
							  <a class="btn btn-primary" href="<?=base_url($this->router->fetch_class())?>/view/<?=$item->REQUIRE_DEVELOP_ID?>"><i class="fa fa-fw fa-search"></i>ดูรายละเอียด</a>
							</div>
			</td>
		</tr>	
	<?php $num++;endforeach;?>
	</tbody>
</table>
	</div>
</div>