<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_pelanggan');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){

    $data['main_view']="v_pelanggan";

    $data['pelanggan']= $this->m_pelanggan->get_pelanggan();

    $this->load->model('m_pelanggan');
    $data['arr']=$this->m_pelanggan->get_pelanggan();
      $this->load->view('v_template_admin', $data, FALSE);
  } else {
    redirect('Login_admin');
  }
}

  public function json_pelanggan_by_id(){
    if($this->session->userdata('login_status') == TRUE){
      $id_pelanggan = $this->uri->segment(3);

      $data = $this->m_pelanggan->get_data_pelanggan_by_id($id_pelanggan);
      echo json_encode($data);
    } else {
      redirect('Login_admin');
    }
  }

  public function add_pelanggan()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required',
    array('required' => 'Username harus diisi'));
    $this->form_validation->set_rules('password', 'Password', 'trim|required',
    array('required' => 'Password harus diisi'));
    $this->form_validation->set_rules('nama_pelanggan', 'Nama pelanggan', 'trim|required',
    array('required' => 'Nama pelanggan harus diisi'));
    $this->form_validation->set_rules('email', 'Email', 'trim|required',
    array('required' => 'Email pelanggan harus diisi'));
    $this->form_validation->set_rules('telp', 'telp', 'trim|required',
    array('required' => 'Telp pelanggan harus diisi'));
  

    //upload file
    if($this->form_validation->run() == TRUE)
    {
      $this->load->model('m_pelanggan', 'bar');
      $masuk=$this->bar->add_pelanggan();
      if($masuk==true) {
        $this->session->set_flashdata('pesan', 'Tambah pelanggan berhasil! :)');
      } else {
        $this->session->set_flashdata('pesan', 'Tambah pelanggan gagal! :(');
      }
      redirect('pelanggan');
    }
    else {
      $this->session->set_flashdata('pesan', validation_errors());
      redirect('pelanggan');
    }
}

  public function update_pelanggan()
  {
    if($this->session->userdata('login_status') == TRUE){
      // $this->form_validation->set_rules('foto_edit', 'Foto');
      $this->form_validation->set_rules('username_edit', 'Username', 'trim|required');
      // $this->form_validation->set_rules('password_edit', 'Password', 'trim|required');
      $this->form_validation->set_rules('nama_pelanggan_edit', 'Nama pelanggan', 'trim|required');
      $this->form_validation->set_rules('email_edit', 'Email', 'trim|required');
      $this->form_validation->set_rules('telp_edit', 'Telp', 'trim|required');

      if($this->form_validation->run() == TRUE)
      {
        if($this->m_pelanggan->update_pelanggan() == TRUE) {
          $this->session->set_flashdata('pesan', 'Ubah pelanggan berhasil! :)');
          redirect('pelanggan');
        } else {
          $this->session->set_flashdata('pesan', 'Ubah pelanggan gagal! :(');
          redirect('pelanggan');
        }
      } else {
        $this->session->set_flashdata('pesan', validation_errors());
        redirect('pelanggan');
      }
    } else {
      redirect('Login_pelanggan');
    }
  }

  public function delete_pelanggan()
  {
    if($this->session->userdata('login_status') == TRUE){
      $id_pelanggan = $this->uri->segment(3);

      if($this->m_pelanggan->hapus_pelanggan($id_pelanggan)){
        $this->session->set_flashdata('pesan', 'Hapus pelanggan berhasil! :)');
        redirect('pelanggan');
      } else {
        $this->session->set_flashdata('pesan', 'Hapus pelanggan gagal! :(');
        redirect('pelanggan');
      }
    } else {
      redirect('Login_admin');
    }
  }

}
