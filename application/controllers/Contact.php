<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	
	}

	public function index()
	{
		
			$data['konten']="view/contact";
			$this->load->view('view/index',$data);
		
	}

}