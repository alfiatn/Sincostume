<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {

    public function cek_user()
    {
        $u = $this->input->post('username');
        $p = $this->input->post('password');
        
        $query = $this->db->where('username', $u)
                          ->where('password', md5($p))
                          ->get('pelanggan');
        if ($this->db->affected_rows() > 0) {
            $data_login = $query->row();
            $data_session = array(
                                    
                                    'username' => $data_login->username,
                                    'password' => $data_login->password,
                                    'logged_in' => TRUE,
                                    'id_level'     => $data_login->id_level
                                 );
            $this->session->set_userdata($data_session);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function tambah(){
        $data = array(
            // 'id_pelanggan'  => $this->input->post('id_pelanggan'),
            'nama_pelanggan'          => $this->input->post('nama_pelanggan'),
            'username'                => $this->input->post('username'),
            'email'                   => $this->input->post('email'),
            'telp'                    => $this->input->post('telp'),
            'password'                => md5($this->input->post('password'))
        );
        $this->db->insert('pelanggan', $data);
    
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }    
    }
}

/* End of file Login_model.php */

