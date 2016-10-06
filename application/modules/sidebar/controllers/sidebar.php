<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sidebar extends CI_Controller {
	var $sidebar_items=array();
	var $sidebar_set;

	function __construct()
	{
		parent::__construct();
		//$this->load->model('require_develop');
		$this->load->model('init_basic');	
		$this->load->library('session');	
		
		
	}
function access_map()
{

}
	function set_role($role_id)
	{
		if($role_id==1)
		{
			$this->sb_household();
			$this->sb_basic();
		}
		else $this->sb_household();
		
		//return $this->get_sidebar();
	}
	function get_sidebar()
	{
		$this->set_role($this->session->userdata('access_role'));
		foreach($this->sidebar_items as $item)
		   $this->sidebar_set.=$item;
		
		return $this->sidebar_set;
	}
	function sb_household()
	{

	  $data['set_province']=$this->province->get_all();
	  array_push($this->sidebar_items,$this->load->view('household',$data,TRUE));		
		//return $this->load->view('trader_sidebar',$data,TRUE);
	}
	function sb_requiredev()
	{

	  $data['set_province']=$this->province->get_all();
	  array_push($this->sidebar_items,$this->load->view('requiredev',$data,TRUE));		
		//return $this->load->view('trader_sidebar',$data,TRUE);
	}
	function sb_basic()
	{
	//	$this->load->model('init_basic');
		array_push($this->sidebar_items,$this->load->view('basic',null,TRUE));	
	}	
}
	