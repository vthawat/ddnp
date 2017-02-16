<form method="post" class="form-horizontal" action="<?=$action_url?>">
	<div class="form-group bg-green">
    <label for="year_budget" class="col-sm-2 control-label"><?=$this->year_budget->desc?>*</label>
    <div class="col-sm-10">
      <select class="form-control" name="BUDGET_YEAR_ID" id="year_budget" required>
      	<?php if(!empty($year_budget)) foreach($year_budget as $item):?>
      		<?php if($project_planning->BUDGET_YEAR_ID!=$item->ID):?>
      		<option value="<?=$item->ID?>"><?=$item->YEAR?></option>
      		<?php else:?>
      			<option value="<?=$project_planning->BUDGET_YEAR_ID?>" selected><?=$project_planning->YEAR?></option>
      		<?php endif;?>
      	<?php endforeach;?>
      </select>      	
    </div>
  </div>
	<div class="form-group bg-yellow">
    <label for="amphur" class="col-sm-2 control-label"><?=$this->amphur->desc?>*</label>
    <div class="col-sm-10">
      <select class="form-control" name="AMPHUR_ID" id="amphur" required>
      	<option value=""></option>
      	<?php if(!empty($amphur)) foreach($amphur as $item):?>
      		<?php if($item->ID==$project_planning->AMPHUR_ID):?>
      			<option value="<?=$item->ID?>" selected><?=$item->AMPHUR_NAME?></option>
      		<?php else:?>
      		<option value="<?=$item->ID?>"><?=$item->AMPHUR_NAME?></option>
      		<?php endif;?>
      	<?php endforeach;?>
      </select>      	
    </div>
  </div>
	<div class="form-group bg-aqua">
    <label for="district" class="col-sm-2 control-label"><?=$this->district->desc?>*</label>
    <div class="col-sm-10">
    	<?php if(empty($project_planning))
		{
    		$district=$this->district->get_by_amphur_id(set_value('AMPHUR_ID'));
			$district_selected=set_value('DISTRICT_ID');
		}
		
		else{
				$district=$this->district->get_by_amphur_id($project_planning->AMPHUR_ID);
				$district_selected=$project_planning->DISTRICT_ID;
			}
			
    	?>
      <select class="form-control" name="DISTRICT_ID" id="district" required>
      	<option value=""></option>
      	<?php foreach($district as $item):?>
      		<option value="<?=$item->ID?>" <?php if($district_selected==$item->ID) print ' selected'?>><?=$item->DISTRICT_NAME?></option>
      	<?php endforeach?>
      </select>
    </div>
  </div>

<div class="form-group bg-blue">
    <label for="potentiality" class="col-sm-2 control-label"><?=$this->potentiality->desc?></label>
    <div class="col-sm-10"><br>
    	<ul class="list-group">
		<?php if(!empty($potentiality)) foreach($potentiality as $item):?>
			
			<li class="list-group-item">
			<div class="checkbox">
    			<label><input type="checkbox" value="<?=$item->ID?>" name="POTENTIAL_LIST[]" <?php if(!empty($project_planning)) if($this->project_potential_list->get_one($project_planning->ID,$item->ID)) print 'checked';?>> 
					<span class="text-purple"><span class="badge"><?=$item->ID?>.</span><?=$item->POTENTIALITY_NAME?></span></label>
    		</div>
    		</li>
    		
		<?php endforeach;?>
		</ul>
    </div>
 </div>

<div class="form-group bg-gray">
    <label for="ministry" class="col-sm-2 control-label">กระทรวงที่เกี่ยวข้องกับโครงการ</label>
    <div class="col-sm-10"><br>
    	<ul class="list-group">
		<?php if(!empty($ministry)) foreach($ministry as $item):?>
			
			<li class="list-group-item">
			<div class="checkbox">
    			<label><input type="checkbox" value="<?=$item->ID?>" name="MINISTRY_LIST[]" <?php if(!empty($project_planning)) if($this->project_ministry_list->get_one($project_planning->ID,$item->ID)) print 'checked';?>> 
					<span class="text-purple"><?=$item->MINISTRY_NAME?></span></label>
    		</div>
    		</li>
    		
		<?php endforeach;?>
		</ul>
    </div>
 </div>


 <div class="form-group">
    <label for="project_name" class="col-sm-2 control-label">ชื่อโครงการ*</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="PROJECT_NAME" id="project_name" placeholder="ชื่อโครงการ" value="<?php if(!empty($project_planning)):?><?=$project_planning->PROJECT_NAME?><?php endif;?>" required>
    </div>
  </div>


  <div class="form-group">
  	<label for="problem" class="col-sm-2 control-label">ความสำคัญและที่มาของปัญหา*</label>
  	 <div class="col-sm-10">
  	 	<textarea id="problem" rows="8" name="PROBLEM" class="form-control" required><?php if(!empty($project_planning)):?><?=$project_planning->PROBLEM?><?php endif;?></textarea>
  	 </div>
  </div>

   <div class="form-group">
  	<label for="objective" class="col-sm-2 control-label">วัตถุประสงค์</label>
  	 <div class="col-sm-10">
  	 	<textarea id="objective" rows="8" name="OBJECTIVE" class="form-control"><?php if(!empty($project_planning)):?><?=$project_planning->OBJECTIVE?><?php endif;?></textarea>
  	 </div>
  </div>

   <div class="form-group">
  	<label for="outcome" class="col-sm-2 control-label">ผลที่คาดว่าจะได้รับ</label>
  	 <div class="col-sm-10">
  	 	 <?php if(empty($Project)) $outcome=set_value('OUTCOME');
				else $outcome=$Project->OUTCOME;
    	?>
  	 	<textarea id="outcome" rows="8" name="OUTCOME" class="form-control"><?php if(!empty($project_planning)):?><?=$project_planning->OUTCOME?><?php endif;?></textarea>
  	 </div>
  </div>


	<div class="form-group bg-gray">
    <label for="budget_resource" class="col-sm-2 control-label"><?=$this->budget_resource->desc?></label>
    <div class="col-sm-10"><br>
    	<ul class="list-group">
		<?php if(!empty($budget_resource)) foreach($budget_resource as $item):?>

			<li class="list-group-item">
			<div class="checkbox">
    			<label><input type="checkbox" value="<?=$item->ID?>" name="BUDGET_RESOURCE_LIST[]" <?php if(!empty($project_planning)) if($this->project_budget_resource_list->get_one($project_planning->ID,$item->ID)) print 'checked';?>> 
					<span class="text-purple"><?=$item->RESOURCE_NAME?></span></label>
    		</div>
    		</li>
    		
		<?php endforeach;?>
		</ul>
    </div>
 </div>


 <div class="form-group">
    <label for="budget" class="col-sm-2 control-label">งบประมาณ(บาท)*</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="BUDGET" id="budget" value="<?php if(!empty($project_planning)):?><?=$project_planning->BUDGET?><?php endif;?>" required>
    </div>
  </div>
   <div class="form-group">
  	<label for="responsible" class="col-sm-2 control-label">ผู้รับผิดชอบ*</label>
  	 <div class="col-sm-10">
  	 	<textarea id="responsible" name="RESPONSIBLE" class="form-control" required><?php if(!empty($project_planning)):?><?=$project_planning->RESPONSIBLE?><?php endif;?></textarea>
  	 </div>
  </div> 

 
 
 <div class="form-group">
 		<label for="end-start" class="col-sm-2 control-label">วันที่เริ่มโครงการ*</label>
		  <div class="col-sm-3">
				<div class="input-group date">
						<input type="text" class="start-date form-control" name="START_DATE" value="<?php if(!empty($project_planning)):?><?=$project_planning->START_DATE?><?php endif;?>" required>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<label for="end-start" class="col-sm-2 control-label">วันที่เสร็จสิ้นโครงการ*</label>
			<div class="col-sm-3">
				<div class="input-group date">
						<input type="text" class="end-date form-control" name="FINISH_DATE" value="<?php if(!empty($project_planning)):?><?=$project_planning->FINISH_DATE?><?php endif;?>" required>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
</div> 

   <div class="form-group">
  	<label for="notation" class="col-sm-2 control-label">หมายเหตุ</label>
  	 <div class="col-sm-10">
  	 	<textarea id="notation" name="NOTATION" class="form-control"><?php if(!empty($project_planning)):?><?=$project_planning->NOTATION?><?php endif;?></textarea>
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