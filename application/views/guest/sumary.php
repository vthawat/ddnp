<div class="col-md-6">
  <div class="box box-solid bg-green-gradient">
  <div class="box-header">
            <h3 class="box-title"><i class="fa fa-tag"></i> ความเดือดร้อนทั้งหมด</h3>
          </div>
          <div class="box-body">
                         <ul class="list-group">
                        <li class="list-group-item text-black">รายได้<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_all('AFFLICTION_INCOME')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">ความเจ็บป่วย<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_all('AFFLICTION_AILING')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">ที่อยู่อาศัย<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_all('AFFLICTION_HOUSE')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">ความปลอดภัย<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_all('AFFLICTION_SAFETY')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">อื่นๆ<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_affliction_all('AFFLICTION_ETC')?></span> ครัวเรือน</span></li>
                </ul>
          </div>
          <div class="box-footer">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <h1 class="text-info"><?=number_format($require_household->count_household_all())?></h1>

                      <div class="text-blue">จำนวนครัวเรือนทั้งหมด</div>
                    </div>
                <div class="col-xs-4 text-center">
                        <h1 class="text-green num-respone"><?=number_format($project_planning->count_all())?></h1>
                      <div class="text-blue">จำนวนโครงการทั้งหมด</div>
                    </div>
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <h1 class="text-info"><?=number_format($this->response_require_list->count_project_all())?></h1>

                      <div class="text-blue">จำนวนโครงการที่ครอบคลุมพื้นที่</div>
                    </div>                    
          </div>  
  </div>
</div>
<div class="col-md-6">
  <div class="box box-solid bg-yellow-gradient">
  <div class="box-header">
            <h3 class="box-title"><i class="fa fa-tag"></i> ความต้องการอาชีพทั้งหมด</h3>
          </div>
          <div class="box-body">
                <ul class="list-group">
                        <li class="list-group-item text-black">เกษตร<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_all('AVOCATION_FARM')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">เลี้ยงสัตว์<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_all('AVOCATION_ANIMAL')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">ประมง<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_all('AVOCATION_FISHER')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">ช่างฝีมือ/คหกรรม<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_all('AVOCATION_TECH')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">ค้าขาย<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_all('AVOCATION_TRADE')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">ทุนประกอบอาชีพ<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_all('AVOCATION_CAREER')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">ทุนการศึกษา<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_all('AVOCATION_EDUCATION')?></span> ครัวเรือน</span></li>
                        <li class="list-group-item text-black">อื่นๆ<span class="pull-right"><span class="badge bg-red"><?=$require_household->count_avocation_all('AVOCATION_ETC')?></span> ครัวเรือน</span></li>
                    </ul>
          </div>
  </div>
</div>
