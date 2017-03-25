<table class="table table-hover table-responsive">
	<thead class="bg-gray">
		<th>#</th>
		<th>กิจกรรม/แผนการดำเนินงาน</th>
		<th>%ความสำเร็จ</th>
		<th>สถานะ</th>
		<th>ผู้รับผิดชอบ</th>
        <th>หมายเหตุ</th>
		<th>การจัดการ</th>
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
                    <div class="progress-bar progress-bar-green" style="width: <?=$item->PERCENT_COMITTED?>%;"></div>
                  </div>
            </td>
            <td><?=$project_status->get_by_id($item->PROJECT_STATUS_ID)->STATUS?></td>
            <td><?=$item->RESPONSIBLE?></td>
            <td><?=$item->COMMENT?></td>
            <td></td>
        </tr>
    <?php $num_act++;endforeach;?>
    </tbody>
</table>