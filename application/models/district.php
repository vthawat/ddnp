<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class District extends CI_Model 
{
	var $table='district';
	var $desc='ตำบล';
	function __construct()
	{
		parent::__construct();
		
			
	}
	function get_by_id($id)
	{
		$this->db->where('ID', $id);
		return $this->db->get($this->table)->row();
	}
	function get_by_amphur_id($amphur_id)
	{
		$this->db->where('AMPHUR_ID',$amphur_id);
		$this->db->not_like('DISTRICT_NAME','*');
		return $this->db->get($this->table)->result();
	}
	function get_all()
	{
			$this->db->select($this->table.'.*,'.$this->province->table.'.PROVINCE_NAME,'.$this->amphur->table.'.AMPHUR_NAME');
			$this->db->from($this->table);
			$this->db->join($this->amphur->table,$this->table.".AMPHUR_ID=".$this->amphur->table.".ID");
			$this->db->join($this->province->table,$this->table.".PROVINCE_ID=".$this->province->table.".ID");
			$this->db->where_in($this->table.'.PROVINCE_ID', $this->province->set_province_id);
			$this->db->not_like('district.DISTRICT_NAME','*');
			return $this->db->get()->result();
	}	
}

/* End of file template.php */
/* Location: ./application/models/district.php */
