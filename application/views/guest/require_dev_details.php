<div class="pull-right"><a class="btn icon-btn btn-primary back" href="javascript:history.back()"><span class="btn-glyphicon fa fa-backward img-circle fa-fw"></span>ย้อนกลับ</a></div>
<div class="clearfix"></div>
<div class="box box-info">
	<div class="box-header"><h3><?=$Project->PROJECT_NAME?></h3></div>
	<div class="box-body">
		<div class="col-lg-6">
	<h4 class="text-info"><i class="fa fa-fw fa-file-o"></i>รายละเอียด</h4>
	<table class="table table-responsive">		
		<tbody>
			<tr>
				<th class="bg-green icon-btn text-right col-lg-4">ปีงบประมาณ</th>
				<td><?=$Project->YEAR?></td>
			</tr>
			<tr>
				<th class="bg-primary icon-btn text-right"><?=$this->province->desc?></th>
				<td><?=$Project->PROVINCE_NAME?></td>
			</tr>
			<tr>
				<th class="bg-yellow icon-btn text-right"><?=$this->amphur->desc?></th>
				<td><?=$Project->AMPHUR_NAME?></td>
			</tr>
			<tr>
				<th class="bg-aqua icon-btn text-right"><?=$this->district->desc?></th>
				<td><?=$Project->DISTRICT_NAME?></td>
			</tr>
			<tr>
				<th class="bg-gray icon-btn text-right">ปัญหา/ความต้องการพัฒนา</th>
				<td><?=$Project->PROBLEM?></td>
			</tr>
			<tr>
				<th class="bg-gray icon-btn text-right">พื้นที่ดำเนินการ/กลุ่มเป้าหมาย</th>
				<td><?=$Project->AREA_TARGET_VILLAGE?></td>
			</tr>
			<tr>
				<th class="bg-gray icon-btn text-right">งบประมาณ(บาท)</th>
				<td><?=number_format($Project->BUDGET,2)?></td>
			</tr>
			<tr>
				<th class="bg-gray icon-btn text-right">ผู้รับผิดชอบ</th>
				<td><?=$Project->RESPONSIBLE?></td>
			</tr>
			<tr>
				<th class="bg-gray icon-btn text-right">ผลที่คาดว่าจะได้รับ</th>
				<td><?=$Project->OUTCOME?></td>
			</tr>
			<tr>
				<th class="bg-gray icon-btn text-right">หมายเหตุ/หมู่บ้านพื้นที่ระดับ</th>
				<td><?=$Project->NOTATION?></td>
			</tr>																																							
		</tbody>
	</table>
	<div class="box-footer">
		<h3 class="text-info">กลุ่มภารกิจงาน</h3>
		<ul class="nav nav-stacked">
			<?php foreach($Potential_list as $item):?>
				<li><a><span class="p-medium badge bg-aqua"><?=$item->POTENTIALITY_ID?></span> <?=$this->potentiality->get_by_id($item->POTENTIALITY_ID)->POTENTIALITY_NAME?></a></li>
			<?php endforeach?>
		</ul>
	</div>
</div>
<div class="col-lg-6">
	<h4 class="text-blue"><i class="fa fa-fw fa-map-marker"></i>แผนที่</h4>
	<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="100%" height="440" src="https://maps.google.com/maps?hl=en&q=ต.<?=$Project->DISTRICT_NAME?> อ.<?=$Project->AMPHUR_NAME?> จ.<?=$Project->PROVINCE_NAME?>&ie=UTF8&t=roadmap&z=13&iwloc=B&output=embed"></iframe>
</div>
	</div>
</div>