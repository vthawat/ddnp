<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Budget_resource extends CI_Model 
{
	var $table='budget_resource';
	var $desc='แหล่งที่มาของงบประมาณ';
	function __construct()
	{
		parent::__construct();
		//$this->load->model('project');
			
	}
	function get_by_id($id)
	{
		$this->db->where('ID', $id);
		return $this->db->get($this->table)->row();
	}
	function get_all()
	{
		return $this->db->get($this->table)->result();
	}
	function post($data)
	{
		return $this->db->insert($this->table,$data);
	}
	function put($data,$id)
	{
		$this->db->where('ID',$id);
		return $this->db->update($this->table,$data);	
	}
	function delete($id)
	{	
		$this->db->where('ID',$id);
		return $this->db->delete($this->table);
	}
	
	function get_year_list()
	{
		$year_list=array();
		$sql="SELECT DISTINCT
			budget_year.`YEAR`,budget_year.`ID`
			FROM
			project_budget_resource_list
			INNER JOIN project_planning ON project_budget_resource_list.PROJECT_PLANING_ID = project_planning.ID
			INNER JOIN budget_year ON project_planning.BUDGET_YEAR_ID = budget_year.ID
			ORDER BY
			budget_year.`YEAR` ASC";
		$result=$this->db->query($sql)->result();
		return $result;


	}
	function get_on_project_planning()
	{
		$sql="SELECT DISTINCT
			project_budget_resource_list.BUDGET_RESOURCE_ID,
			budget_resource.RESOURCE_NAME
			FROM
			project_budget_resource_list
			INNER JOIN budget_resource ON project_budget_resource_list.BUDGET_RESOURCE_ID = budget_resource.ID";
		$result=$this->db->query($sql)->result();
		return $result;
	}
function sum_budget_by_year_and_budget_resource_id($year_id,$budget_resource_id)
	{
		$sql="SELECT SUM(project_planning.BUDGET) AS TOTAL
				FROM
				project_budget_resource_list
				INNER JOIN project_planning ON project_budget_resource_list.PROJECT_PLANING_ID = project_planning.ID
				WHERE
				project_budget_resource_list.BUDGET_RESOURCE_ID = '$budget_resource_id' AND
				project_planning.BUDGET_YEAR_ID = '$year_id'";
		$result=$this->db->query($sql)->row()->TOTAL;
		return $result;

	}
}

/* End of file template.php */
/* Location: ./application/models/potentiality.php */
