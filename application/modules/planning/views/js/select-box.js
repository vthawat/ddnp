$(function () {
	
	$('#province').change(function(){
		$('#amphur').empty();
		var get_url="<?=base_url($this->router->fetch_class())?>/json_get_amphur_by_provice_id/"+$(this).val();
	  
	  $.getJSON(get_url, function( data )
		 {

			$('#amphur').append('<option value="">--เลือกอำเภอ--</option>');
			 $.each( data, function( key, item )
			 {

   			 	$('#amphur').append('<option value="'+item.id+'">'+item.amphur_name+'</option>');

  			});
		

		});

	});
	
	
	$('#amphur').change(function(){
		var get_url="<?=base_url($this->router->fetch_class())?>/json_get_district_by_amphur_id/"+$(this).val();
		$('#district').empty();
		$.getJSON(get_url, function( data )
		 {
			$('#district').append('<option value="">--เลือกตำบล--</option>');
			 $.each( data, function( key, item ) {

   			 $('#district').append('<option value="'+item.id+'">'+item.district_name+'</option>');

  			});
		

		});
	});

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
