<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Basic_adaptor extends CI_Model 
{
	var $desc;
	var $items;
	var $view;
	function __construct()
	{
		parent::__construct();
			
	}
	function post($item=null)
	{
		if(empty($item)) return FALSE;
		$data=$this->input->post();
		switch ($item) 
		{
			case 'potentiality':
				if(empty($data['POTENTIALITY_NAME']))	return FALSE;
				return $this->potentiality->post($data);
			break;
			case 'ministry':
				if(empty($data['MINISTRY_NAME']))	return FALSE;
				return $this->potentiality->post($data);
			break;
			case 'province':
				if(empty($data['PROVINCE_ID']))	return FALSE;
				return $this->project_scope->post($data);
			break;
			case 'year_budget':
				return $this->year_budget->post($data);
			break;	
						
		}
	}
	function put($item=null,$id=null,$status=null)
	{
		if(empty($item)&&empty($id)) return FALSE;
		$data=$this->input->post();
		switch($item)
		{
			case 'potentiality':
				if(empty($data['POTENTIALITY_NAME']))	return FALSE;
				return $this->potentiality->put($data,$id);
			break;
			case 'province':
				return $this->project_scope->put($id,$status);
			break;
		
		}
		

	}
	function load_edit($item,$id)
	{
		return $this->{$item}->get_by_id($id);
	}
	function get($item)
	{
		switch ($item) 
		{
			case 'year_budget':
				$this->desc=$this->year_budget->desc;
					$this->items=$this->year_budget->get_all();
					return array('desc'=>$this->desc,
								'items'=>$this->items,
								'view'=>$this->load->view('basic_'.$item,array('Basic_items'=>$this->items),TRUE));
			break;
			case 'province':
					$this->desc=$this->province->desc;
					$this->items=$this->project_scope->get_all();
					return array('desc'=>'รายชื่อ'.$this->desc,
								'items'=>$this->items,
								'view'=>$this->load->view('basic_'.$item,array('Basic_items'=>$this->items),TRUE));	
				break;
			case 'amphur':
					$this->desc=$this->amphur->desc;
					$this->items=$this->amphur->get_all();
					return array('desc'=>'รายชื่อ'.$this->desc,
								'items'=>$this->items,
								'view'=>$this->load->view('basic_'.$item,array('Basic_items'=>$this->items),TRUE));	
				break;
			case 'district':
					$this->desc=$this->district->desc;
					$this->items=$this->district->get_all();
					return array('desc'=>'รายชื่อ'.$this->desc,
								'items'=>$this->items,
								'view'=>$this->load->view('basic_'.$item,array('Basic_items'=>$this->items),TRUE));	
				break;
			case 'village':
					$this->desc=$this->village->desc;
					$this->items=$this->village->get_all();
					return array('desc'=>'รายชื่อ'.$this->desc,
								'items'=>$this->items,
								'view'=>$this->load->view('basic_'.$item,array('Basic_items'=>$this->items),TRUE));	
				break;
			case 'potentiality':
					$this->desc=$this->potentiality->desc;
					$this->items=$this->potentiality->get_all();
					return array('desc'=>'กลุ่ม'.$this->desc,
								'items'=>$this->items,
								'view'=>$this->load->view('basic_'.$item,array('Basic_items'=>$this->items),TRUE));	
				break;
			case 'ministry':
					$this->desc=$this->ministry->desc;
					$this->items=$this->ministry->get_all();
					return array('desc'=>'รายชื่อ'.$this->desc,
								'items'=>$this->items,
								'view'=>$this->load->view('basic_'.$item,array('Basic_items'=>$this->items),TRUE));	
				break;																		
			default:
				return FALSE;
				break;
		}
	}

}

/* End of file template.php */
/* Location: ./application/modules/admin/models/basic.php */