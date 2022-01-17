<?php
class m_produk_admin extends CI_model {

  public function get_produk()
  {
    $arr=$this->db->join('jenis','jenis.id_jenis = produk.id_jenis')
                  ->get('produk')
                  ->result();
    return $arr;
  }

  public function get_jenis()
  {
    $arr=$this->db->get('jenis')
                  ->result();
    return $arr;
  }

  public function get_data_produk_by_id($id_produk)
  {
    return $this->db->where('id_produk', $id_produk)
                    ->get('produk')
                    ->row();
  }

  public function add_produk($foto)
  {
    $arr['foto'] = $foto['file_name'];
    $arr['nama_produk'] = $this->input->post('nama_produk');
    $arr['deskripsi'] = $this->input->post('deskripsi');
    $arr['harga'] = $this->input->post('harga');
    $arr['size'] = $this->input->post('size');
    $arr['stok'] = $this->input->post('stok');
    $arr['id_jenis'] = $this->input->post('jenis');

    $this->db->insert('produk', $arr);
    if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
  }

  public function update_produk()
  {
    $produk = array(
      //nge array id_produk
      // 'foto'          => $this->input->post('foto_edit'),
      'nama_produk'    => $this->input->post('nama_produk_edit'),
      'deskripsi'      => $this->input->post('deskripsi_edit'),
      'harga'          => $this->input->post('harga_edit'),
      'size'           => $this->input->post('size_edit'),
      'stok'           => $this->input->post('stok_edit'),
      'id_jenis'       => $this->input->post('jenis_edit')
    );
    $this->db->where('id_produk', $this->input->post('id_produk_edit'))
             ->update('produk', $produk);

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function hapus_produk($id_produk)
  {
    $this->db->where('id_produk', $id_produk)
             ->delete('produk');

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

}
