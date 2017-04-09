<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ministry extends CI_Model 
{
	var $table='ministry';
	var $desc='กระทรวง';
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
			project_ministry_list
			INNER JOIN project_planning ON project_ministry_list.PROJECT_PLANING_ID = project_planning.ID
			INNER JOIN budget_year ON project_planning.BUDGET_YEAR_ID = budget_year.ID
			ORDER BY
			budget_year.`YEAR` ASC";
		$result=$this->db->query($sql)->result();
		return $result;


	}
	function get_on_project_planning()
	{
		$sql="SELECT DISTINCT
			project_ministry_list.MINISTRY_ID,
			ministry.MINISTRY_NAME
			FROM
			project_ministry_list
			INNER JOIN ministry ON project_ministry_list.MINISTRY_ID = ministry.ID
			WHERE project_ministry_list.OWNER=1";
		$result=$this->db->query($sql)->result();
		return $result;
	}
function sum_budget_by_year_and_ministry_id($year_id,$ministry_id)
	{
		$sql="SELECT SUM(project_planning.BUDGET) AS TOTAL
				FROM
				project_ministry_list
				INNER JOIN project_planning ON project_ministry_list.PROJECT_PLANING_ID = project_planning.ID
				WHERE
				project_ministry_list.MINISTRY_ID = '$ministry_id' AND
				project_planning.BUDGET_YEAR_ID = '$year_id'";
		$result=$this->db->query($sql)->row()->TOTAL;
		return $result;

	}
}

/* End of file template.php */
/* Location: ./application/models/potentiality.php */
