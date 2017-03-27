<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_user extends CI_Model 
{
	var $table='system_users';
	var $desc='ผู้ใช้งานระบบ';
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
		$this->db->select('*');
        $this->db->join('user_role',$this->table.'.id = user_role.id');
        $this->db->join('user_meta',$this->table.'.id = user_meta.user_id');
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
}

/* End of file template.php */
/* Location: ./application/models/potentiality.php */
