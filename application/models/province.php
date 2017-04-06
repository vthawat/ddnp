<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Province extends CI_Model 
{
	var $set_province_id=array();
	var $table='province';
	var $desc='จังหวัด';
	var $geo_id=6; // เลือกจังหวัดในภาคใต้
	function __construct()
	{
		parent::__construct();
		$this->load->model('project_scope');
		$this->set_province_id=$this->project_scope->load_scope();
			
	}
	function get_all($scope=true)
		{
			if($scope)$this->db->where_in('ID', $this->set_province_id);
			$this->db->where('GEO_ID',$this->geo_id);
			return $this->db->get($this->table)->result();
		}
	function get_by_id($id)
	{
		$this->db->where('ID', $id);
		return $this->db->get($this->table)->row();
	}
	function find_info_by_village($vill_id)
	{
		$sql="SELECT
			district.PROVINCE_ID,
			village.ID,
			village.DISTRICT_ID,
			village.VILLAGE_NAME,
			district.AMPHUR_ID,
			amphur.AMPHUR_NAME,
			district.DISTRICT_NAME
			FROM
			village
			INNER JOIN district ON village.DISTRICT_ID = district.ID
			INNER JOIN amphur ON district.AMPHUR_ID = amphur.ID
			WHERE
			village.ID = '$vill_id'";
		$result=$this->db->query($sql);
		return $result->row();
	}
	
}

/* End of file template.php */
/* Location: ./application/models/province.php */
