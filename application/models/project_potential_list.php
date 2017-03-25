<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_potential_list extends CI_Model 

{
	var $table='project_potential_list';
	var $desc='รายการภารกิจ';
	function __construct()
	{
		parent::__construct();
			
	}
	function get_by_project_planning_id($project_planning_id=null)
	{
		$this->db->join('potentiality',$this->table.'.POTENTIALITY_ID=potentiality.ID');
		$this->db->where($this->table.'.PROJECT_PLANING_ID',$project_planning_id);
		return $this->db->get($this->table)->result();
	}
	function get_by_potentiality($potentiality_id)
	{

		$this->db->where('POTENTIALITY_ID',$potentiality_id);
		$this->db->from($this->table);
		return $this->db->get()->result();
	}
	function get_one($project_planning_id=null,$potentiality_id)
	{
	  if($project_planning_id!=null)	
	  {	
		$this->db->where('PROJECT_PLANING_ID',$project_planning_id);
		$this->db->where('POTENTIALITY_ID',$potentiality_id);
		return $this->db->get($this->table)->row();
	  }
	  else return null;
		//exit(print $this->db->last_query());
	}
	function post($data)
	{
		return $this->db->insert($this->table,$data);
	}

	function delete_all_project_planning_id($project_planning_id)
	{
		$this->db->where('PROJECT_PLANING_ID',$project_planning_id);
		$this->db->delete($this->table);
	}
	function delete_by_project_id($project_id)
    {
        $this->db->where('PROJECT_PLANING_ID',$project_id);
		return $this->db->delete($this->table);

    }
	function count_by_id($potentiality_id)
	{

		$this->db->where('POTENTIALITY_ID',$potentiality_id);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
	