<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_tasking extends CI_Model 
{
	var $table='project_tasking';
	var $desc='กิจกรรมและแผนการดำเนินงานของโครงการ';
	function __construct()
	{
		parent::__construct();
		//$this->load->model('project');
			
	}
	function get_by_project_id($id)
	{
		$this->db->where('PROJECT_PLANING_ID', $id);
		return $this->db->get($this->table)->result();
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
		$data['USER_ID']=$this->ezrbac->getCurrentUser()->id;
		return $this->db->insert($this->table,$data);
	}
	function put($data,$id)
	{
		$data['USER_ID']=$this->ezrbac->getCurrentUser()->id;
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
