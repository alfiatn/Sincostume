<?php
class m_jenis extends CI_model {

  public function get_jenis()
  {
    $arr=$this->db->get('jenis')
                  ->result();
    return $arr;
  }

  public function get_data_jenis_by_id($id_jenis)
  {
    return $this->db->where('id_jenis', $id_jenis)
                    ->get('jenis')
                    ->row();
  }

  public function add_jenis()
  {
    $arr['nama_jenis'] = $this->input->post('nama_jenis');
    $ql_masuk=$this->db->insert('jenis', $arr);
    return $ql_masuk;
  }

  public function update_jenis()
  {
    $jenis = array(
      //nge array id_jenis
      'nama_jenis'      => $this->input->post('nama_jenis_edit'),
    );
    $this->db->where('id_jenis', $this->input->post('id_jenis_edit'))
             ->update('jenis', $jenis);

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function hapus_jenis($id_jenis)
  {
    $this->db->where('id_jenis', $id_jenis)
             ->delete('jenis');

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

}
