<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Response_require_list extends CI_Model 
{
	var $table='response_require_list';
	var $desc='ความครอบคลุมในระดับครัวเรือน';
	function __construct()
	{
		parent::__construct();
			
	}

   function post($array_village,$project_planning_id)
   {

       // remove all 
       $this->remove_by_project_planning_id($project_planning_id);

        $require_household_id='';
        $require_household=$this->require_household->get_by_village_id($array_village);
        $require_household_id=implode(',',$require_household);
        $data=array('REQUIRE_HOUSEHOLD_ID'=>$require_household_id,'PROJECT_PLANING_ID'=>$project_planning_id);
       // insert new
        $this->db->insert($this->table,$data);

    return TRUE;

   }

   function remove_by_project_planning_id($project_planning_id)
   {
     $this->db->where('PROJECT_PLANING_ID',$project_planning_id);
     $this->db->delete($this->table);
     
   }

}