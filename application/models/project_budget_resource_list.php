<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class project_budget_resource_list extends CI_Model 

{
	var $table='project_budget_resource_list';
	var $desc='แหล่งที่มาของงบประมาณต่อโครงการ';
	function __construct()
	{
		parent::__construct();
			
	}
	function get_by_project_planning_id($project_planning_id=null)
	{
		$this->db->join('budget_resource',$this->table.'.BUDGET_RESOURCE_ID=budget_resource.ID');
		$this->db->where($this->table.'.PROJECT_PLANING_ID',$project_planning_id);
		return $this->db->get($this->table)->result();
	}
	function get_by_id($budget_resource_id)
	{

		$this->db->where('BUDGET_RESOURCE_ID',$budget_resource_id);
		$this->db->from($this->table);
		return $this->db->get()->result();
	}
	function get_one($project_planning_id=null,$budget_resource_id)
	{
	  if($project_planning_id!=null)	
	  {	
		$this->db->where('PROJECT_PLANING_ID',$project_planning_id);
		$this->db->where('BUDGET_RESOURCE_ID',$budget_resource_id);
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
	function count_by_id($budget_resource_id)
	{

		$this->db->where('BUDGET_RESOURCE_ID',$budget_resource_id);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
	