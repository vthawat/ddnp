<table class="table table-hover table-responsive">
	<thead class="bg-gray">
		<th>#</th>
		<th>กิจกรรม/แผนการดำเนินงาน</th>
		<th>%ความสำเร็จ</th>
		<th>สถานะ</th>
		<th>ผู้รับผิดชอบ</th>
        <th>หมายเหตุ</th>
        <?php if($view_activity_mode):?>
		<th>การจัดการ</th>
        <?php endif?>
	</thead>
	<tbody>
    <?php $num_act=1;foreach($project_tasking as $item):?>
        <tr>
            <td><?=$num_act?></td>
            <td><?=$item->TASK_TITLE?></td>
            <td>
            <div class="clearfix">
                    <small class="pull-right"><?=$item->PERCENT_COMITTED?>%</small>
                  </div>
                <div class="progress xs">
                <?php $this->load->helper('tasking')?>
                    <div class="progress-bar <?=task_color($item->PERCENT_COMITTED)?>" style="width: <?=$item->PERCENT_COMITTED?>%;"></div>
                  </div>
            </td>
            <td><?=$project_status->get_by_id($item->PROJECT_STATUS_ID)->STATUS?></td>
            <td><?=$item->RESPONSIBLE?></td>
            <td><?=$item->COMMENT?></td>
            <?php if($view_activity_mode):?>
            <td>
            <!-- Single button -->
							<div class="btn-group">
							    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <span class="fa fa-cog fa-fw"></span><span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
			
							    <li><a href="<?=base_url($this->router->fetch_class())?>/update_activity/<?=$item->ID?>" class="text-yellow"><span class="fa fa-edit fa-fw"></span>แก้ไขรายการกิจกรรม</a></li>
							    <li><a href="<?=base_url($this->router->fetch_class())?>/remove_activity/<?=$item->ID?>" class="text-red" onclick="return confirm('ยืนยันการลบรายการ: <?=$item->TASK_TITLE?>?')"><span class="fa fa-remove fa-fw"></span>ลบรายการกิจกรรม</a></li>
							  </ul>
							</div>
            </td>
            <?php endif?>
        </tr>
    <?php $num_act++;endforeach;?>
    </tbody>
</table>