<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('init_basic');
		$this->load->model('require_develop');
		$this->template->add_css($this->load->view('guest/css/intro-contents.css',null,TRUE),'embed',TRUE);
		$this->template->write_view('menu','guest/menu');
		$this->template->write('band_name','<img class="img-responsive" src="'.base_url('images/logo.png').'">',TRUE);
		
	}

	public function index()
	{
		
		$data['silde_intro']=$this->load->view('guest/slide-intro',null,TRUE);
		//$data['contents']=$this->load->view('guest/sumary',null,TRUE);
		//$data['contact']=$this->load->view('guest/contact',null,TRUE);
		//$data['frm_login']=$this->load->view('guest/form_login',null,TRUE);
		$this->template->write_view('content','guest/content',$data);
		$this->template->render();
	}
	function province_details($province_id=null)
	{
		$this->load_jquery_dtable();
		$data['title']=$this->require_develop->desc;
		$data['province_id']=$province_id;
		$data['project_list']=$this->require_develop->get_by_province($province_id);
		$data['contents']=$this->load->view('guest/require_dev_list',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);
		$this->template->render();
	}
	function potential_details($potentail_id=null)
	{
		if(empty($potentail_id)) show_404();	
		$this->load_jquery_dtable();
		$data['title']=$this->require_develop->desc.'<i class="fa fa-fw fa-angle-double-right"></i>ตามกลุ่มภารกิจงาน';
		$data['potentail_id']=$potentail_id;
		$data['Potential_require_dev']=$this->require_potential_list->get_by_potentiality($potentail_id);
		$data['contents']=$this->load->view('guest/potential_require_dev_list',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);
		
		$this->template->render();
	}
	function view($id=null)
	{
		if(empty($id)) show_404();
		$data['Project']=$this->require_develop->get_by_id($id);
		$data['PROJECT_ID']=$id;
		$data['Potential_list']=$this->require_potential_list->get_by_require_develop_id($id);
		$data['title']=$this->require_develop->desc.'<i class="fa fa-fw fa-angle-double-right"></i>'.'จังหวัด'.$this->province->get_by_id($data['Project']->PROVINCE_ID)->PROVINCE_NAME.'<i class="fa fa-fw fa-angle-double-right"></i>รายละเอียด';
		$data['contents']=$this->load->view('guest/require_dev_details',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);
		
		
		$this->template->render();
		
	}
  function load_jquery_dtable()
	{
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->add_js($this->load->view('guest/js/datables.js',null,TRUE),'embed',TRUE);
	}
}

/* End of file guest.php */
/* Location: ./application/controllers/guest.php */