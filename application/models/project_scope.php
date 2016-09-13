<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_scope extends CI_Model 
{
	var $table='project_scope';
	var $project_scope=array();
	function __construct()
	{
		parent::__construct();
				
	}
	
	function load_scope()
	{
		$this->db->where('ACTIVE_STATUS',1);
		$scope_list=$this->db->get($this->table)->result();
		foreach ($scope_list as $scope) {
			array_push($this->project_scope,$scope->PROVINCE_ID);
		}
		return $this->project_scope;
	}
	function get_all()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->province->table,$this->table.'.PROVINCE_ID='.$this->province->table.'.ID');
		return $this->db->get()->result();
	}
	function find_status($province_id)
	{
		$this->db->where('PROVINCE_ID',$province_id);
		return $this->db->get($this->table)->row()->ACTIVE_STATUS;
	}
	function post($data)
	{
		return $this->db->insert($this->table,$data);
	}
	function put($id,$status)
	{

		if(count($this->project_scope)!=1)
		{
			$this->db->where('PROVINCE_ID',$id);
			return $this->db->update($this->table,array('ACTIVE_STATUS'=>$status));
		}
	}
}
/* End of file template.php */
/* Location: ./application/models/project_scope.php */