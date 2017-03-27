<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->template->set_template('admin');
		$this->load->model('init_basic');
		$this->load->model('basic_adaptor','Basic');
		$this->template->write('sidebar',$this->load->controller('sidebar/get_sidebar',array(),FALSE));

		
	}

	function index()
	{
		$this->template->render();
	}
	function userinfo()
	{
		return $this->load->view('user_menu',null,TRUE);
	}
	function budget_resource($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function year_budget($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function potentiality($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function province($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function amphur($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function district($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function village($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->template->add_js($this->load->view('js/select-box.js',null,TRUE),'embed',TRUE);
		$this->load_basic($item,$action,$id);
	}
	function ministry($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function project_status($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function manage_user($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}			
		
	function json_get_amphur_by_provice_id($provice_id)
	{
		$amphur=array();
		foreach($this->amphur->get_by_province($provice_id) as $item)
		{
			array_push($amphur,array('id'=>$item->ID,'amphur_name'=>$item->AMPHUR_NAME));
		}
		//print_r($district);
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
	function load_basic($item=null,$action=null,$id=null)
	{
				
		if(empty($action))
		{
			$this->load_jquery_dtable();		
			$data['basic_item']=$item;
			$data['Basic_info']=$this->Basic->get($item);
			$data['content']=array('title'=>$data['Basic_info']['desc'],
									'color'=>'primary',
									'toolbar'=>$this->load->view('toolsbar',$data,TRUE),
									'detail'=>$data['Basic_info']['view']);
			$this->template->write('page_header','ข้อมูลพื้นฐาน');
			$this->template->write_view('content','contents',$data);	
		}
		else 
		{
				$desc=$this->{$item}->desc;
				$action_array=array('new','edit');
				if(in_array($action, $action_array))
				{
					$this->template->write('page_header','ข้อมูลพื้นฐาน <i class="fa fa-angle-double-right"></i> '.$desc);
					$getForm=$this->get_form($item,$action,$id);
					$data['content']=array('title'=>$getForm['title'],'detail'=>$getForm['detail']);
					$this->template->write_view('content','contents',$data);
					//$this->template->write_view('action_button','action_btn');
				}
				else show_404();
				
		}
		$this->template->render();
	}

	function load_jquery_dtable()
	{
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->add_js($this->load->view('js/datables.js',null,TRUE),'embed',TRUE);
	}
	function get_form($item=null,$action=null,$id=null)
	{
		// this function get form view basic data to post and update
		$desc=$this->{$item}->desc;
		$action_array=array('new','edit');
		if(in_array($action, $action_array))
		{
			if($action=='new')
			{
				$data['action']=base_url().'basic/post/'.$item;
				$reForm['title']='เพิ่มข้อมูล'.$desc;
			}
			if($action=='edit')
			{
				$data['action']=base_url().'basic/put/'.$item.'/'.$id;
				$data['edit_item']=$this->Basic->load_edit($item,$id);
				$reForm['title']='แก้ไขข้อมูล'.$desc;
			}
		
		$data['action_btn']=$this->load->view('action_btn',null,TRUE);
		$reForm['detail']=$this->load->view('form_'.$item,$data,TRUE);

		return $reForm;
		}
		else show_404();
		
	}
	function post($item=null)
	{
		// this function add new record in to basic data
		//print_r($this->input->post());
		$result=$this->Basic->post($item);
		if(!$result) {
			$message=array('color'=>'info',
        				'icon'=>'fa-comment-o',
        				'title'=>$desc=$this->{$item}->desc,
        				'details'=>'ข้อมูลยังไม่สมบูรณ์ในช่อง*');
        	$res=$this->load->controller('message/alert',$message,FALSE);
			$this->template->write('content',$res);
			$this->load_basic($item,'new');
		}
		else redirect(base_url().'basic/'.$item);
		
		
	}
	function put($item=null,$id=null,$status=null)
	{
		// this function update record in to basic data
		$result=$this->Basic->put($item,$id,$status);
		if($status==null)
		{
			if(!$result) {
			$message=array('color'=>'info',
        				'icon'=>'fa-comment-o',
        				'title'=>$desc=$this->{$item}->desc,
        				'details'=>'ข้อมูลยังไม่สมบูรณ์ในช่อง*');
        	$res=$this->load->controller('message/alert',$message,FALSE);
			$this->template->write('content',$res);
			$this->load_basic($item,'new');
			}
		}
		redirect(base_url().'basic/'.$item);
				
	}
	function delete($item=null,$id=null)
	{
		
		if($this->{$item}->delete($id)) 
		{
			redirect(base_url().'basic/'.$item);
		}
		else show_error('ไม่สามารถลบรายการได้ เนื่องจากยังมีข้อมูลเชื่อมโยงอยู่');
	}
	
}