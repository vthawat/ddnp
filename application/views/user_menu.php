                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-user fa-fw fa-2x"></span>
                    <span><?=$this->ezrbac->getCurrentUser()->email?></span>
                    </a>
                     <ul class="dropdown-menu">
                     	<li class="user-header">
                     		 	<span class="btn-glyphicon fa fa-user fa-4x img-circle text-aqua"></span>
                     		 <p><span>ธวัช วราไชย</span>
                     		 	<small>ฝ่ายคอมพิวเตอร์ทางวิศวกรรมศาสตร์</small>
                     		 </p>
                     	</li>
                     	<li><a href="#"><span class="fa fa-angle-right fa-fw"></span>เปลี่ยนสิทธิ์เป็นผู้บริหาร</a></li>
                     	<li><a href="#"><span class="fa fa-angle-right fa-fw"></span>เปลี่ยนสิทธิ์เป็นผู้ดูแลระบบ</a></li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                  	<div class="pull-left">
                      <a href="<?=base_url()?>notification/view_all" class="btn btn-default btn-flat"><span class="fa fa-bell-o fa-fw"></span>Notifications</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=base_url('rbac/logout')?>" class="btn btn-default btn-flat"><span class="fa fa-sign-out fa-fw"></span>Sign out</a>
                    </div>
                  </li>
                  </ul>