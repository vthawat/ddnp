$(function () {

// set household year

$('.household_year').change(function(){

		//alert($(this).val());
		document.location='<?=base_url('planning/edit/response_household/'.$project_planning->ID)?>/'+$(this).val();
});


//var total_household=0;
var total_household=parseInt($('.num-respone').text());
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
	 $project_planning_id=<?=$project_planning->ID?>;
	$.post( $url, { villages:$list_village , project_planning_id:$project_planning_id,household_year:$('.household_year').val()})
 		 
		  .done(function( data ) {
  		//  alert( "Data Loaded: " + data );
		   if(data==1)
		   document.location='<?=base_url('planning/view')?>/'+$project_planning_id;
		else alert('ไม่สามารถดำเนินการได้');
		   //console.log(data);
		   
 	 
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