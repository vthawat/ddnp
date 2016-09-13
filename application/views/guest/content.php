	<?php if(!empty($silde_intro)) print $silde_intro;?>
	<!-- INTRO WRAP -->
	<?php if(!empty($contents)): ?>
	<div id="intro">
		<div class="container">
			<?php if(!empty($title)):?>
				<h3 class="page-header text-blue"><?=$title?></h3>
			<?php endif;?>
			<?=$contents?>
			
	    </div> <!--/ .container -->
	</div><!--/ #introwrap -->
	<?php endif;?>