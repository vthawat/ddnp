<table class="table table-hover table-responsive">
	<thead>
		<th rowspan="2">#</th>
		<th rowspan="2">แหล่งที่มาของงบประมาณ</th>
		<th class="text-center" colspan="<?=count($year_list)?>">ปีงบประมาณ</th>
        <tr>
            <?php foreach($year_list as $item):?>
            <th class="text-center"><?=$item->YEAR?></th>
            <?php endforeach;?>
        </tr>
	</thead>
	<tbody>
     <?php $i=1;foreach($budget_resource_list as $item):?>
        <tr>
            <td><?=$i?></td>
            <td><?=$item->RESOURCE_NAME?></td>
        <?php foreach($year_list as $year):?>
            <td class="text-center"><?=number_format($this->budget_resource->sum_budget_by_year_and_budget_resource_id($year->ID,$item->BUDGET_RESOURCE_ID),2)?></td>
           <?php endforeach;?>
        </tr>
     <?php $i++;endforeach;?>
    </tbody>
</table>
