<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {
  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){
        $data['main_view'] = 'v_dashboard_admin'; //content_view harus konsisten di function2 laen

        $this->load->view('v_template_admin', $data);
    } else {
      redirect('Login_admin');
    }
  }

  public function logout()
    {  
        $this->session->sess_destroy();
        redirect('Login_admin');   
    }
}
