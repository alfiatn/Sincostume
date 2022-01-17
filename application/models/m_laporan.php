<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_laporan extends CI_Model {
    
  public function getListkostum(){
    $query = $this->db->join('produk','produk.id_produk=peminjaman.id_produk')
                      ->join('jenis','jenis.id_jenis=produk.id_jenis')
                      ->join('admin','admin.username=peminjaman.id_kasir')
                      ->where('nama_jenis != "Studio"')
                      ->get('peminjaman')
                      ->result();
    return $query;
  }

  public function getListstudio(){
    $query = $this->db->join('produk','produk.id_produk=peminjaman.id_produk')
                      ->join('jenis','jenis.id_jenis=produk.id_jenis')
                      ->where('nama_jenis != "Kostum"')
                      ->get('peminjaman')
                      ->result();
    return $query;
  }

  public function hapus($id_pinjam)
  {
    $this->db->where('id_pinjam', $id_pinjam)
             ->delete('peminjaman');

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

}

/* End of file kategori_model.php */
/* Location: ./application/models/kategori_model.php */