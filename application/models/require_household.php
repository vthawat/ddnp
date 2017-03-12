<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Require_household extends CI_Model 
{
	var $table='require_household';
	var $desc='ความต้องการในระดับครัวเรือน';
	var $insert_id;
	var $update_id;
	var $year=null;
	function __construct()
	{
		parent::__construct();
		
			
	}
	function get_year_id()
	{
		$this->db->select('ID');
		$this->db->where('YEAR',$this->year);
		return $this->db->get('budget_year')->row()->ID;

	}
	function get_by_id($id)
	{
		$this->db->select($this->table.'.*,VILLAGE_NAME,PROVINCE_NAME,AMPHUR_NAME,DISTRICT_NAME,YEAR');
		$this->db->join($this->year_budget->table,$this->table.'.BUDGET_YEAR_ID = '.$this->year_budget->table.'.ID');
		$this->db->join('province',$this->table.'.PROVINCE_ID = province.ID');
		$this->db->join('amphur','amphur.PROVINCE_ID = province.ID AND '.$this->table.'.AMPHUR_ID = amphur.ID');
		$this->db->join('district','district.PROVINCE_ID = province.ID AND '.$this->table.'.DISTRICT_ID = district.ID');
		$this->db->join('village',$this->table.'.VILL_ID = village.ID');
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
	function get_village_by_id($array_id)
	{
		$array_village=array();
		$this->db->distinct();
		$this->db->select('VILL_ID');
		$this->db->where_in('ID',$array_id);
		$result=$this->db->get($this->table)->result();
		if(!empty($result))
			foreach($result as $item)
				array_push($array_village,$item->VILL_ID);
		//else return $array_village
	//	exit(print $this->db->last_query());
		return $array_village;

	}
	function get_year_list_all()
	{
		
		$sql="SELECT DISTINCT
			budget_year.`YEAR`
			FROM
			require_household
			INNER JOIN budget_year ON require_household.BUDGET_YEAR_ID = budget_year.ID";
		return $this->db->query($sql)->result();
	}
	function get_by_province($id)
	{
		$this->db->select($this->table.'.*,VILLAGE_NAME,PROVINCE_NAME,AMPHUR_NAME,DISTRICT_NAME,YEAR');
		$this->db->join($this->year_budget->table,$this->table.'.BUDGET_YEAR_ID = '.$this->year_budget->table.'.ID');
		$this->db->join('village',$this->table.'.VILL_ID = village.ID');
		$this->db->join('province',$this->table.'.PROVINCE_ID = province.ID');
		$this->db->join('amphur','amphur.PROVINCE_ID = province.ID AND '.$this->table.'.AMPHUR_ID = amphur.ID');
		$this->db->join('district','district.PROVINCE_ID = province.ID AND '.$this->table.'.DISTRICT_ID = district.ID');
		$this->db->where($this->table.'.PROVINCE_ID',$id);
		return $this->db->get($this->table)->result();

	}
	function get_by_village_id($array_village)
	{

		$require_house_id=array();
		$this->db->select('ID');
		if(!empty($this->year)) $this->db->where('BUDGET_YEAR_ID',$this->get_year_id());
		$this->db->where_in('VILL_ID',$array_village);
		foreach($this->db->get($this->table)->result() as $item)
		 array_push($require_house_id,$item->ID);	
		return $require_house_id;

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
		$this->db->insert($this->table,$data);
		$this->insert_id=$this->db->insert_id();
		if(!empty($this->insert_id)) return TRUE;
		else return FALSE;
	}
	function update($data,$id)
	{
		

		//$this->update_id=$id;
		$this->db->where('ID',$id);
		return $this->db->update($this->table,$data);
	}
	function delete($id)
	{
		$this->db->where('ID',$id);
		return $this->db->delete($this->table);
	}
 function count_village_all()
	{
		$sql="SELECT COUNT(DISTINCT require_household.VILL_ID) as TOTAL_VILLAGE
				FROM
				require_household";
		return $this->db->query($sql)->row()->TOTAL_VILLAGE;

	}
	function count_household_all()
	{
		$sql="SELECT COUNT(require_household.VILL_ID) as TOTAL_HOUSEHOLD
				FROM
				require_household";
		return $this->db->query($sql)->row()->TOTAL_HOUSEHOLD;

	}	
	function count_village_by_district_id($district_id)
	{
		$sql="SELECT COUNT(DISTINCT require_household.VILL_ID) as TOTAL_VILLAGE
				FROM
				require_household
				WHERE
				require_household.DISTRICT_ID = '$district_id'";
		if(!empty($this->year))
			$sql.="AND BUDGET_YEAR_ID =".$this->get_year_id();
		return $this->db->query($sql)->row()->TOTAL_VILLAGE;

	}
	function count_household_by_district_id($district_id)
	{
		$sql="SELECT COUNT(require_household.VILL_ID) as TOTAL_HOUSEHOLD
				FROM
				require_household
				WHERE
				require_household.DISTRICT_ID = '$district_id'";
		if(!empty($this->year))
			$sql.="AND require_household.BUDGET_YEAR_ID =".$this->get_year_id();		
		return $this->db->query($sql)->row()->TOTAL_HOUSEHOLD;

	}
	function count_affliction_all($affliction=null)
	{
		$sql="SELECT COUNT(require_household.$affliction) as TOTAL_HOUSEHOLD
				FROM
				require_household
				WHERE ";		
		if($affliction!="AFFLICTION_ETC")
			$sql.="require_household.$affliction=1";
		else $sql.="require_household.$affliction<>'0'";
		//exit(print $sql);
		return $this->db->query($sql)->row()->TOTAL_HOUSEHOLD;

	}
	function count_avocation_all($avocation=null)
	{
				$sql="SELECT COUNT(require_household.$avocation) as TOTAL_HOUSEHOLD
						FROM
						require_household
						WHERE";
				if($avocation!="AVOCATION_ETC")
					$sql.=" require_household.$avocation=1";
				else $sql.=" require_household.$avocation<>'0'";
				
				return $this->db->query($sql)->row()->TOTAL_HOUSEHOLD;

	}

	function count_affliction_by_district_id($affliction=null,$district_id)
	{
		$sql="SELECT COUNT(require_household.$affliction) as TOTAL_HOUSEHOLD
				FROM
				require_household
				WHERE
				require_household.DISTRICT_ID = '$district_id'";
		if(!empty($this->year))
			$sql.=" AND require_household.BUDGET_YEAR_ID =".$this->get_year_id();				
		if($affliction!="AFFLICTION_ETC")
			$sql.=" AND require_household.$affliction=1";
		else $sql.=" AND require_household.$affliction<>'0'";
		//exit(print $sql);
		return $this->db->query($sql)->row()->TOTAL_HOUSEHOLD;

	}
function count_avocation_by_district_id($avocation=null,$district_id)
	{
		$sql="SELECT COUNT(require_household.$avocation) as TOTAL_HOUSEHOLD
				FROM
				require_household
				WHERE
				require_household.DISTRICT_ID = '$district_id'";
if(!empty($this->year))
			$sql.=" AND require_household.BUDGET_YEAR_ID =".$this->get_year_id();

		if($avocation!="AVOCATION_ETC")
			$sql.=" AND require_household.$avocation=1";
		else $sql.=" AND require_household.$avocation<>'0'";
		
		return $this->db->query($sql)->row()->TOTAL_HOUSEHOLD;

	}
  function count_by_village_id($village_id)
	{
			$sql="SELECT COUNT(VILL_ID) as TOTAL_VILLAGE
				FROM
				require_household
				WHERE VILL_ID='$village_id'";
			if(!empty($this->year))
			$sql.="AND BUDGET_YEAR_ID =".$this->get_year_id();					
		return $this->db->query($sql)->row()->TOTAL_VILLAGE;
	}
			
}

/* End of file template.php */
/* Location: ./application/models/project.php */
