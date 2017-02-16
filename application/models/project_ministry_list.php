<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_ministry_list extends CI_Model 

{
	var $table='project_ministry_list';
	var $desc='กระทรวงที่รับผิดชอบต่อโครงการ';
	function __construct()
	{
		parent::__construct();
			
	}
	function get_by_project_planning_id($project_planning_id=null)
	{
		$this->db->join('ministry',$this->table.'.MINISTRY_ID=ministry.ID');
		$this->db->where($this->table.'.PROJECT_PLANING_ID',$project_planning_id);
		return $this->db->get($this->table)->result();

	}
	function get_by_id($ministry_id)
	{

		$this->db->where('MINISTRY_ID',$ministry_id);
		$this->db->from($this->table);
		return $this->db->get()->result();
	}
	function get_one($project_planning_id=null,$ministry_id)
	{
	  if($project_planning_id!=null)	
	  {	
		$this->db->where('PROJECT_PLANNING_ID',$project_planning_id);
		$this->db->where('MINISTRY_ID',$ministry_id);
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
		$this->db->where('PROJECT_PLANNING_ID',$project_planning_id);
		$this->db->delete($this->table);
	}
	function count_by_id($ministry_id)
	{

		$this->db->where('MINISTRY_ID',$ministry_id);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
	