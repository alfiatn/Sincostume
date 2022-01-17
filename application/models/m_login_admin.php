<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login_admin extends CI_Model {

  public function login_check()
  {
    $username = $this->input->post('username'); //post = dari inputan user
    $password = $this->input->post('password');

    $query = $this->db->join('level', 'level.id_level = admin.id_level')
                      ->where('username', $username)
                      ->where('password', md5($password))
                      ->get('admin');

    if($query->num_rows() > 0)
    {
      $data_login = $query->row();
      $session = array(
                        'username'     => $data_login->username,
                        'password'     => $data_login->password,
                        'login_status' => TRUE,
                        'nama_level'	    => $data_login->nama_level
                      );

      $this->session->set_userdata($session);

      return true;

    } else {

        return false;

           }
  }

                                    }
