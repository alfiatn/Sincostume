<?php
class m_admin extends CI_model {

  public function get_admin()
  {
    $arr=$this->db->join('level','level.id_level = admin.id_level')
                  ->get('admin')
                  ->result();
    return $arr;
  }

  public function get_level()
  {
    $arr=$this->db->get('level')
                  ->result();
    return $arr;
  }

  public function get_data_admin_by_id($id_admin)
  {
    return $this->db->where('id_admin', $id_admin)
                    ->get('admin')
                    ->row();
  }

  public function add_admin()
  {
    $arr['username'] = $this->input->post('username');
    $arr['password'] = md5($this->input->post('password'));
    $arr['nama_admin'] = $this->input->post('nama_admin');
    $arr['id_level'] = $this->input->post('level');
    $ql_masuk=$this->db->insert('admin', $arr);
    return $ql_masuk;
  }

  public function update_admin()
  {
    $admin = array(
      //nge array id_admin
      'username'      => $this->input->post('username_edit'),
      'password'      => md5($this->input->post('password_edit')),
      'nama_admin'    => $this->input->post('nama_admin_edit'),
      'id_level'      => $this->input->post('level_edit')
    );
    $this->db->where('id_admin', $this->input->post('id_admin_edit'))
             ->update('admin', $admin);

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function hapus_admin($id_admin)
  {
    $this->db->where('id_admin', $id_admin)
             ->delete('admin');

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

}
