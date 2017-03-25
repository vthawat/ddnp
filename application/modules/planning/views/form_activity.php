<form method="post" class="form-horizontal" action="<?=$action_url?>">
<div class="form-group">
    <label for="task-title" class="col-sm-2 control-label">กิจกรรม/แผนการดำเนินงาน</label>
     <div class="col-sm-10"><input class="form-control" type="text" name="TASK_TITLE" id="task-title" required></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">วันที่เริ่ม-สิ้นสุดของโครงการ</label>
    <div class="col-sm-10">
    <span><?=$project_planning->START_DATE?></span> <span>ถึง</span> <span><?=$project_planning->FINISH_DATE?></span>
    </div>
</div>
<div class="form-group">
    <label for="date-start" class="col-sm-2 control-label">วันที่เริ่มกิจกรรม</label>
    <div class="col-sm-3 col-md-2">
        <div class="input-group date">
            <input class="form-control" type="text" name="DATE_START" id="date-start" required>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="date-finish" class="col-sm-2 control-label">วันที่เสร็จสิ้นกิจกรรม</label>
    <div class="col-sm-3 col-md-2">
            <div class="input-group date">
            <input class="form-control" type="text" name="DATE_FINISH" id="date-finish" required>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="project-status" class="col-sm-2 control-label">สถานะ</label>
    <div class="col-sm-3 col-md-3">
        <select class="form-control" name="PROJECT_STATUS_ID" id="project-status" required>
        <option value="">-เลือกสถานะ-</option>
        <?php foreach($project_status as $item):?>
            <option value="<?=$item->ID?>"><?=$item->STATUS?></option>
        <?php endforeach?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="percent-comitted" class="col-sm-2 control-label">% ความสำเร็จ</label>
    <div class="col-sm-3 col-md-5">
        <input type="text" id="percent-comitted" class="knob" name="PERCENT_COMITTED" data-readonly="false" value="0" data-width="100" data-height="100" data-fgColor="#39CCCC">
    </div>
</div> 

<div class="form-group">
    <label for="responsible" class="col-sm-2 control-label">ผู้รับผิดชอบ</label>
    <div class="col-sm-3 col-md-4"><input class="form-control" type="text" name="RESPONSIBLE" id="responsible" required></div>
</div> 
<div class="form-group">
    <label for="comment" class="col-sm-2 control-label">หมายเหตุ</label>
    <div class="col-md-10">
       <textarea rows="5" id="comment" name="COMMENT" class="form-control"></textarea>
    </div>
</div>

  <?php if(!empty($action_btn)):?>
  	<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
    <br>
      <?=$action_btn?>
    </div>
  </div>
  <?php endif;?>
</form>