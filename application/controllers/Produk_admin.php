<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_admin extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_produk_admin');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){

    $data['main_view']="v_produk_admin";

    $data['produk']= $this->m_produk_admin->get_produk();
    $data['jenis']= $this->m_produk_admin->get_jenis();

    $this->load->model('m_produk_admin');
    $data['arr']=$this->m_produk_admin->get_produk();
      $this->load->view('v_template_admin', $data, FALSE);
  } else {
    redirect('Login_admin');
  }
}

  public function json_produk_by_id(){
    if($this->session->userdata('login_status') == TRUE){
      $id_produk = $this->uri->segment(3);

      $data = $this->m_produk_admin->get_data_produk_by_id($id_produk);
      echo json_encode($data);
    } else {
      redirect('Login_admin');
    }
  }

  public function add_produk()
  {
    if($this->session->userdata('login_status') == TRUE){
    $this->form_validation->set_rules('foto', 'Foto', 'trim|required',
    array('required' => 'Foto harus mengupload'));
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required',
    array('required' => 'Nama Produk harus diisi'));
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required',
    array('required' => 'Deskripsi harus diisi'));
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required',
    array('required' => 'Harga harus diisi'));
    $this->form_validation->set_rules('size', 'Size', 'trim|required',
    array('required' => 'Size harus diisi'));
    $this->form_validation->set_rules('stok', 'Stok', 'trim|required',
    array('required' => 'Stok harus diisi'));
    $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required',
    array('required' => 'Jenis harus diisi'));

    //upload file
    // if ($this->form_validation->run() == TRUE) {
      //upload file
      $config['upload_path'] = './assets-admin/foto/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '2000000';
      $this->load->library('upload', $config);
      
      if($this->upload->do_upload('foto')){
        if($this->m_produk_admin->add_produk($this->upload->data()) == TRUE)
        {
          $this->session->set_flashdata('pesan', 'Tambah produk berhasil');
          redirect('Produk_admin');
        } else {
          $this->session->set_flashdata('pesan', 'Tambah produk gagal');
          redirect('Produk_admin');
        }
      } else {
        $this->session->set_flashdata('pesan', 'Tambah produk gagal upload');
        redirect('Produk_admin');
      }
    // } else {
    //   $this->session->set_flashdata('notif', validation_errors());
    //   redirect('Produk_admin');
    // }
  } else {
    redirect('Login_admin');
  }
}

  public function update_produk()
  {
    if($this->session->userdata('login_status') == TRUE){
      // $this->form_validation->set_rules('foto_edit', 'Foto');
      $this->form_validation->set_rules('nama_produk_edit', 'Nama Produk', 'trim|required');
      $this->form_validation->set_rules('deskripsi_edit', 'Deskripsi', 'trim|required');
      $this->form_validation->set_rules('harga_edit', 'Harga', 'trim|required');
      $this->form_validation->set_rules('size_edit', 'Size', 'trim|required');
      $this->form_validation->set_rules('stok_edit', 'Stok', 'trim|required');
      $this->form_validation->set_rules('jenis_edit', 'Jenis', 'trim|required');

      // if($this->form_validation->run() == TRUE)
      // {
        if($this->m_produk_admin->update_produk() == TRUE) {
          $this->session->set_flashdata('pesan', 'Ubah Produk berhasil! :)');
          redirect('Produk_admin');
        } else {
          $this->session->set_flashdata('pesan', 'Ubah Talent gagal! :(');
          redirect('Produk_admin');
        }
      // } else {
      //   $this->session->set_flashdata('pesan', validation_errors());
      //   redirect('Produk_admin');
      // }
    } else {
      redirect('Login_admin');
    }
  }

  public function delete_produk()
  {
    if($this->session->userdata('login_status') == TRUE){
      $id_produk = $this->uri->segment(3);

      if($this->m_produk_admin->hapus_produk($id_produk)){
        $this->session->set_flashdata('pesan', 'Hapus produk berhasil! :)');
        redirect('Produk_admin');
      } else {
        $this->session->set_flashdata('pesan', 'Hapus produk gagal! :(');
        redirect('Produk_admin');
      }
    } else {
      redirect('Login_admin');
    }
  }

}
