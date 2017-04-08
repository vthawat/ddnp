<div class="col-lg-12">
	<table class="table table-responsive">
	<tbody>
	<tr>
		 <th class="text-right col-md-3 bg-green">ปีงบประมาณ</th>
	 	 <td><?=$project_planning->YEAR?></td>
	 </tr>
	<tr>
		 <th class="text-right bg-yellow">จังหวัด</th>
	 	 <td><?=$project_planning->PROVINCE_NAME?></td>
	 </tr>
	<tr>
		 <th class="text-right bg-blue">อำเภอ</th>
	 	 <td><?=$project_planning->AMPHUR_NAME?></td>
	 </tr>
	<tr>
		 <th class="text-right bg-purple">ตำบล</th>
	 	 <td><?=$project_planning->DISTRICT_NAME?></td>
	 </tr>
	<tr>
		 <th class="text-right">ความสำคัญและที่มาของปัญหา</th>
	 	 <td><?=nl2br($project_planning->PROBLEM)?></td>
	 </tr>
	<tr>
		 <th class="text-right">วัตถุประสงค์</th>
	 	 <td><?=nl2br($project_planning->OBJECTIVE)?></td>
	 </tr>
	<tr>
		 <th class="text-right">ผลที่คาดว่าจะได้รับ</th>
	 	 <td><?=nl2br($project_planning->OUTCOME)?></td>
	 </tr>
	<tr class="bg-gray">
		 <th class="text-right">กระทรวงที่เกี่ยวข้องกับโครงการ</th>
	 	 <td>
		  		<ul class="list-group">
				  <?php 
				  if(!empty($ministry_list)) foreach($ministry_list as $item):?>
				  <li class="list-group-item <?php if($item->OWNER) print 'bg-green';?>"><?=$item->MINISTRY_NAME?>
				  <?php if($item->OWNER):?>
				  	<span class="pull-right">เจ้าของโครงการ</span>
				  <?php endif;?>
				  </li>
				  <?php endforeach;?>
				</ul>
		  </td>
	 </tr>

	<tr class="bg-gray-active">
		 <th class="text-right"><?=$this->potentiality->desc?></th>
	 	 <td>
		  		<ul class="list-group">
				  <?php if(!empty($potential_list)) foreach($potential_list as $item):?>
					  <li class="list-group-item"><span><?=$item->ID?>.</span><?=$item->POTENTIALITY_NAME?></li>
				 
				  <?php endforeach;?>
				</ul>
		  </td>
	 </tr>	
	 	 
	<tr class="bg-gray">
		 <th class="text-right"><?=$this->budget_resource->desc?></th>
	 	 <td>
		  		<ul class="list-group">
				  <?php if(!empty($budget_list)) foreach($budget_list as $item):?>
				  <li class="list-group-item"><?=$item->RESOURCE_NAME?></li>
				  <?php endforeach;?>
				</ul>
		  </td>
	 </tr>	

	<tr>
		 <th class="text-right">งบประมาณ</th>
	 	 <td><?=number_format($project_planning->BUDGET,'2')?></td>
	 </tr>
	<tr>
		 <th class="text-right">ผู้รับผิดชอบ</th>
	 	 <td><?=nl2br($project_planning->RESPONSIBLE)?></td>
	 </tr>	
	<tr>
		 <th class="text-right">วันที่เริ่มโครงการ</th>
	 	 <td><?=$project_planning->START_DATE?></td>
	 </tr>
	<tr>
		 <th class="text-right">วันที่สิ้นสุดโครงการ</th>
	 	 <td><?=$project_planning->FINISH_DATE?></td>
	 </tr>
	<tr>
		 <th class="text-right">หมายเหตุ</th>
	 	 <td><?=nl2br($project_planning->NOTATION)?></td>
	 </tr>	 	 	  	  	 	 	 		 	 	 
	 </tbody>
	</table>
</div>