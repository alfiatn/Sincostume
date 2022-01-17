<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_jenis');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){

    $data['main_view']="v_jenis";

    $data['jenis']= $this->m_jenis->get_jenis();

    $this->load->model('m_jenis');
    $data['arr']=$this->m_jenis->get_jenis();
      $this->load->view('v_template_admin', $data, FALSE);
  } else {
    redirect('Login_admin');
  }
}

  public function json_jenis_by_id(){
    if($this->session->userdata('login_status') == TRUE){
      $id_jenis = $this->uri->segment(3);

      $data = $this->m_jenis->get_data_jenis_by_id($id_jenis);
      echo json_encode($data);
    } else {
      redirect('Login_admin');
    }
  }

  public function add_jenis()
  {
    $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'trim|required',
    array('required' => 'Username harus diisi'));
    
    //upload file
    if($this->form_validation->run() == TRUE)
    {
      $this->load->model('m_jenis', 'bar');
      $masuk=$this->bar->add_jenis();
      if($masuk==true) {
        $this->session->set_flashdata('pesan', 'Tambah jenis berhasil! :)');
      } else {
        $this->session->set_flashdata('pesan', 'Tambah jenis gagal! :(');
      }
      redirect(base_url('Jenis'), 'refresh');
    }
    else {
      $this->session->set_flashdata('pesan', validation_errors());
      redirect(base_url('Jenis'), 'refresh');
    }
}

  public function update_jenis()
  {
    if($this->session->userdata('login_status') == TRUE){
      // $this->form_validation->set_rules('foto_edit', 'Foto');
      $this->form_validation->set_rules('nama_jenis_edit', '  Nama Jenis', 'trim|required');

      if($this->form_validation->run() == TRUE)
      {
        if($this->m_jenis->update_jenis() == TRUE) {
          $this->session->set_flashdata('pesan', 'Ubah jenis berhasil! :)');
          redirect('Jenis');
        } else {
          $this->session->set_flashdata('pesan', 'Ubah jenis gagal! :(');
          redirect('Jenis');
        }
      } else {
        $this->session->set_flashdata('pesan', validation_errors());
        redirect('Jenis');
      }
    } else {
      redirect('Login_admin');
    }
  }

  public function delete_jenis()
  {
    if($this->session->userdata('login_status') == TRUE){
      $id_jenis = $this->uri->segment(3);

      if($this->m_jenis->hapus_jenis($id_jenis)){
        $this->session->set_flashdata('pesan', 'Hapus jenis berhasil! :)');
        redirect('Jenis');
      } else {
        $this->session->set_flashdata('pesan', 'Hapus jenis gagal! :(');
        redirect('Jenis');
      }
    } else {
      redirect('Login_admin');
    }
  }

}
