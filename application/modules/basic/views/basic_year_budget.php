<?php if(!empty($Basic_items)):?>
	<table class="table table-hover tb-basic">
		<thead>
			<th>#ID</th>
			<th>ปีงบประมาณ</th>
		</thead>
		<tbody>
			<?php foreach($Basic_items as $item):?>
				<tr>
					<td><?=$item->ID?></td>
					<td><?=$item->YEAR?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php endif;?>