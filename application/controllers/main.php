<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->model('init_basic');
		
	}
    function index()
    {
        switch($this->manage_user->get_current_user()->user_role_id)
        {
            case 2:  // level หัวหน้าชุมชน
                 redirect(base_url('household'));
            break;
            case 3:  // level เจ้าหน้าที่กระทรวง
                 redirect(base_url('planning'));
            break;

           default;
           redirect(base_url('basic/manage_user'));
        }
    }

}