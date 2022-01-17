<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('m_login_admin');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){
      redirect('dashboard_admin');
    } else {
       $this->load->view('v_login_admin');
    }
  }

  public function forgot_password()
  {
    //parameter
    $email = $this->uri->segment(3);

    echo 'Saya lupa password, email saya : '. $email;
  }

  public function act_login()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

      if($this->form_validation->run() == TRUE) {
      if($this->m_login_admin->login_check() == TRUE)
      {
        redirect('Dashboard_admin');
      } else {
        $this->session->set_flashdata('pesan', 'Password dan Username Tidak Benar!');
        redirect('Login_admin');
             }
      } else {
        $this->session->set_flashdata('pesan', validation_errors());
        redirect('Login_admin');
           }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login_admin');
  }
}
