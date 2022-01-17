<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){

    $data['main_view']="v_admin";

    $data['admin']= $this->m_admin->get_admin();
    $data['level']= $this->m_admin->get_level();

    $this->load->model('m_admin');
    $data['arr']=$this->m_admin->get_admin();
      $this->load->view('v_template_admin', $data, FALSE);
  } else {
    redirect('Login_admin');
  }
}

  public function json_admin_by_id(){
    if($this->session->userdata('login_status') == TRUE){
      $id_admin = $this->uri->segment(3);

      $data = $this->m_admin->get_data_admin_by_id($id_admin);
      echo json_encode($data);
    } else {
      redirect('Login_admin');
    }
  }

  public function add_admin()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required',
    array('required' => 'Username harus diisi'));
    $this->form_validation->set_rules('password', 'Password', 'trim|required',
    array('required' => 'Password harus diisi'));
    $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'trim|required',
    array('required' => 'Nama Admin harus diisi'));
    $this->form_validation->set_rules('level', 'Level', 'trim|required',
    array('required' => 'Level harus diisi'));

    //upload file
    if($this->form_validation->run() == TRUE)
    {
      $this->load->model('m_admin', 'bar');
      $masuk=$this->bar->add_admin();
      if($masuk==true) {
        $this->session->set_flashdata('pesan', 'Tambah Admin berhasil! :)');
      } else {
        $this->session->set_flashdata('pesan', 'Tambah Admin gagal! :(');
      }
      redirect('admin');
    }
    else {
      $this->session->set_flashdata('pesan', validation_errors());
      redirect('admin');
    }
}

  public function update_admin()
  {
    if($this->session->userdata('login_status') == TRUE){
      // $this->form_validation->set_rules('foto_edit', 'Foto');
      $this->form_validation->set_rules('username_edit', 'Username', 'trim|required');
      // $this->form_validation->set_rules('password_edit', 'Password', 'trim|required');
      $this->form_validation->set_rules('nama_admin_edit', 'Nama Admin', 'trim|required');
      $this->form_validation->set_rules('level_edit', 'Level', 'trim|required');

      if($this->form_validation->run() == TRUE)
      {
        if($this->m_admin->update_admin() == TRUE) {
          $this->session->set_flashdata('pesan', 'Ubah Admin berhasil! :)');
          redirect('Admin');
        } else {
          $this->session->set_flashdata('pesan', 'Ubah Admin gagal! :(');
          redirect('Admin');
        }
      } else {
        $this->session->set_flashdata('pesan', validation_errors());
        redirect('Admin');
      }
    } else {
      redirect('Login_admin');
    }
  }

  public function delete_admin()
  {
    if($this->session->userdata('login_status') == TRUE){
      $id_admin = $this->uri->segment(3);

      if($this->m_admin->hapus_admin($id_admin)){
        $this->session->set_flashdata('pesan', 'Hapus admin berhasil! :)');
        redirect('Admin');
      } else {
        $this->session->set_flashdata('pesan', 'Hapus admin gagal! :(');
        redirect('Admin');
      }
    } else {
      redirect('Login_admin');
    }
  }

}
