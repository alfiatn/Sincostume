<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk_user');
		$this->load->library('form_validation');
	
	}

	public function index()
   {
    $data['konten']="view/costume";
    $data['kostum']= $this->m_produk_user->get_produk();

    $this->load->model('m_produk_user');
    $data['arr']=$this->m_produk_user->get_produk();
      $this->load->view('view/index', $data, FALSE);
	}

  public function costume_detail()
  {
    $data['konten']="view/costume_detail";
    //GET : Detail data
		$id = $this->input->get('idtf');
		$data['row'] = $this->m_produk_user->getDetail($id);
	
    $this->load->view('view/index', $data);
  

  }

	public function studio()
    {
     $data['konten']="view/studio";

     $data['studio']= $this->m_produk_user->get_produk_studio();

     $this->load->model('m_produk_user');
     $data['arr']=$this->m_produk_user->get_produk_studio();
       $this->load->view('view/index', $data, FALSE);
   }
   
   public function studio_detail()
   {
     $data['konten']="view/studio_detail";
     //GET : Detail data
     $id = $this->input->get('idtf');
     $data['row'] = $this->m_produk_user->getDetailStudio($id);
   
     $this->load->view('view/index', $data);
   
 
   }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */