<?php
class m_produk_user extends CI_model {

  public function get_produk()
  {
    $arr=$this->db->join('jenis','jenis.id_jenis = produk.id_jenis')
                  ->where('nama_jenis = "kostum"')
                  ->get('produk')
                  ->result();
    return $arr;
  }

//   public function get_jenis_kostum()
//   {
//     $arr=$this->db->get('jenis')
//                   ->result();
//     return $arr;
//   }

   public function get_produk_studio()
   {
     $arr=$this->db->join('jenis','jenis.id_jenis = produk.id_jenis')
                   ->where('nama_jenis = "studio"')
                   ->get('produk')
                   ->result();
     return $arr;
   }


  //public function get_data_produk_by_id($id_produk)
  //{
   // return $this->db->join('jenis','jenis.id_jenis = produk.id_jenis')
   //                 ->where('nama_jenis = "kostum"')
     //               ->get('produk')
       //             ->row();
  //}

  public function getDetail($id){
    return $this->db->join('jenis','jenis.id_jenis = produk.id_jenis')
                    ->where('id_produk', $id)
                    ->get('produk')
                    ->row();
	}

  public function getDetailStudio($id){
    return $this->db->join('jenis','jenis.id_jenis = produk.id_jenis')
              ->where('id_produk', $id)
                  ->get('produk')
               ->row();
	}


}

