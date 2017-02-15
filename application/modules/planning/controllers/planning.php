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
		
		$data['household']=$this->require_household->get_by_id($id);
		$province_id=$data['household']->PROVINCE_ID;
		if(!in_array($province_id,$this->project_scope->project_scope)) show_404();
		$this->template->add_js($this->load->view('js/select-box.js',null,TRUE),'embed',TRUE);
		$this->template->add_js('assets/plugins/input-mask/inputmask.js');
		$this->template->add_js('assets/plugins/input-mask/inputmask.extensions.js');
		$this->template->add_js('assets/plugins/input-mask/inputmask.numeric.extensions.js');
		$this->template->add_js('assets/plugins/input-mask/jquery.inputmask.js');
		$this->template->add_js($this->load->view('js/input-mask.js',null,TRUE),'embed',TRUE);
		$this->template->write('page_header',$this->require_household->desc.' <i class="fa fa-fw fa-angle-double-right"></i>แก้ไข');
		$data['action_btn']=$this->load->view('action_btn',null,TRUE);
		$data['year_budget']=$this->year_budget->get_all();
		$data['amphur']=$this->amphur->get_by_province($province_id);
		$data['action_url']=base_url('household/update/'.$id);

		$data['content']=array('color'=>'primary',
								'title'=>'<h3>'.$this->province->desc.$this->province->get_by_id($province_id)->PROVINCE_NAME.'</h3>',
								'detail'=>$this->load->view('form_household',$data,TRUE));
		$this->template->write_view('content','contents',$data);
		$this->template->render();
	}
	function post($province_id=null)
	{
		if(empty($province_id)) show_404();

		
		$data=array_merge(array('PROVINCE_ID'=>$province_id),$this->input->post());
		if(empty($data['AFFLICTION_ETC'])) $data['AFFLICTION_ETC']='0';
		if(empty($data['AVOCATION_ETC'])) $data['AVOCATION_ETC']='0';

		$data['MONEY_PER_MONTH']=str_replace(',','',$data['MONEY_PER_MONTH']); // remove comma , 'xxx,xxx,x' 
		
		/*  prepare data   */
		if(!empty($data['FUGITIVE_PRENAME']))
					$data['FUGITIVE_PRENAME']=implode(",",$data['FUGITIVE_PRENAME']);
		
		if(!empty($data['FUGITIVE_FIRST_NAME']))
					$data['FUGITIVE_FIRST_NAME']=implode(",",$data['FUGITIVE_FIRST_NAME']);

		if(!empty($data['FUGITIVE_LAST_NAME']))
					$data['FUGITIVE_LAST_NAME']=implode(",",$data['FUGITIVE_LAST_NAME']);

		if(!empty($data['FUGITIVE_STATUS']))
					$data['FUGITIVE_STATUS']=implode(",",$data['FUGITIVE_STATUS']);			

		if(!empty($data['PATIENT_PRENAME']))
					$data['PATIENT_PRENAME']=implode(",",$data['PATIENT_PRENAME']);
	
		if(!empty($data['PATIENT_FIRST_NAME']))
					$data['PATIENT_FIRST_NAME']=implode(",",$data['PATIENT_FIRST_NAME']);

		if(!empty($data['PATIENT_LAST_NAME']))
					$data['PATIENT_LAST_NAME']=implode(",",$data['PATIENT_LAST_NAME']);

		if($this->require_household->post($data)) 
			redirect('household/get/'.$province_id);
		else show_error('ไม่สามารถบันทึกได้');


	}

	function update($id=null)
	{
		if(empty($id)) show_404();
		$data=$this->input->post();

		if(empty($data['HOME_TYPE_A'])) $data['HOME_TYPE_A']='0';
		if(empty($data['HOME_TYPE_B'])) $data['HOME_TYPE_B']='0';
		if(empty($data['HOME_TYPE_C'])) $data['HOME_TYPE_C']='0';

		if(empty($data['ATTIRUDE_GO_LEVEL_H'])) $data['ATTIRUDE_GO_LEVEL_H']='0';
		if(empty($data['ATTIRUDE_GO_LEVEL_M'])) $data['ATTIRUDE_GO_LEVEL_M']='0';
		if(empty($data['ATTIRUDE_GO_LEVEL_L'])) $data['ATTIRUDE_GO_LEVEL_L']='0';
		if(empty($data['ATTIRUDE_GO_LEVEL_ETC'])) $data['ATTIRUDE_GO_LEVEL_ETC']='0';

		if(empty($data['AFFLICTION_INCOME'])) $data['AFFLICTION_INCOME']='0';
		if(empty($data['AFFLICTION_AILING'])) $data['AFFLICTION_AILING']='0';
		if(empty($data['AFFLICTION_HOUSE'])) $data['AFFLICTION_HOUSE']='0';
		if(empty($data['AFFLICTION_SAFETY'])) $data['AFFLICTION_SAFETY']='0';

		if(empty($data['AVOCATION_FARM'])) $data['AVOCATION_FARM']='0';
		if(empty($data['AVOCATION_ANIMAL'])) $data['AVOCATION_ANIMAL']='0';
		if(empty($data['AVOCATION_FISHER'])) $data['AVOCATION_FISHER']='0';
		if(empty($data['AVOCATION_TECH'])) $data['AVOCATION_TECH']='0';
		if(empty($data['AVOCATION_TRADE'])) $data['AVOCATION_TRADE']='0';
		if(empty($data['AVOCATION_CAREER'])) $data['AVOCATION_CAREER']='0';
		if(empty($data['AVOCATION_EDUCATION'])) $data['AVOCATION_EDUCATION']='0';


		if(empty($data['AFFLICTION_ETC'])) $data['AFFLICTION_ETC']='0';
		if(empty($data['AVOCATION_ETC'])) $data['AVOCATION_ETC']='0';

		$data['MONEY_PER_MONTH']=str_replace(',','',$data['MONEY_PER_MONTH']); // remove comma , 'xxx,xxx,x' 
		
		/*  prepare data   */
		if(!empty($data['FUGITIVE_PRENAME']))
					$data['FUGITIVE_PRENAME']=implode(",",$data['FUGITIVE_PRENAME']);
		
		if(!empty($data['FUGITIVE_FIRST_NAME']))
					$data['FUGITIVE_FIRST_NAME']=implode(",",$data['FUGITIVE_FIRST_NAME']);

		if(!empty($data['FUGITIVE_LAST_NAME']))
					$data['FUGITIVE_LAST_NAME']=implode(",",$data['FUGITIVE_LAST_NAME']);

		if(!empty($data['FUGITIVE_STATUS']))
					$data['FUGITIVE_STATUS']=implode(",",$data['FUGITIVE_STATUS']);			

		if(!empty($data['PATIENT_PRENAME']))
					$data['PATIENT_PRENAME']=implode(",",$data['PATIENT_PRENAME']);
	
		if(!empty($data['PATIENT_FIRST_NAME']))
					$data['PATIENT_FIRST_NAME']=implode(",",$data['PATIENT_FIRST_NAME']);

		if(!empty($data['PATIENT_LAST_NAME']))
					$data['PATIENT_LAST_NAME']=implode(",",$data['PATIENT_LAST_NAME']);

		//print_r($data);
		if($this->require_household->update($data,$id)) 
			redirect('household/view/'.$id);
		else show_error('ไม่สามารถบันทึกได้');
		//redirect(base_url($this->router->fetch_class()).'/view/'.$id);
	}
	function view($id=null)
	{
		if(empty($id)) show_404();
		$data['household']=$this->require_household->get_by_id($id);
		if(empty($data['household'])) show_404();
		$this->template->write('page_header',$this->require_household->desc.'<i class="fa fa-fw fa-angle-double-right"></i>รายละเอียด');
		$this->load->helper('household');
		
		//$data['PROJECT_ID']=$id;
		$data['content']=array('color'=>'primary',
								'toolbar'=>$this->load->view('view_btn',$data,TRUE),
								'title'=>'<h3>บ้านเลขที่ '.$data['household']->HOME_NUMBER.' <i class="fa fa-fw fa-angle-double-right"></i> เจ้าบ้าน '.prename($data['household']->PRE_NAME).$data['household']->FIRST_NAME.' '.$data['household']->LAST_NAME.'</h3>',
								'detail'=>$this->load->view('view_household_details',$data,TRUE)
							  );
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