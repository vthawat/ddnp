<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Village extends CI_Model 
{
	var $table='village';
	var $desc='หมู่บ้าน';
	function __construct()
	{
		parent::__construct();
		
			
	}
	function get_by_id($id)
	{
		$this->db->where('ID', $id);
		return $this->db->get($this->table)->row();
	}
	function get_by_district_id($district_id)
	{
		$this->db->where('DISTRICT_ID',$district_id);
		return $this->db->get($this->table)->result();
	}
	function get_on_require_household_by_district_id($district_id)
	{
		$sql="SELECT DISTINCT
			village.ID,
			village.VILLAGE_NAME
			FROM
			require_household
			INNER JOIN village ON require_household.VILL_ID = village.ID
			WHERE
			require_household.DISTRICT_ID = '$district_id'";
		return $this->db->query($sql)->result();
	}
	function get_all()
	{
			$this->db->select($this->table.'.*,'.$this->district->table.'.DISTRICT_NAME,'.$this->province->table.'.PROVINCE_NAME,'.$this->amphur->table.'.AMPHUR_NAME');
			$this->db->from($this->table);
			$this->db->join($this->district->table,$this->table.".DISTRICT_ID=".$this->district->table.".ID");
			$this->db->join($this->amphur->table,$this->district->table.".AMPHUR_ID=".$this->amphur->table.".ID");
			$this->db->join($this->province->table,$this->district->table.".PROVINCE_ID=".$this->province->table.".ID");
			$this->db->where_in($this->district->table.'.PROVINCE_ID', $this->province->set_province_id);
			$this->db->not_like('district.DISTRICT_NAME','*');
			return $this->db->get()->result();
	}
	function post($data)
	{
		return $this->db->insert($this->table,$data);
	}
	
}

/* End of file template.php */
/* Location: ./application/models/district.php */
