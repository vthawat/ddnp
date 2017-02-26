<div class="row">
        <div class="col-md-5">
         <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="100%" height="440" src="https://maps.google.com/maps?hl=en&q=ต.<?=$project_planning->DISTRICT_NAME?> อ.<?=$project_planning->AMPHUR_NAME?> จ.<?=$project_planning->PROVINCE_NAME?>&ie=UTF8&t=roadmap&z=13&iwloc=B&output=embed"></iframe>
            <div class="box box-solid bg-green-gradient">
                <div class="box-header"><h3 class="box-title">กำหนดความครอบคลุม</h3>
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-success">เลือกทุกหมู่บ้าน</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">ดำเนินการ</a></li>
                    </ul>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="list-group">
                    <?php $villages=$this->village->get_on_require_household_by_district_id($project_planning->DISTRICT_ID);
                        if(!empty($villages)) foreach($villages as $item):
                    ?>
                        <li class="list-group-item"><input type="checkbox" id="vill-<?=$item->ID?>"> <label class="text-green" for="vill-<?=$item->ID?>"><?=$item->VILLAGE_NAME?></label></li>
                        <?php endforeach;?>
                        <?php if(empty($villages)):?>
                        <div class="alert alert-warning">ไม่มีความต้องการในระดับครัวเรือน</div>
                        <?php endif;?>
                    </ul>

                </div>
            <div class="box-footer">
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <h1 class="text-green"><?=$require_household->count_village_by_district_id($project_planning->DISTRICT_ID)?></h1>

                  <div class="text-blue">จำนวนหมู่บ้านทั้งหมด</div>
                </div>
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <h1 class="text-green"><?=$require_household->count_household_by_district_id($project_planning->DISTRICT_ID)?></h1>

                  <div class="text-blue">จำนวนครัวเรือนทั้งหมด</div>
                </div>

            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <h1 class="text-green"><?=$require_household->count_household_by_district_id($project_planning->DISTRICT_ID)?></h1>

                  <div class="text-blue">ความครอบคลุมที่กำหนด</div>
                </div>


            </div>
            

            </div>
        </div>
         
        <div class="col-md-7">
        	<table class="table table-responsive">		
		<tbody>
            <tr>
                <th colspan="2" class="text-center">พื้นที่ลงโครงการ</th>
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
                <th colspan="2" class="text-center">ความต้องการในระดับครัวเรือน</th>
            </tr>
            <tr>
				<th class="bg-danger text-right">ความเดือดร้อน</th>
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
				<th class="bg-danger text-right">ความต้องการอาชีพ</th>
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