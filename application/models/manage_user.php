<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_user extends CI_Model 
{
	var $table='system_users';
	var $desc='ผู้ใช้งานระบบ';
	function __construct()
	{
		parent::__construct();
			
	}
	function get_by_id($id)
	{
		$this->db->select('*');
        $this->db->join('user_role',$this->table.'.user_role_id = user_role.id');
        $this->db->join('user_meta',$this->table.'.id = user_meta.user_id');
		$this->db->where('system_users.id',$id);
        return $this->db->get($this->table)->row();
	}
	function get_all()
	{
		$this->db->select('*');
        $this->db->join('user_role',$this->table.'.user_role_id = user_role.id');
        $this->db->join('user_meta',$this->table.'.id = user_meta.user_id');
        return $this->db->get($this->table)->result();
	}
	function get_current_user()
	{
		return $this->ezrbac->getCurrentUser();
	}
	function get_user_meta()
	{
		$userinfo=$this->ezrbac->getUserMeta($this->ezrbac->getCurrentUserID());
		return $userinfo;
	}
	function post($data)
	{
		try{
						$user=$data;
						$user['meta']=array('first_name'=>$user['first_name'],'last_name'=>$user['last_name'],'phone'=>$user['phone']);
						$user['verification_status']=1;
						unset($user['first_name']);
						unset($user['last_name']);
						unset($user['phone']);
						//exit(print_r($user));
					return	$this->ezrbac->createUser($user);
		}
		catch(Exception $e){
			//show_error($e->getMessage());
			return FALSE;
		}
		

	}
	function put($data,$id)
	{

						$user=$data;
						$user['meta']=array('first_name'=>$user['first_name'],'last_name'=>$user['last_name'],'phone'=>$user['phone']);
						$user['id']=$id;
						//$user['user_role']=$user['user_role_id'];
						unset($user['email']);
						unset($user['password']);
						unset($user['first_name']);
						unset($user['last_name']);
						unset($user['phone']);
					//	unset($user['user_role_id']);
						
						//exit(print_r($user));
					return	$this->ezrbac->updateUser($user);

	}
	function delete($id)
	{	
		$this->db->where('ID',$id);
		return $this->db->delete($this->table);
	}
	function get_role_all()
	{
		return $this->db->get('user_role')->result();
	}
}

/* End of file template.php */
/* Location: ./application/models/potentiality.php */
