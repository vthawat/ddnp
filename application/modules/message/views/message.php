<?php
if(!empty($message)):
	switch($message['type'])
	{
		case $message['type'];
	?>
		 <div class="alert alert-<?=$message['type']?> alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa <?=$message['icon']?> fa-fw"></i><?=$message['title']?></h4>
                   <p><?=$message['details']?>
                   	<span class="pull-right"><?=date('Y-m-d h:i:s')?></span>
                   </p>
                   
          </div>
	<?php break;}
?>
<?php endif;?>

