<a class="btn icon-btn btn-warning" href="<?=base_url($this->router->fetch_class())?>/edit/<?=$project_planning->ID?>"><span class="btn-glyphicon fa fa-edit img-circle text-warning"></span>แก้ไข</a>
<a class="btn icon-btn btn-danger" href="<?=base_url($this->router->fetch_class())?>/del/<?=$project_planning->ID?>" onclick="return confirm('ยืนยันการลบโครงการ: <?=$project_planning->PROJECT_NAME?>')"><span class="btn-glyphicon fa fa-times img-circle text-danger"></span>ลบ</a>
<a class="btn icon-btn btn-primary" href="<?=base_url($this->router->fetch_class())?>/get/<?=$project_planning->PROVINCE_ID?>"><span class="btn-glyphicon fa fa-list img-circle text-primary"></span>รายการทั้งหมด</a>