	<?php if(!empty($silde_intro)) print $silde_intro;?>
	<!-- INTRO WRAP -->
	<?php if(!empty($contents)): ?>	
	<br>
		<div class="container">
			<?php if(!empty($title)):?>
				<h3 class="page-header text-blue"><?=$title?></h3>
			<?php endif;?>
			<?=$contents?>
			
	    </div> <!--/ .container -->
	<?php endif;?>