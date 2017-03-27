<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('require_household');
		$this->load->model('project_planning');
		$this->load->model('init_basic');
		$this->template->add_css($this->load->view('guest/css/intro-contents.css',null,TRUE),'embed',TRUE);
		$this->template->write_view('menu','guest/menu');
		$this->template->write('band_name','<img class="img-responsive" src="'.base_url('images/logo.png').'">',TRUE);
		
	}

	public function index()
	{
		
		$data['require_household']=$this->require_household;
		$data['project_planning']=$this->project_planning;
		$data['silde_intro']=$this->load->view('guest/slide-intro',null,TRUE);
		$data['contents']=$this->load->view('guest/sumary',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);

		// view chart household
		$data['year_list']=$this->require_household->get_json_year_list();
		$data['provice_list']=$this->require_household->get_provice_active();
								// add chart js component
		$this->template->add_js('assets/plugins/chartjs/Chart.min.js');
		$this->template->add_js($this->load->view('household/js/chart-province.js',$data,TRUE),'embed',TRUE);

		$data['silde_intro']=null;
		$data['content']=array('color'=>'primary',
								'toolbar'=>'',
								'title'=>'กราฟแสดงจำนวนความต้องการในระดับครัวเรือนแยกตามจังหวัดและปีที่สำรวจ',
								'detail'=>$this->load->view('household/view_chart_province',$data,TRUE));
		$data['contents']=$this->load->view('household/contents',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);



		$data['year_list']=$this->project_planning->get_json_year_list();
		$data['provice_list']=$this->project_planning->get_provice_active();
				// view chart planning project
		$this->template->add_js($this->load->view('planning/js/chart-province.js',$data,TRUE),'embed',TRUE);
		$data['content']=array('color'=>'success',
								'toolbar'=>'',
								'title'=>'กราฟแสดงจำนวนโครงการพัฒนาศักยภาพแยกตามจังหวัดและปีงบประมาณ',
								'detail'=>$this->load->view('planning/view_chart_province',$data,TRUE));
		$data['contents']=$this->load->view('planning/contents',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);




		$this->template->render();
	}
	function gis()
	{
	$this->template->write('page_header','ข้อมูลเชิงภูมิศาสตร์');
	$fillter=array();
		if(!empty($this->input->post()))
					$fillter=$this->input->post();
	 $data['gis_data']=$this->project_planning->get_json_gis_all($fillter);
		
		
		$data['provice_list']=$this->project_planning->get_provice_active();
		$data['project_status_list']=$this->project_status->get_all();
		$data['budget_year_list']=$this->project_planning->get_year_list();

		// set load dat for maps
		if(!empty(json_decode($data['gis_data'])))
					{
						$map_icon=json_encode(array('icon'=>base_url('images/placeholder.png')));
						$project_detail_path=json_encode(array('path'=>base_url('guest/view_for_modal/')));
						$json_val='var planning_gis='.$data['gis_data'].';';
						$json_val.='var map_icon='.$map_icon.';';
						$json_val.='var project_detail_path='.$project_detail_path.';';
						$this->template->add_js($json_val,'embed',TRUE);

							// map helpers
						$this->template->add_js('https://maps.google.com/maps/api/js?key=AIzaSyBGE-KGQB9PP6uq4wErMO0Xbxmz4FWxy3Q&libraries=places&language=th','link');
						$this->template->add_js('assets/gmaps/js/gmap3.min.js');
						$this->template->add_css($this->load->view('guest/css/map.css',null,TRUE),'embed',TRUE);
						$this->template->add_js($this->load->view('guest/js/view-big-map.js',null,TRUE),'embed',TRUE);
					}
		// gis map
		$data['content']=array('color'=>'primary',
								'size'=>9,
								'toolbar'=>'',
								'title'=>'GIS View',
								'detail'=>$this->load->view('guest/view_gis_map',$data,TRUE));
		$this->template->write_view('content','guest/contents',$data);
		
		$this->template->add_js($this->load->view('guest/js/select-box.js',$data,TRUE),'embed',TRUE);
		// fillter
		$data['content']=array('color'=>'success',
								'size'=>3,
								'toolbar'=>'',
								'title'=>'ตัวกรองข้อมูล',
								'detail'=>$this->load->view('guest/view_gis_fillter',$data,TRUE));
		$this->template->write_view('content','guest/contents',$data);

		$this->template->render();
	}
	function province_details($province_id=null)
	{
		$this->load_jquery_dtable();
		$data['title']=$this->require_develop->desc;
		$data['province_id']=$province_id;
		$data['project_list']=$this->require_develop->get_by_province($province_id);
		$data['contents']=$this->load->view('guest/require_dev_list',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);
		$this->template->render();
	}
	function potential_details($potentail_id=null)
	{
		if(empty($potentail_id)) show_404();	
		$this->load_jquery_dtable();
		$data['title']=$this->require_develop->desc.'<i class="fa fa-fw fa-angle-double-right"></i>ตามกลุ่มภารกิจงาน';
		$data['potentail_id']=$potentail_id;
		$data['Potential_require_dev']=$this->require_potential_list->get_by_potentiality($potentail_id);
		$data['contents']=$this->load->view('guest/potential_require_dev_list',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);
		
		$this->template->render();
	}
	function view($id=null)
	{
		if(empty($id)) show_404();
		$data['Project']=$this->require_develop->get_by_id($id);
		$data['PROJECT_ID']=$id;
		$data['Potential_list']=$this->require_potential_list->get_by_require_develop_id($id);
		$data['title']=$this->require_develop->desc.'<i class="fa fa-fw fa-angle-double-right"></i>'.'จังหวัด'.$this->province->get_by_id($data['Project']->PROVINCE_ID)->PROVINCE_NAME.'<i class="fa fa-fw fa-angle-double-right"></i>รายละเอียด';
		$data['contents']=$this->load->view('guest/require_dev_details',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);
		
		
		$this->template->render();
		
	}
  function load_jquery_dtable()
	{
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->add_js($this->load->view('guest/js/datables.js',null,TRUE),'embed',TRUE);
	}
	function json_get_amphur_by_provice_id($province_id)
	{
		$amphur=array();
		foreach($this->amphur->get_by_province($province_id) as $item)
		 array_push($amphur,array('id'=>$item->ID,'amphur_name'=>$item->AMPHUR_NAME));
		 print json_encode($amphur);
	}
		function json_get_district_by_amphur_id($amphur_id)
	{
		$district=array();
		foreach($this->district->get_by_amphur_id($amphur_id) as $item)
		{
			array_push($district,array('id'=>$item->ID,'district_name'=>$item->DISTRICT_NAME));
		}
		//print_r($district);
		print json_encode($district);
	}
	function view_for_modal($id)
	{
		if(empty($id)) show_404();
				$data['project_planning']=$this->project_planning->get_by_id($id);
		if(empty($data['project_planning'])) show_404();
		$data['househould_year']=$this->response_require_list->get_year_by_project_planning_id($id);
		$this->require_household->year=$data['househould_year'];
		$data['require_household']=$this->require_household;
		$data['response_require_list']=$this->response_require_list;
		$this->template->write('page_header',$this->project_planning->desc.'<i class="fa fa-fw fa-angle-double-right"></i>รายละเอียด');
		$data['ministry_list']=$this->project_ministry_list->get_by_project_planning_id($id);
		$data['budget_list']=$this->project_budget_resource_list->get_by_project_planning_id($id);
		$data['potential_list']=$this->project_potential_list->get_by_project_planning_id($id);
		$data['content']=array('color'=>'primary',
								//'toolbar'=>$this->load->view('view_btn',$data,TRUE),
								'title'=>'<h4>โครงการ<i class="fa fa-fw fa-angle-double-right"></i>'.$data['project_planning']->PROJECT_NAME.'</h4>',
								'detail'=>$this->load->view('view_project_planning_details',$data,TRUE)
							  );
		$html=$this->load->view('contents',$data,TRUE);
		// view response
		$data['content']=array(//'toolbar'=>'<a class="btn icon-btn btn-warning" href="'.base_url($this->router->fetch_class()).'/edit/response_household/'.$id.'/'.$data['househould_year'].'"><span class="btn-glyphicon fa fa-edit img-circle text-warning"></span>แก้ไข</a>',
								'color'=>'info','title'=>'ความครอบคลุมของครัวเรือนต่อโครงการ <i class="fa fa-fw fa-angle-double-right"></i>'.$data['project_planning']->PROJECT_NAME,
								'detail'=>$this->load->view('view_region_response',$data,TRUE));
		$html.=$this->load->view('contents',$data,TRUE);

		// view activity

		$data['project_tasking']=$this->project_tasking->get_by_project_id($id);
		$data['project_status']=$this->project_status;
		$data['view_activity_mode']=FALSE;
		$data['content']=array(//'toolbar'=>'<a class="btn icon-btn btn-warning" href="'.base_url($this->router->fetch_class()).'/edit/activity/'.$id.'"><span class="btn-glyphicon fa fa-edit img-circle text-warning"></span>แก้ไข</a>',
								'color'=>'warning','title'=>'แผนงานและกิจกรรมของโครงการ',
								'detail'=>$this->load->view('view_activity',$data,TRUE));
		$html.=$this->load->view('contents',$data,TRUE);
		// view media

		$data['content']=array(//'toolbar'=>'<a class="btn icon-btn btn-warning" href="'.base_url($this->router->fetch_class()).'/edit/location/'.$id.'"><span class="btn-glyphicon fa fa-edit img-circle text-warning"></span>แก้ไข</a>',
								'color'=>'success','title'=>'เอกสารหรือสื่อประกอบและแผนที่ตั้งโครงการ',
								'detail'=>$this->load->view('view_project_media',$data,TRUE));
		$html.=$this->load->view('contents',$data,TRUE);
		print $html;

	}
}

/* End of file guest.php */
/* Location: ./application/controllers/guest.php */