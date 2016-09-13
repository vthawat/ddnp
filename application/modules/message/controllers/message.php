<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Message extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		//$this->template->set_template('admin');
	}
    function alert($type='info',$icon='fa-comments-o',$title='ข้อความจากระบบ',$details='message') {
	  $data['message']=array('type'=>$type,
	  						'icon'=>$icon,
							'title'=>$title,
							'details'=>$details);
	 return $this->load->view('message',$data,TRUE);
    }
	function error($number)
	{
		$data['error_number']=$number;
		return $this->load->view('error',$data,TRUE);
	}

}