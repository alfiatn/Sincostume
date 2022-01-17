<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
		if($this->session->userdata('login_status') == false){
			redirect('login');
		}
	}


	public function kostum()
	{
		$data['main_view']="v_laporan_kostum";
		$this->load->model('m_laporan');
        $data['datakos'] = $this->m_laporan->getListkostum();
		$this->load->view('v_template_admin', $data, FALSE);
		
    }
    
    public function studio()
	{
		$data['main_view']="v_laporan_studio";
		$this->load->model('m_laporan');
        $data['datastu'] = $this->m_laporan->getListstudio();
		$this->load->view('v_template_admin', $data, FALSE);
		
	}

	public function delete()
  	{
    if($this->session->userdata('login_status') == TRUE){
      $id_pinjam = $this->uri->segment(3);

      if($this->m_laporan->hapus($id_pinjam)){
        $this->session->set_flashdata('pesan', 'Hapus admin berhasil! :)');
        redirect('Pemijaman');
      } else {
        $this->session->set_flashdata('pesan', 'Hapus admin gagal! :(');
        redirect('Peminjaman');
      }
    } else {
      redirect('Login_admin');
    }
  }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */