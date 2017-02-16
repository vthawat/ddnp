<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_planning extends CI_Model 
{
	var $table='project_planning';
	var $desc='โครงการพัฒนาศักยภาพ';
	var $insert_id;
	var $update_id;
	function __construct()
	{
		parent::__construct();
		
			
	}
	function get_by_id($id)
	{
		$this->db->select($this->table.'.*,PROVINCE_NAME,AMPHUR_NAME,DISTRICT_NAME,YEAR');
		$this->db->join($this->year_budget->table,$this->table.'.BUDGET_YEAR_ID = '.$this->year_budget->table.'.ID');
		$this->db->join('province',$this->table.'.PROVINCE_ID = province.ID');
		$this->db->join('amphur','amphur.PROVINCE_ID = province.ID AND '.$this->table.'.AMPHUR_ID = amphur.ID');
		$this->db->join('district','district.PROVINCE_ID = province.ID AND '.$this->table.'.DISTRICT_ID = district.ID');
		$this->db->where($this->table.'.ID', $id);
		return $this->db->get($this->table)->row();
	}
	function get_all()
	{
		/*$this->db->select('*');
		$this->db->join('village','project.POTENTIALITY_ID = potentiality.ID');
		$this->db->join($this->year_budget->table,'project.YEAR_BUDGET_ID = year_budget.ID');
		$this->db->join('province','project.PROVINCE_ID = province.ID');
		$this->db->join('amphur','amphur.PROVINCE_ID = province.ID AND project.AMPHUR_ID = amphur.ID');
		$this->db->join('district','district.PROVINCE_ID = province.ID AND project.DISTRICT_ID = district.ID');
		return $this->db->get($this->table)->result();*/
	}
	function get_by_province($id)
	{
		$this->db->select($this->table.'.*,PROVINCE_NAME,AMPHUR_NAME,DISTRICT_NAME,YEAR');
		$this->db->join($this->year_budget->table,$this->table.'.BUDGET_YEAR_ID = '.$this->year_budget->table.'.ID');
		//$this->db->join('ministry',$this->table.'.MINISTRY_ID = ministry.ID');
		$this->db->join('province',$this->table.'.PROVINCE_ID = province.ID');
		$this->db->join('amphur','amphur.PROVINCE_ID = province.ID AND '.$this->table.'.AMPHUR_ID = amphur.ID');
		$this->db->join('district','district.PROVINCE_ID = province.ID AND '.$this->table.'.DISTRICT_ID = district.ID');
		$this->db->where($this->table.'.PROVINCE_ID',$id);
		return $this->db->get($this->table)->result();

	}
	function find_potentiality($POTENTIALITY_ID)
	{
		$this->db->where('POTENTIALITY_ID',$POTENTIALITY_ID);
		$this->db->from($this->table);
		if($this->db->count_all_results()>0) return TRUE;
		else return FALSE;

	}
	function post($data)
	{
		//exit(print_r($data));
		$this->db->insert($this->table,$data);
		$this->insert_id=$this->db->insert_id();
		if(!empty($this->insert_id)) return TRUE;
		else return FALSE;
	}
	function update($data,$id)
	{

		$this->db->where('ID',$id);
		return $this->db->update($this->table,$data);
	}
	function delete($id)
	{
		$this->db->where('ID',$id);
		return $this->db->delete($this->table);
	}
	function count_by_province_id($province_id)
	{
		$this->db->where('PROVINCE_ID',$province_id);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}

/* End of file template.php */
/* Location: ./application/models/project.php */
