<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planning extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->template->set_template('admin');
		$this->load->model('require_household');
		$this->load->model('project_planning');
		$this->load->model('init_basic');
		$this->template->write('sidebar',$this->load->controller('sidebar/get_sidebar',array(),FALSE));

	}

 
	function index()
	{

		$this->template->render();
	}
	function get($province_id=null)
	{
		if(empty($province_id)) show_404();
		if(!in_array($province_id,$this->project_scope->project_scope)) show_404();
		$this->load_jquery_dtable();
		$this->template->write('page_header',$this->project_planning->desc);
		$data['province_id']=$province_id;
		$data['project_list']=$this->project_planning->get_by_province($province_id);
		$data['content']=array('color'=>'primary',
								'toolbar'=>$this->load->view('toolsbar',$data,TRUE),
								'title'=>'<h3>'.$this->province->desc.$this->province->get_by_id($province_id)->PROVINCE_NAME.'</h3>',
								'detail'=>$this->load->view('list_table',$data,TRUE));
		$this->template->write_view('content','contents',$data);
		$this->template->render();
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
	function json_get_village_by_district_id($district_id)
	{
		$village=array();
		foreach($this->village->get_by_district_id($district_id) as $item)
		{
			array_push($village,array('id'=>$item->ID,'village_name'=>$item->VILLAGE_NAME));
		}
		//print_r($district);
		print json_encode($village);
	}
	function addnew($province_id=null)
	{
		if(empty($province_id)) show_404();
		if(!in_array($province_id,$this->project_scope->project_scope)) show_404();
		$this->template->add_js($this->load->view('js/select-box.js',null,TRUE),'embed',TRUE);
		$this->template->add_js('assets/plugins/input-mask/inputmask.js');
		$this->template->add_js('assets/plugins/input-mask/inputmask.extensions.js');
		$this->template->add_js('assets/plugins/input-mask/inputmask.numeric.extensions.js');
		$this->template->add_js('assets/plugins/input-mask/jquery.inputmask.js');
		$this->template->add_js('assets/plugins/datepicker/bootstrap-datepicker.js');
		$this->template->add_js('assets/plugins/datepicker/locales/bootstrap-datepicker.th.js');
		$this->template->add_css('assets/plugins/datepicker/datepicker3.css');
		$this->template->add_js($this->load->view('js/input-mask.js',null,TRUE),'embed',TRUE);
		
		$this->template->write('page_header',$this->project_planning->desc.' <i class="fa fa-fw fa-angle-double-right"></i>เพิ่มใหม่');
		$data['potentiality']=$this->potentiality->get_all();
		$data['provice_id']=$province_id;
		$data['action_btn']=$this->load->view('action_btn',null,TRUE);
		$data['year_budget']=$this->year_budget->get_all();
		$data['ministry']=$this->ministry->get_all();
		$data['budget_resource']=$this->budget_resource->get_all();
		$data['amphur']=$this->amphur->get_by_province($province_id);
		$data['action_url']=base_url('planning/post/'.$province_id);

		$data['content']=array('color'=>'primary',
								'title'=>'<h3>'.$this->province->desc.$this->province->get_by_id($province_id)->PROVINCE_NAME.'</h3>',
								'detail'=>$this->load->view('form_planning',$data,TRUE));
		$this->template->write_view('content','contents',$data);
		$this->template->render();
	}

	function edit($id=null)
	{
		if(empty($id)) show_404();
		$data['project_planning']=$this->project_planning->get_by_id($id);
		if(empty($data['project_planning'])) show_404();
		$this->template->add_js($this->load->view('js/select-box.js',null,TRUE),'embed',TRUE);
		$this->template->add_js('assets/plugins/input-mask/inputmask.js');
		$this->template->add_js('assets/plugins/input-mask/inputmask.extensions.js');
		$this->template->add_js('assets/plugins/input-mask/inputmask.numeric.extensions.js');
		$this->template->add_js('assets/plugins/input-mask/jquery.inputmask.js');
		$this->template->add_js('assets/plugins/datepicker/bootstrap-datepicker.js');
		$this->template->add_js('assets/plugins/datepicker/locales/bootstrap-datepicker.th.js');
		$this->template->add_css('assets/plugins/datepicker/datepicker3.css');
		$this->template->add_js($this->load->view('js/input-mask.js',null,TRUE),'embed',TRUE);
		
		$this->template->write('page_header',$this->project_planning->desc.' <i class="fa fa-fw fa-angle-double-right"></i>แก้ไข');
		$data['potentiality']=$this->potentiality->get_all();
		//$data['provice_id']=$province_id;
		$data['action_btn']=$this->load->view('action_btn',null,TRUE);
		$data['year_budget']=$this->year_budget->get_all();
		$data['ministry']=$this->ministry->get_all();
		$data['budget_resource']=$this->budget_resource->get_all();
		$data['amphur']=$this->amphur->get_by_province($data['project_planning']->PROVINCE_ID);
		$data['action_url']=base_url('planning/update/'.$id);

		$data['content']=array('color'=>'primary',
								'title'=>'<h3>'.$this->province->desc.$data['project_planning']->PROVINCE_NAME.'</h3>',
								'detail'=>$this->load->view('form_planning',$data,TRUE));
		$this->template->write_view('content','contents',$data);



		$this->template->render();
	}
	function post($province_id=null)
	{
		if(empty($province_id)) show_404();
	
			$potential_list=$this->input->post('POTENTIAL_LIST');
			$ministry_list=$this->input->post('MINISTRY_LIST');
			$budget_resource_list=$this->input->post('BUDGET_RESOURCE_LIST');
			$planning_data=$this->input->post();
			unset($planning_data['POTENTIAL_LIST']);
			unset($planning_data['MINISTRY_LIST']);
			unset($planning_data['BUDGET_RESOURCE_LIST']);
			$planning_data['BUDGET']=str_ireplace(',','', $this->input->post('BUDGET'));
			$planning_data=array_merge(array('PROVINCE_ID'=>$province_id),$planning_data);

			// insert to project_planning
		if($this->project_planning->post($planning_data))
		{
			// insert to  project_potential_list
				foreach($potential_list as $potential_id)
				{
					$data=array('PROJECT_PLANING_ID'=>$this->project_planning->insert_id,
								'POTENTIALITY_ID'=>$potential_id);				
					$this->project_potential_list->post($data);
				}
			// insert to project_ministry_list
				foreach($ministry_list as $id)
				{
					$data=array('PROJECT_PLANING_ID'=>$this->project_planning->insert_id,
								'MINISTRY_ID'=>$id);				
					$this->project_ministry_list->post($data);
				}
			// insert to project_budget_resource_list
				foreach($budget_resource_list as $id)
				{
					$data=array('PROJECT_PLANING_ID'=>$this->project_planning->insert_id,
								'BUDGET_RESOURCE_ID'=>$id);				
					$this->project_budget_resource_list->post($data);
				}

			redirect(base_url('planning/view/'.$this->project_planning->insert_id));
		}


		else show_error('ไม่สามารถบันทึกข้อมูลได้');


	}

	function update($id=null)
	{
		if(empty($id)) show_404();
		$data['project_planning']=$this->project_planning->get_by_id($id);
		if(empty($data['project_planning'])) show_404();
			$potential_list=$this->input->post('POTENTIAL_LIST');
			$ministry_list=$this->input->post('MINISTRY_LIST');
			$budget_resource_list=$this->input->post('BUDGET_RESOURCE_LIST');
			$planning_data=$this->input->post();
			unset($planning_data['POTENTIAL_LIST']);
			unset($planning_data['MINISTRY_LIST']);
			unset($planning_data['BUDGET_RESOURCE_LIST']);
			$planning_data['BUDGET']=str_ireplace(',','', $this->input->post('BUDGET'));

	 if($this->project_planning->update($planning_data,$id))
		{
			// update to  project_potential_list
			$this->project_potential_list->delete_all_project_planning_id($id);
				foreach($potential_list as $potential_id)
				{
					$data=array('PROJECT_PLANING_ID'=>$id,
								'POTENTIALITY_ID'=>$potential_id);				
					$this->project_potential_list->post($data,$id);
				}
			// update to project_ministry_list
			$this->project_ministry_list->delete_all_project_planning_id($id);
				foreach($ministry_list as $ministry_id)
				{
					$data=array('PROJECT_PLANING_ID'=>$id,
								'MINISTRY_ID'=>$ministry_id);				
					$this->project_ministry_list->post($data,$id);
				}
			// update to project_budget_resource_list
			$this->project_budget_resource_list->delete_all_project_planning_id($id);
				foreach($budget_resource_list as $budget_resource_id)
				{
					$data=array('PROJECT_PLANING_ID'=>$id,
								'BUDGET_RESOURCE_ID'=>$budget_resource_id);				
					$this->project_budget_resource_list->post($data,$id);
				}


			redirect(base_url('planning/view/'.$id));
		}
		else show_error('ไม่สามารถบันทึกข้อมูลได้');
	}
	function view($id=null)
	{
		if(empty($id)) show_404();
		$data['project_planning']=$this->project_planning->get_by_id($id);
		if(empty($data['project_planning'])) show_404();
		$this->template->write('page_header',$this->project_planning->desc.'<i class="fa fa-fw fa-angle-double-right"></i>รายละเอียด');
		$data['ministry_list']=$this->project_ministry_list->get_by_project_planning_id($id);
		$data['budget_list']=$this->project_budget_resource_list->get_by_project_planning_id($id);
		$data['potential_list']=$this->project_potential_list->get_by_project_planning_id($id);
		$data['content']=array('color'=>'primary',
								'toolbar'=>$this->load->view('view_btn',$data,TRUE),
								'title'=>'<h4>โครงการ<i class="fa fa-fw fa-angle-double-right"></i>'.$data['project_planning']->PROJECT_NAME.'</h4>',
								'detail'=>$this->load->view('view_project_planning_details',$data,TRUE)
							  );
		$this->template->write_view('content','contents',$data);
		
		$data['content']=array('title'=>'<h4>ความต้อง</h4>');
		$this->template->write_view('content','contents',$data);

		$this->template->render();
	}
	function del($id=null)
	{
		if(empty($id)) show_404();
		$province_id=$this->require_household->get_by_id($id)->PROVINCE_ID;
		if($this->require_household->delete($id))
		redirect(base_url($this->router->fetch_class()).'/get/'.$province_id);
		 
		
	}
	function load_jquery_dtable()
	{
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->add_js($this->load->view('js/datables.js',null,TRUE),'embed',TRUE);
	}
}