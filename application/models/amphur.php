<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Amphur extends CI_Model 
{
	var $table='amphur';
	var $desc='อำเภอ';
	function __construct()
	{
		parent::__construct();
		
			
	}
	function get_by_id($id)
	{
		$this->db->where('ID', $id);
		return $this->db->get($this->table)->row();
	}
	function get_all()
	{
			$this->db->select($this->table.'.*,'.$this->province->table.'.PROVINCE_NAME');
			$this->db->from($this->table);
			$this->db->join($this->province->table,$this->table.".PROVINCE_ID=".$this->province->table.".ID");
			$this->db->where_in('PROVINCE_ID', $this->province->set_province_id);
			$this->db->not_like('AMPHUR_NAME','*');
			return $this->db->get()->result();
	}
	function get_by_province($id)
	{
		$this->db->where('PROVINCE_ID',$id);
		$this->db->not_like('AMPHUR_NAME','*');
		return $this->db->get($this->table)->result();
	}
}

/* End of file template.php */
/* Location: ./application/models/amphur.php */
