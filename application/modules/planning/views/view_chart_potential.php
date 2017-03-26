<table class="table table-hover table-responsive">
	<thead>
		<th rowspan="2">#</th>
		<th rowspan="2">กลุ่มภารกิจงาน</th>
		<th class="text-center" colspan="<?=count($year_list)?>">ปีงบประมาณ</th>
        <tr>
            <?php foreach($year_list as $item):?>
            <th class="text-center"><?=$item->YEAR?></th>
            <?php endforeach;?>
        </tr>
	</thead>
	<tbody>
     <?php $i=1;foreach($potential_list as $item):?>
        <tr>
            <td><?=$i?></td>
            <td><?=$item->POTENTIALITY_NAME?></td>
        <?php foreach($year_list as $year):?>
            <td class="text-center"><?=number_format($this->potentiality->count_by_year_and_potential_id($year->ID,$item->POTENTIALITY_ID))?></td>
           <?php endforeach;?>
        </tr>
     <?php $i++;endforeach;?>
    </tbody>
</table>
