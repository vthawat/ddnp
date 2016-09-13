<?php if(!empty($Basic_items)):?>
	<table class="table table-hover tb-basic">
		<thead>
			<th>#ID</th>
			<th>ตำบล</th>
			<th>อำเภอ</th>
			<th>จังหวัด</th>
		</thead>
		<tbody>
			<?php foreach($Basic_items as $item):?>
				<tr>
					<td><?=$item->ID?></td>
					<td><?=$item->DISTRICT_NAME?></td>
					<td><?=$item->AMPHUR_NAME?></td>
					<td><?=$item->PROVINCE_NAME?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php endif;?>