      <div class="row">
      	 <div class="box box-info">
            <div class="box-header">
      			<h3>จำนวนความต้องการพัฒนาคุณภาพชีวิตตามแผนชุมชน จำแนกตามพื้นที่ระดับจังหวัด</h3>
      		</div>
      	<div class="box-footer">	
      	<?php $province_color=array('74'=>'aqua','75'=>'green','76'=>'yellow')?>
      	<?php foreach($this->province->get_all(true) as $item):?>
      	
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-<?=$province_color[$item->ID]?>-gradient"><img src="<?=base_url('images/location.png')?>"></span>

            <div class="info-box-content">
            	<a href="<?=base_url('guest/province_details/'.$item->ID)?>">
              <span class="text-bold text-blue p-medium">จังหวัด<?=$item->PROVINCE_NAME?></span>
              <span class="info-box-number text-red"><?=$this->require_develop->count_by_province_id($item->ID)?> <small>รายการ</small></span>
              <span class="pull-right"><i class="fa fa-fw fa-search"></i>รายละเอียด</span></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
		<?php endforeach?>
			</div>
		</div>
      </div>
      
      <div class="row">
          <!-- Widget: user widget style 1 -->
          <div class="box box-success">
            <div class="box-header">
              <h3>จำนวนความต้องการพัฒนาคุณภาพชีวิตตามแผนชุมชน จำแนกตามกลุ่มภารกิจงาน</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
              	<?php foreach($this->potentiality->get_all() as  $item):?>
                <li><a href="<?=base_url('guest/potential_details/'.$item->ID)?>"><span class="badge p-medium bg-aqua"><?=$item->ID?></span> <?=$item->POTENTIALITY_NAME?><span class="pull-right"><span class="text-bold text-red p-medium">
                	<?=$this->require_potential_list->count_by_id($item->ID)?>
                </span> <span>รายการ</span></span></a></li>
                <div class="clearfix"></div>
   				<?php endforeach?>
   				
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
      </div>