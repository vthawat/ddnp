<?php if(!empty($error_number)):?>
<?php switch($error_number):	
	case 101:?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<p><span class="fa fa-exclamation-circle fa-2x"></span> Username หรือ Password ไม่ถูกต้อง</p>
		<p><span class="label label-default">Error No.<?=$error_number?></span></p>
		</div>
	<?php break;?>
	<?php case 102:?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<p><span class="fa fa-exclamation-circle fa-2x"></span> ท่านไม่มีสิทธิ์ในการเข้าใช้งานระบบ</p>
			<p><span class="label label-default">Error No.<?=$error_number?></span></p>
		</div>		
	<?php break;?>
	<?php case 211:?>	
			<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<p><span class="fa fa-exclamation-circle fa-2x"></span> ไม่สามารถลบได้ เนื่องจากมีข้อมูลที่สัมพันธ์อยู่</p>
			<p><span class="label label-default">Error No.<?=$error_number?></span></p>
		</div>
	<?php break;?>
	<?php case 201:?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<p><span class="fa fa-exclamation-circle fa-2x"></span> ไม่พบสิ่งที่ท่านร้องขอ</p>
			<p><span class="label label-default">Error No.<?=$error_number?></span></p>
		</div>
	<?php break;?>
<?php endswitch;?>
<?php else:?>
	<!-- 
	this about view error number
	number code abc
	digit a = 1 error about user permission  
	digit a = 2 error about incorrect data
   	digit b = 0 danger level
   	digit b = 1 info level
   	digit b = 2 warning level
   	digit c = number 1 , 2 , 3 to n item of error message
	-->
<?php endif;?>