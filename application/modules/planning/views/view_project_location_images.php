<div class="col-md-12">
        <?php if(!empty($project_planning->MEDIAS)):?>
            <!-- start block -->
            <div class="box">
                <div class="box-body">
                <?=$project_planning->MEDIAS?>
              </div>
            </div><!-- end block -->
        <?php endif;?>
</div>
<div class="col-md-12">
    <h4>แผนที่ตั้งโครงการ</h4>
    <div id="gm-map"></div>
    <h4>ข้อมูลประกอบจาก Google Street View</h4>
    <div id="street-view" style="width:100%; height: 400px; margin-top:10px"></div>
</div>