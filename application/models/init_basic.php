<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Init_basic extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('project_scope');
		$this->load->model('year_budget');
		$this->load->model('province');
		$this->load->model('potentiality');
		$this->load->model('project_potential_list');
		$this->load->model('project_ministry_list');
		$this->load->model('project_budget_resource_list');
		$this->load->model('response_require_list');
		$this->load->model('amphur');
		$this->load->model('district');
		$this->load->model('village');
		$this->load->model('ministry');
		$this->load->model('budget_resource');
		$this->load->model('project_status');
		$this->load->model('manage_user');
	}
	

}


/* End of file template.php */
/* Location: ./application/models/province.php */
