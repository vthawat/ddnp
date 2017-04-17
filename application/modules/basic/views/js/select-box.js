$(function () {

	
			// province change
		$('.province').change(function(){
				var get_url="<?=base_url($this->router->fetch_class())?>/json_get_amphur_by_provice_id/"+$(this).val();
				$('#district').empty();
				$.getJSON(get_url, function( data )
				{

					$('#amphur').empty();
					$('#amphur').append('<option value="">--เลือกอำเภอ--</option>');
					$.each( data, function( key, item ) {

					$('#amphur').append('<option value="'+item.id+'">'+item.amphur_name+'</option>');

					});
				

				});			
		});
	
	$('.provice_id').change(function(){
		var get_url="<?=base_url($this->router->fetch_class())?>/json_get_amphur_by_provice_id/"+$(this).val();
		$('#district').empty();
		$.getJSON(get_url, function( data )
		 {

			$('#amphur').empty();
			$('#amphur').append('<option value="">--เลือกอำเภอ--</option>');
			 $.each( data, function( key, item ) {

   			 $('#amphur').append('<option value="'+item.id+'">'+item.amphur_name+'</option>');

  			});
		

		});

	});
	
	$('#amphur').change(function(){
		var get_url="<?=base_url($this->router->fetch_class())?>/json_get_district_by_amphur_id/"+$(this).val();
		$('#district').empty();
		$.getJSON(get_url, function( data )
		 {

			//alert(data[0].district_name);
			 $.each( data, function( key, item ) {

   			 $('#district').append('<option value="'+item.id+'">'+item.district_name+'</option>');

  			});
		

		});
	});

			// district change
			$('#district').change(function(){
				var get_url="<?=base_url($this->router->fetch_class())?>/json_get_village_by_district_id/"+$(this).val();
				$('#village').empty();
				$.getJSON(get_url, function( data )
				{

					//alert(data[0].district_name);
					$.each( data, function( key, item ) {

					$('#village').append('<option value="'+item.id+'">'+item.village_name+'</option>');

					});
				

				});
			});	
			

	// select role

	$('#role').change(function(){

			//alert($(this).val());
			//console.log($(this).val());
		if($(this).val()==1) // level ผู้ดูแลระบบ
		{
			html='';
		}
		if($(this).val()==3) // level เจ้าหน้าที่กระทรวง	
		{
			html='<div class="form-group bg-blue"><label for="permiss" class="col-sm-2 control-label">กระทรวง</label>';
			html+='<div class="col-sm-3">';
			html+='<select class="form-control" name="village_id"><option value="0">--เลือกกระทรวง--</option>';
			<?php foreach($this->ministry->get_all() as $item):?>
			html+='<option value="<?=$item->ID?>"><?=$item->MINISTRY_NAME?></option>';
			<?php endforeach;?>		
			html+='</select></div></div>';
			//$('.set-scope').html(html);
			//console.log(html);
		}
		if($(this).val()==2)	// level หัวหน้าชุมชน
		{
			html='<div class="form-group"><label for="province" class="col-sm-2 control-label">จังหวัด</label>';
			html+='<div class="col-sm-3">';
			html+='<select class="form-control province"><option value="0">--เลือกจังหวัด--</option>';
			<?php foreach($this->province->get_all(TRUE) as $item):?>
			html+='<option value="<?=$item->ID?>"><?=$item->PROVINCE_NAME?></option>';
			<?php endforeach;?>	
			html+='</select>';
			html+='</div></div>';
			html+='<div class="form-group"><label for="amphur" class="col-sm-2 control-label">อำเภอ</label>';
			html+='<div class="col-sm-3">';
			html+='<select class="form-control" id="amphur"><option value="0">--เลือกอำเภอ--</option>';
			html+='</select>';
			html+='</div></div>';
			html+='<div class="form-group"><label for="district" class="col-sm-2 control-label">ตำบล</label>';
			html+='<div class="col-sm-3">';
			html+='<select class="form-control" id="district"><option value="0">--เลือกตำบล--</option>';
			html+='</select>';
			html+='</div></div>';
			html+='<div class="form-group bg-blue"><label for="village" class="col-sm-2 control-label">หมู่บ้าน</label>';
			html+='<div class="col-sm-3">';
			html+='<select class="form-control" id="village" name="village_id"><option value="0">--เลือกหมู่บ้าน--</option>';
			html+='</select>';
			html+='</div></div>';
		}
		$('.set-scope').html(html);
			
		// province change
		$('.province').change(function(){
				var get_url="<?=base_url($this->router->fetch_class())?>/json_get_amphur_by_provice_id/"+$(this).val();
				$('#district').empty();
				$.getJSON(get_url, function( data )
				{

					$('#amphur').empty();
					$('#amphur').append('<option value="">--เลือกอำเภอ--</option>');
					$.each( data, function( key, item ) {

					$('#amphur').append('<option value="'+item.id+'">'+item.amphur_name+'</option>');

					});
				

				});			
		});

		// amphur change
			$('#amphur').change(function(){
				var get_url="<?=base_url($this->router->fetch_class())?>/json_get_district_by_amphur_id/"+$(this).val();
				$('#district').empty();
				$.getJSON(get_url, function( data )
				{

					//alert(data[0].district_name);
					$.each( data, function( key, item ) {

					$('#district').append('<option value="'+item.id+'">'+item.district_name+'</option>');

					});
				

				});
			});
		// district change
			$('#district').change(function(){
				var get_url="<?=base_url($this->router->fetch_class())?>/json_get_village_by_district_id/"+$(this).val();
				$('#village').empty();
				$.getJSON(get_url, function( data )
				{

					//alert(data[0].district_name);
					$.each( data, function( key, item ) {

					$('#village').append('<option value="'+item.id+'">'+item.village_name+'</option>');

					});
				

				});
				});			


	});





});
