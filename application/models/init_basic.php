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
		$this->load->model('require_potential_list');
		$this->load->model('amphur');
		$this->load->model('district');
		$this->load->model('ministry');
	}
	

}


/* End of file template.php */
/* Location: ./application/models/province.php */
