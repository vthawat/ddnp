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
						if(empty($user['village_id'])) $user['village_id']=NULL;
						$user['meta']=array('first_name'=>$user['first_name'],
											'last_name'=>$user['last_name'],
											'phone'=>$user['phone'],
											'village_id'=>$user['village_id']
						);
						$user['verification_status']=1;
						unset($user['first_name']);
						unset($user['last_name']);
						unset($user['phone']);
						unset($user['village_id']);
						//exit(print_r($user));
					return	$this->ezrbac->createUser($user);
		}
		catch(Exception $e){
			//show_error($e->getMessage());
			return FALSE;
		}
		

	}
	function put($data,$user_id)
	{

						$user=$data;
						if(empty($user['village_id'])) $user['village_id']=NULL;
						$user['meta']=array('first_name'=>$user['first_name'],'last_name'=>$user['last_name'],'phone'=>$user['phone'],'village_id'=>$user['village_id']);			
						$user['system']=array('email'=>$user['email'],'user_role_id'=>$user['user_role_id'],'status'=>$user['status']);
						
						if(!empty($user['password']))
							$this->update_password($user['password'],$user_id);	
						
						if($this->update_user_meta($user['meta'],$user_id))
							//exit(print_r($user['meta']));
							//exit(print $this->db->last_query());
							return $this->update_system_users($user['system'],$user_id);
						else return FALSE;

					//	unset($user['user_role_id']);
						
						//exit(print_r($user['system']));
					//return	$this->ezrbac->updateUser($user);

	}
	function update_password($password,$user_id)
	{
		//$this->load->library('encrypt');
		$data['salt'] = $this->generateSalt();
    	$data['password'] = $this->encrypt->sha1($password.$data['salt']);
		$this->db->where('id',$user_id);
		$this->db->update($this->table,$data);
		return TRUE;
		//exit(print $this->db->last_query());

	}
 	protected function generateSalt()
    {
        return uniqid('',true);
    }
	function generate_password($salt) {
        return substr($salt,rand(1,5),6);
    }
	function update_system_users($data,$user_id)
	{
		$this->db->where('id',$user_id);
		return $this->db->update($this->table,$data);
		//exit(print $this->db->last_query());
	}
	function update_user_meta($data,$user_id)
	{
		$this->db->where('user_id',$user_id);
		return $this->db->update('user_meta',$data);
		//exit(print $this->db->last_query());

	}	
	function delete($user_id)
	{	
		$this->db->where('id',$user_id);
		if($this->db->delete($this->table))
		{
			$this->db->where('user_id',$user_id);
			return $this->db->delete('user_meta');
		}
		else return FALSE;
	}
	function get_role_all()
	{
		return $this->db->get('user_role')->result();
	}
}

/* End of file template.php */
/* Location: ./application/models/potentiality.php */
