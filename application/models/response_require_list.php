<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Response_require_list extends CI_Model 
{
	var $table='response_require_list';
	var $desc='ความครอบคลุมในระดับครัวเรือน';
	function __construct()
	{
		parent::__construct();
			
	}

   function post($array_village,$project_planning_id,$household_year='')
   {
      
      $this->require_household->year=$household_year;
       // remove all 
       $this->remove_by_project_planning_id($project_planning_id);

        $require_household_id='';
        $require_household=$this->require_household->get_by_village_id($array_village);
        $require_household_id=implode(',',$require_household);
        $data=array('REQUIRE_HOUSEHOLD_ID'=>$require_household_id,'PROJECT_PLANING_ID'=>$project_planning_id,'REQUIRE_HOUSEHOLD_YEAR'=>$household_year);

       // insert new
        $this->db->insert($this->table,$data);

    return TRUE;

   }
   function get_year_by_project_planning_id($project_planning_id)
   {
      //$this->load->model('require_household');
      $household_year=null;
      $this->db->select('REQUIRE_HOUSEHOLD_YEAR');
      $this->db->where('PROJECT_PLANING_ID',$project_planning_id);
      $result=$this->db->get($this->table)->row();
      if(!empty($result))
        $household_year=$result->REQUIRE_HOUSEHOLD_YEAR;       
      return $household_year;
   }
   function get_household_response($project_planning_id)
   {
       $array_household=array();
       $this->db->where('PROJECT_PLANING_ID',$project_planning_id);
       $result=$this->db->get($this->table)->row();
       if(!empty($result))
       {
         $array_household=explode(',',$result->REQUIRE_HOUSEHOLD_ID);
         return $array_household;
       }
       else return $array_household;

   }
   function get_village_response($project_planning_id)
   {
       $this->load->model('require_household');
     $array_household=$this->get_household_response($project_planning_id);
     if(!empty($array_household))
        return $this->require_household->get_village_by_id($array_household);
      else return array();
    // return $project_planning_id;
   // return $array_household;


   }

   function remove_by_project_planning_id($project_planning_id)
   {
     $this->db->where('PROJECT_PLANING_ID',$project_planning_id);
     $this->db->delete($this->table);
     
   }

}