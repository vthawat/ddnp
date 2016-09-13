<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Year_budget extends CI_Model 
{
	var $table='budget_year';
	var $desc='ปีงบประมาณ';
	function __construct()
	{
		parent::__construct();
		
			
	}
	function get_by_id($id)
	{
		$this->db->where('ID', $id);
		return $this->db->get($this->table)->row();
	}
		function get_by_year($year)
	{
		$this->db->where('YEAR', $year);
		return $this->db->get($this->table)->row();
	}
	function get_all()
	{
				$this->db->order_by('YEAR','desc');
			return $this->db->get($this->table)->result();
	}
	function get_next_year()
	{
		$year_now=date('Y')+543;
		$this->db->select_max('YEAR');
		$lated_year=$this->db->get($this->table)->row()->YEAR;
		if(!empty($lated_year))	return $lated_year+1;
		else return $year_now;	
	}
	function post($data)
	{
		return $this->db->insert($this->table,$data);
	}
	

}

/* End of file template.php */
/* Location: ./application/models/amphur.php */
