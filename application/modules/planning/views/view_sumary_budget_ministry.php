<table class="table table-hover table-responsive">
	<thead>
		<th rowspan="2">#</th>
		<th rowspan="2">กระทรวง</th>
		<th class="text-center" colspan="<?=count($year_list)?>">ปีงบประมาณ</th>
        <tr>
            <?php foreach($year_list as $item):?>
            <th class="text-center"><?=$item->YEAR?></th>
            <?php endforeach;?>
        </tr>
	</thead>
	<tbody>
     <?php $i=1;foreach($ministry_list as $item):?>
        <tr>
            <td><?=$i?></td>
            <td><?=$item->MINISTRY_NAME?></td>
        <?php foreach($year_list as $year):?>
            <td class="text-center"><?=number_format($this->ministry->sum_budget_by_year_and_ministry_id($year->ID,$item->MINISTRY_ID),2)?></td>
           <?php endforeach;?>
        </tr>
     <?php $i++;endforeach;?>
    </tbody>
</table>
