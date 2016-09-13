<?php if(!empty($Basic_items)):?>
	<table class="table table-hover tb-basic">
		<thead>
			<th>#ID</th>
			<th>ชื่อจังหวัด</th>
			<th>สถานะ</th>
			<th>เปลี่ยนสถานะ</th>
		</thead>
		<tbody>
			<?php foreach($Basic_items as $item):?>
				<tr>
					<td><?=$item->ID?></td>
					<td><?=$item->PROVINCE_NAME?></td>
					<td><?php $status=$this->project_scope->find_status($item->ID)?>
						<?php if($status):?>
							<span class="label label-success">เปิดใช้งาน</span>
						<?php else:?>
							<span class="label label-danger">ปิดใช้งาน</span>
						<?php endif;?>
					</td>
					<td>
							<div class="btn-group">
							  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <span class="fa fa-cog fa-fw"></span><span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							    <?php if($status):?>
							    <li><a href="<?=base_url()?>basic/put/province/<?=$item->ID?>/0" class="text-red"><span class="fa fa-times fa-fw"></span>ปิดใช้งาน</a></li>
							    <?php else:?>
							    <li><a href="<?=base_url()?>basic/put/province/<?=$item->ID?>/1" class="text-green"><span class="fa fa-check fa-fw"></span>เปิดใช้งาน</a></li>
							 	<?php endif;?>
							  </ul>
							</div>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php endif;?>