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
}

/* End of file template.php */
/* Location: ./application/models/potentiality.php */
