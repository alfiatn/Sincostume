<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	
	}

	public function index()
	{
		
			$data['konten']="view/dashboard";
			$this->load->view('view/index',$data);
		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */