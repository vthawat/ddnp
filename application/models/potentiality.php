<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Potentiality extends CI_Model 
{
	var $table='potentiality';
	var $desc='กลุ่มภารกิจงาน';
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
		$this->db->where('id',$id);
		return $this->db->update($this->table,$data);	
	}
	function delete($id)
	{
		//if($this->require_household->find_potentiality($id)) return FALSE;	
		$this->db->where('id',$id);
		return $this->db->delete($this->table);
	}
	function count_by_year_and_potential_id($year_id,$potential_id)
	{
		$sql="SELECT COUNT(project_potential_list.POTENTIALITY_ID) AS TOTAL
				FROM
				project_potential_list
				INNER JOIN project_planning ON project_potential_list.PROJECT_PLANING_ID = project_planning.ID
				WHERE
				project_potential_list.POTENTIALITY_ID = '$potential_id' AND
				project_planning.BUDGET_YEAR_ID = '$year_id'";
		$result=$this->db->query($sql)->row()->TOTAL;
		return $result;

	}
	function sum_budget_by_year_and_potential_id($year_id,$potential_id)
	{
		$sql="SELECT SUM(project_planning.BUDGET) AS TOTAL
				FROM
				project_potential_list
				INNER JOIN project_planning ON project_potential_list.PROJECT_PLANING_ID = project_planning.ID
				WHERE
				project_potential_list.POTENTIALITY_ID = '$potential_id' AND
				project_planning.BUDGET_YEAR_ID = '$year_id'";
		$result=$this->db->query($sql)->row()->TOTAL;
		return $result;

	}	
	function get_json_year_list()
	{
		$year_list=array();
		$sql="SELECT DISTINCT
			budget_year.`YEAR`
			FROM
			project_potential_list
			INNER JOIN project_planning ON project_potential_list.PROJECT_PLANING_ID = project_planning.ID
			INNER JOIN budget_year ON project_planning.BUDGET_YEAR_ID = budget_year.ID
			ORDER BY
			budget_year.`YEAR` ASC";
		$result=$this->db->query($sql)->result();
		foreach($result as $item)
			array_push($year_list,$item->YEAR);
		return json_encode($year_list);

	}
 function get_year_list()
	{
		$year_list=array();
		$sql="SELECT DISTINCT
			budget_year.`YEAR`,budget_year.`ID`
			FROM
			project_potential_list
			INNER JOIN project_planning ON project_potential_list.PROJECT_PLANING_ID = project_planning.ID
			INNER JOIN budget_year ON project_planning.BUDGET_YEAR_ID = budget_year.ID
			ORDER BY
			budget_year.`YEAR` ASC";
		$result=$this->db->query($sql)->result();
		return $result;
		/*foreach($result as $item)
			array_push($year_list,$item->YEAR);
		return ($year_list);*/

	}

	function get_json_count_by_potential_id($potential_id)
	{
		$sql="SELECT DISTINCT
				budget_year.`YEAR`,
				budget_year.ID as year_id,
				(SELECT COUNT(project_potential_list.POTENTIALITY_ID)
				FROM
				project_potential_list
				INNER JOIN project_planning ON project_potential_list.PROJECT_PLANING_ID = project_planning.ID
				WHERE
				project_potential_list.POTENTIALITY_ID = '$potential_id' AND
				project_planning.BUDGET_YEAR_ID = year_id) as TOTAL
				FROM
				project_potential_list
				INNER JOIN project_planning ON project_potential_list.PROJECT_PLANING_ID = project_planning.ID
				INNER JOIN budget_year ON project_planning.BUDGET_YEAR_ID = budget_year.ID
				ORDER BY
				budget_year.`YEAR` ASC";
		$result=$this->db->query($sql)->result();		
		$potential_num=array();
		foreach($result as $item)
			array_push($potential_num,$item->TOTAL);
		return json_encode($potential_num);

	}

	function get_on_project_planning()
	{
		$sql="SELECT DISTINCT
			project_potential_list.POTENTIALITY_ID,
			potentiality.POTENTIALITY_NAME
			FROM
			project_potential_list
			INNER JOIN potentiality ON project_potential_list.POTENTIALITY_ID = potentiality.ID";
		$result=$this->db->query($sql)->result();
		return $result;
	}

}

/* End of file template.php */
/* Location: ./application/models/potentiality.php */
