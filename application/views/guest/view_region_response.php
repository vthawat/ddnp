<div class="row">
        <div class="col-md-5">
         <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="100%" height="440" src="https://maps.google.com/maps?hl=en&q=ต.<?=$project_planning->DISTRICT_NAME?> อ.<?=$project_planning->AMPHUR_NAME?> จ.<?=$project_planning->PROVINCE_NAME?>&ie=UTF8&t=roadmap&z=13&iwloc=B&output=embed"></iframe>
        <!-- start block -->
            <div class="box box-solid bg-green-gradient">
                <div class="box-header"><h3 class="box-title">ความครอบคลุมของครัวเรือนที่กำหนดไว้</h3>
                <?php $villages=$this->village->get_on_require_household_by_district_id($project_planning->DISTRICT_ID,$househould_year);?>
                </div>
                <div class="box-body">
                    <ul class="list-group">
                    <?php if(!empty($villages)):?>
                    <li class="list-group-item bg-yellow"><label>ชื่อหมู่บ้าน</label><label class="pull-right">จำนวนครัวเรือน</label></li>
                    <?php endif;?>
                    <?php if(!empty($villages)) foreach($villages as $item):   ?>
                        <li class="list-group-item <?php if(in_array($item->ID,$response_require_list->get_village_response($project_planning->ID))):?>bg-black<?php endif;?>"><span class="badge bg-yellow"><?=$require_household->count_by_village_id($item->ID)?></span><label class="text-green" for="vill-<?=$item->ID?>"><?=$item->VILLAGE_NAME?></label></li>
                        <?php endforeach;?>
                        <?php if(empty($villages)):?>
                        <div class="alert alert-warning">ไม่มีความต้องการในระดับครัวเรือน</div>
                        <?php endif;?>
                    </ul>

                </div>
            <div class="box-footer">
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <h1 class="text-info"><?=$require_household->count_village_by_district_id($project_planning->DISTRICT_ID)?></h1>

                  <div class="text-blue">จำนวนหมู่บ้านทั้งหมด</div>
                </div>
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <h1 class="text-info"><?=$require_household->count_household_by_district_id($project_planning->DISTRICT_ID)?></h1>

                  <div class="text-blue">จำนวนครัวเรือนทั้งหมด</div>
                </div>
            <div class="col-xs-4 text-center">
                    <h1 class="text-green num-respone"><?=count($response_require_list->get_household_response($project_planning->ID))?></h1>
                  <div class="text-blue">จำนวนครัวเรือนที่ครอบคลุม</div>
                </div>
            </div>            

            </div><!-- end block -->
        </div>
         
        <div class="col-md-7">
        	<table class="table table-responsive">		
		<tbody>
            <tr>
                <th colspan="2" class="text-center bg-black">พื้นที่ลงโครงการ</th>
            </tr>
			<tr>
				<th class="bg-gray text-right col-lg-4">ปีงบประมาณ</th>
				<td><?=$project_planning->YEAR?></td>
			</tr>            
			<tr>
				<th class="bg-gray text-right col-lg-4">จังหวัด</th>
				<td><?=$project_planning->PROVINCE_NAME?></td>
			</tr>
            
            <tr>
				<th class="bg-gray-active text-right col-lg-4">อำเภอ</th>
				<td><?=$project_planning->AMPHUR_NAME?></td>
			</tr>
                        <tr>
				<th class="bg-gray text-right col-lg-4">ตำบล</th>
				<td><?=$project_planning->DISTRICT_NAME?></td>
			</tr>
            <tr>
                <th colspan="2" class="text-center bg-black">ใช้ข้อมูลความต้องการในระดับครัวเรือนของปีที่สำรวจ <?php if(!empty($househould_year)):?><?=$househould_year?><?php else:?>ทั้งหมด<?php endif;?></th>
            </tr>
            <tr>
				<th class="text-right">ความเดือดร้อน</th>
				<td>
                    <ul class="list-group">
                        <li class="list-group-item">รายได้<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_by_district_id('AFFLICTION_INCOME',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">ความเจ็บป่วย<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_by_district_id('AFFLICTION_AILING',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">ที่อยู่อาศัย<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_by_district_id('AFFLICTION_HOUSE',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">ความปลอดภัย<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_by_district_id('AFFLICTION_SAFETY',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">อื่นๆ<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_by_district_id('AFFLICTION_ETC',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                    </ul>
                </td>
			</tr>
            <tr>
				<th class="text-right">ความต้องการอาชีพ</th>
				<td>
                    <ul class="list-group">
                        <li class="list-group-item">เกษตร<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_by_district_id('AVOCATION_FARM',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">เลี้ยงสัตว์<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_by_district_id('AVOCATION_ANIMAL',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">ประมง<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_by_district_id('AVOCATION_FISHER',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">ช่างฝีมือ/คหกรรม<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_by_district_id('AVOCATION_TECH',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">ค้าขาย<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_by_district_id('AVOCATION_TRADE',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">ทุนประกอบอาชีพ<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_by_district_id('AVOCATION_CAREER',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">ทุนการศึกษา<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_by_district_id('AVOCATION_EDUCATION',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                        <li class="list-group-item">อื่นๆ<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_by_district_id('AVOCATION_ETC',$project_planning->DISTRICT_ID)?></span> ครัวเรือน</span></li>
                    </ul>
                </td>
			</tr            
                </tbody>
                </table>
        </div>
        
</div>