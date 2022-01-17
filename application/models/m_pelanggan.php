<?php
class m_pelanggan extends CI_model {

  public function get_pelanggan()
  {
    $arr=$this->db ->get('pelanggan')
                  ->result();
    return $arr;
  }

  public function get_data_pelanggan_by_id($id_pelanggan)
  {
    return $this->db->where('id_pelanggan', $id_pelanggan)
                    ->get('pelanggan')
                    ->row();
  }

  public function add_pelanggan()
  {
    $arr['username'] = $this->input->post('username');
    $arr['password'] = md5($this->input->post('password'));
    $arr['nama_pelanggan'] = $this->input->post('nama_pelanggan');
    $arr['email'] = $this->input->post('email');
    $arr['telp'] = $this->input->post('telp');
    $ql_masuk=$this->db->insert('pelanggan', $arr);
    return $ql_masuk;
  }

  public function update_pelanggan()
  {
    $pelanggan = array(
      //nge array id_pelanggan
      'username'      => $this->input->post('username_edit'),
      'password'      => md5($this->input->post('password_edit')),
      'nama_pelanggan'    => $this->input->post('nama_pelanggan_edit'),
      'email'    => $this->input->post('email_edit'),
      'telp'    => $this->input->post('telp_edit'),
    );
    $this->db->where('id_pelanggan', $this->input->post('id_pelanggan_edit'))
             ->update('pelanggan', $pelanggan);

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function hapus_pelanggan($id_pelanggan)
  {
    $this->db->where('id_pelanggan', $id_pelanggan)
             ->delete('pelanggan');

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

}
