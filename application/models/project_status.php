<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_status extends CI_Model 
{
	var $table='project_status';
	var $desc='สถานะของโครงการ';
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
	function get_all_customize()
	{
		$this->db->where_not_in('ID',array(1,2,3,4,5,6,7,8));
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
