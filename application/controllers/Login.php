<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
    public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')==true) {
            redirect('dashboard/index');
        } else {
            $this->load->view('view/login');
        }
    }

    public function register()
    {
        
            $this->load->view('view/register');
       
    }

     public function cek_login()
    {
        if ($this->session->userdata('logged_in')==false) {
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');

            if ($this->form_validation->run()== true) {
            if ($this->m_login->cek_user()== true) {
                    redirect('peminjaman/index');
                } else {
                  $this->session->flashdata('notif', 'Login gagal');
                  redirect('login/index');
                }
                
            } else {
               $this->session->set_flashdata('notif', validation_errors());
               redirect('login/index');
            }
            
        } else {
           redirect('dashboard/index');
        } 
    }

    public function tambah()
	{
		// if($this->session->userdata('logged_in') == false){
            // $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim|required');
			$this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
            $this->form_validation->set_rules('username', 'usernama', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('telp', 'telp', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');

			// if ($this->form_validation->run() == TRUE) {
					if($this->m_login->tambah() == TRUE)
					{
						$this->session->set_flashdata('notif', 'Tambah pelanggan berhasil');
						redirect('login/index');
					} else {
						$this->session->set_flashdata('notif', 'Tambah pelanggan gagal');
						redirect('login/index');
					}
			// } else {
			// 	$this->session->set_flashdata('notif', validation_errors());
			// 	redirect('login/index');
			// }
		// } else {
		// 	redirect('login_user/index');
		// }
	}

    public function logout()
    {  
        $this->session->sess_destroy();
        redirect('dashboard');   
    }
}
