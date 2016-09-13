<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Require_potential_list extends CI_Model 

{
	var $table='require_potential_list';
	var $desc='รายการภารกิจ';
	function __construct()
	{
		parent::__construct();
			
	}
	function get_by_require_develop_id($require_develop_id=null)
	{
		$this->db->where('REQUIRE_DEVELOP_ID',$require_develop_id);
		return $this->db->get($this->table)->result();
	}
	function get_by_potentiality($potentiality_id)
	{

		$this->db->where('POTENTIALITY_ID',$potentiality_id);
		$this->db->from($this->table);
		return $this->db->get()->result();
	}
	function get_one($require_develop_id=null,$potentiality_id)
	{
	  if($require_develop_id!=null)	
	  {	
		$this->db->where('REQUIRE_DEVELOP_ID',$require_develop_id);
		$this->db->where('POTENTIALITY_ID',$potentiality_id);
		return $this->db->get($this->table)->row();
	  }
	  else return null;
		//exit(print $this->db->last_query());
	}
	function post($data)
	{
		$done=$this->db->insert($this->table,$data);
		return $done;
	}
	function delete_all_require_develop_id($require_develop_id)
	{
		$this->db->where('REQUIRE_DEVELOP_ID',$require_develop_id);
		$this->db->delete($this->table);
	}
	function count_by_id($potentiality_id)
	{

		$this->db->where('POTENTIALITY_ID',$potentiality_id);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
	