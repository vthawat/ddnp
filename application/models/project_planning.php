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
	function get_all($fillter=array())
	{
		//exit(print_r($fillter));
		foreach($fillter as $key=>$item)
				 if(empty($item)) unset($fillter[$key]);
		$query=$this->db->get_where($this->table,$fillter);
		return $query->result();
	}
	
	function get_json_gis_all($fillter=null)
	{
		$gis=array();
		foreach ($this->get_all($fillter) as $item) {
			//if(!empty($item->LATITUDE)&&!empty($item->LONGTITUDE))
			//{
				array_push($gis,array('position'=>array($item->LATITUDE,$item->LONGTITUDE),
				array('content'=>array($item->ID))));
			//}
		}
		//exit(print_r($gis));
		return json_encode($gis);
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
	function update_location_images($data,$id)
	{
		$this->db->where('ID',$id);
		return $this->db->update($this->table,$data);

	}
	function update($data,$id)
	{

		$this->db->where('ID',$id);
		return $this->db->update($this->table,$data);
	}
	function delete($id)
	{
		// delete all referenc key
		$this->load->model('project_tasking');
		if($this->project_tasking->delete_by_project_id($id))
			if($this->project_budget_resource_list->delete_by_project_id($id))
				if($this->project_ministry_list->delete_by_project_id($id))
					if($this->project_potential_list->delete_by_project_id($id))
						if($this->response_require_list->delete_by_project_id($id))
						{
		
							$this->db->where('ID',$id);
							return $this->db->delete($this->table);
						}
						else return FALSE;
	}
	function count_by_province_id($province_id)
	{
		$this->db->where('PROVINCE_ID',$province_id);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	function count_all(){
	$sql="SELECT COUNT(project_planning.ID) as TOTAL_PROJECT
				FROM
				project_planning";
		return $this->db->query($sql)->row()->TOTAL_PROJECT;
	}

 function get_year_list()
	{
		$sql="SELECT DISTINCT
				budget_year.`YEAR`,
				project_planning.BUDGET_YEAR_ID 
				FROM
				project_planning
				INNER JOIN budget_year ON project_planning.BUDGET_YEAR_ID = budget_year.ID
				ORDER BY budget_year.`YEAR` DESC";
		$result=$this->db->query($sql)->result();
		return $result;
	}
	function get_json_year_list()
	{
		$year_list=array();
		$sql="SELECT DISTINCT
				budget_year.`YEAR`
				FROM
				project_planning
				INNER JOIN budget_year ON project_planning.BUDGET_YEAR_ID = budget_year.ID
				ORDER BY budget_year.`YEAR` ASC";
		$result=$this->db->query($sql)->result();
		foreach($result as $item)
			array_push($year_list,$item->YEAR);
		return json_encode($year_list);
	}
	function get_json_count_by_province_id($province_id)
	{
		$project_num=array();
		$sql="SELECT DISTINCT
				budget_year.`YEAR`,
				budget_year.ID as year_id,
						(SELECT
						count(project_planning.PROVINCE_ID)
						FROM
						project_planning
						WHERE
						project_planning.PROVINCE_ID = '$province_id' AND
						project_planning.BUDGET_YEAR_ID = year_id) as TOTAL
				FROM
				project_planning
				INNER JOIN budget_year ON project_planning.BUDGET_YEAR_ID = budget_year.ID 
				ORDER BY budget_year.`YEAR` ASC";
		$result=$this->db->query($sql)->result();
		foreach($result as $item)
			array_push($project_num,$item->TOTAL);
		return json_encode($project_num);

	}

	function get_provice_active()
	{
		$sql="SELECT
			project_scope.PROVINCE_ID,
			project_scope.CHART_COLOR,
			province.PROVINCE_NAME
			FROM
			project_scope
			INNER JOIN province ON project_scope.PROVINCE_ID = province.ID
			WHERE
			project_scope.ACTIVE_STATUS = 1
			ORDER BY
			project_scope.PROVINCE_ID ASC";
		$result=$this->db->query($sql)->result();
		return $result;
	}
	
}

/* End of file template.php */
/* Location: ./application/models/project.php */
