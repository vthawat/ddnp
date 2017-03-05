$(function () {
	
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


	// select all village
var total_household=0;
	$('.btn-select-all').click(function()
	{
		$('.village').prop('checked',true);
		$('.num-respone').text(<?=$require_household->count_household_by_district_id($project_planning->DISTRICT_ID)?>);
		total_household=<?=$require_household->count_household_by_district_id($project_planning->DISTRICT_ID)?>;
	});


// process respone village
$('.process-response').click(function(event){
	if(total_household==0) alert('ยังไม่กำหนดความครอบคลุม');
	else{
		//begin process
		$list_village=[];
 	$('.village').each(function() {
		if($(this).is(':checked')){
			$list_village.push($(this).val());
		}
 	});
	 $url='<?=base_url('planning/json_post_define_household')?>';
	$.post( $url, { villages:$list_village , project_planning_id:<?=$project_planning->ID?>})
 		 
		  .done(function( data ) {
  		  alert( "Data Loaded: " + data );
 	 
	});

	}
});

	// select village and calculate
	
	$('.village').click(function()
	{
		
		if($(this).is(':checked')){
			 //alert($(this).prev().text());
			 total_household=total_household+parseInt($(this).prev().text());
			 $('.num-respone').text(total_household);
			}
		else
		{
		 total_household=total_household-parseInt($(this).prev().text());
		  $('.num-respone').text(total_household);	
		}

	});

});
