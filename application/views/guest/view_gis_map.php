<?php if(!empty(json_decode($gis_data))):?>
	<div id="gm-map"></div>
<?php else:?>
	<div class="alert alert-warning">
		<h3><i class="fa fa-fw fa-exclamation"></i>ไม่พบข้อมูลโครงการ</h3>
	</div>
<?php endif;?>
<div class="trad-modal modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->