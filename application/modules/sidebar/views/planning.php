            <!-- Optionally, you can add icons to the links -->          
            <li class="treeview">
              <a href="<?=base_url($this->router->fetch_class())?>"><i class='fa fa-book text-white fa-fw'></i><span>โครงการพัฒนาศักยภาพ</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              	<?php if(!empty($set_province)) foreach($set_province as $item):?>
                <li><a href="<?=base_url('planning/get/'.$item->ID)?>"><i class='fa fa-circle-o text-white fa-fw'></i><?=$this->province->desc.$item->PROVINCE_NAME?></a></li>
                <?php endforeach;?>
							<li><a href="<?=base_url('planning')?>"><i class='fa fa-circle-o text-green fa-fw'></i>รายงานสรุปในภาพรวม</a></li>
              </ul>
            </li>
	<!--
		<li class="treeview">
			<a href="#"><i class='fa fa-desktop fa-fw'></i><span>UI Block Content</span> <i class="fa fa-angle-left pull-right"></i></a>
			 <ul class="treeview-menu">
			 	<li><a href="<?=base_url()?>hello/content">Block content section</a></li>
			 	<li><a href="<?=base_url()?>hello/content/size">Block content size</a></li>
			 	<li><a href="<?=base_url()?>hello/content/color">Block content color</a></li>
			 	<li><a href="<?=base_url()?>hello/content/toolbar">Block content toolbar</a></li>
			 </ul>
		</li>
		<li class="treeview">
			<a href="#"><i class='fa fa-plug fa-fw'></i><span>UI Plugin JS</span> <i class="fa fa-angle-left pull-right"></i></a>
			 <ul class="treeview-menu">
			 	<li><a href="<?=base_url()?>hello/addon/chartjs">ChartJS</a></li>
			 	<li><a href="<?=base_url()?>hello/addon/flot">Flot</a></li>
			 </ul>
		</li> -->         