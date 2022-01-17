<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_peminjaman extends CI_Model {

	public function cari_produk()
	{
		$data_cart = $this->db->where('produk.nama_produk', $this->input->post('nama_produk'))
							  ->join('jenis', 'jenis.id_jenis = produk.id_jenis')
							  ->get('produk')
							  ->row();
		if($data_cart != NULL){

			//cek stok
			if($data_cart->stok > 0){
				$cart_array = array(
								'chart_id'	=> $this->session->userdata('username'),
								'id_produk' => $data_cart->id_produk
							);						
				$this->db->insert('chart',$cart_array);

				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	
	public function get_data_produk_by_id($id_produk)
	{
		return $this->db->where('id_produk', $id_produk)
						->get('produk')
						->row();
	}

	public function get_cart()
	{
		return $this->db->where('chart.chart_id', $this->session->userdata('username'))
					    ->join('produk', 'produk.id_produk = chart.id_produk')
					    ->join('jenis', 'jenis.id_jenis = produk.id_jenis')
					    ->get('chart')
					    ->result();
	}

	public function hapus_item_cart()
	{
		$this->db->where('id_chart', $this->input->post('hapus_id'))
				 ->delete('chart');

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah_jumlah_cart()
	{
		$data = array(
				'jumlah' => $this->input->post('jumlah')
			);

		//cek stok awal dulu untuk memastikan stok lebih dari jumlah yang dibeli
		$stok_awal = $this->get_data_produk_by_id($this->input->post('id_produk'))->stok;
		if($stok_awal >= $this->input->post('jumlah')){
			$this->db->where('id_chart', $this->input->post('id_chart'))
					 ->update('chart', $data);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_total_belanja()
	{
		return $this->db->select('SUM(produk.harga*chart.jumlah) as total')
						->where('chart.chart_id', $this->session->userdata('username'))
						->join('produk', 'produk.id_produk = chart.id_produk')
						->get('chart')
						->row()->total;
	}

	// public function getPtgID(){
    //     return $this->db->where('id_admin')
    //                     ->get('admin');
    // }


	public function tambah_peminjaman()
	{
		// $data_peminjaman = array(
			
		// );
		// $this->db->insert('peminjaman', $data_peminjaman);
		
		//insert peminjaman
		$last_insert_id = $this->db->insert_id();
		for($i = 0; $i < count($this->get_cart()); $i++)
		{
			$data_detil_peminjaman = array(
				'id_pinjam'		=> $last_insert_id,
				// 'id_kasir'		=> $this->session->userdata('username'),
				'nama_peminjam'	=> $this->input->post('nama_peminjam'),
				'alamat'		=> $this->input->post('alamat'),
				'id_produk'		=> $this->input->post('id_produk')[$i],
				'jumlah'		=> $this->input->post('jumlah')[$i]
			);

			//memasukan ke tabel detil transaksi
			$this->db->insert('peminjaman', $data_detil_peminjaman);

			//mengurangi stok produk
			$stok_awal = $this->get_data_produk_by_id($this->input->post('id_produk')[$i])->stok;
			$stok_akhir = $stok_awal-$this->input->post('jumlah')[$i];
			$stok = array('stok' => $stok_akhir);
			$this->db->where('id_produk', $this->input->post('id_produk')[$i])
					 ->update('produk', $stok);

		}


		//mengkosongkan cart berdasarkan kasir yang melakukan transaksi
		$this->db->where('chart_id', $this->session->userdata('username'))
				 ->delete('chart');

		return TRUE;

	}

	public function get_riwayat_peminjaman()
	{
		return $this->db->select('peminjaman.id_pinjam, peminjaman.tanggal_pinjam, peminjaman.alamat, peminjaman.id_produk, peminjaman.id_kasir, (SELECT SUM(peminjaman.jumlah*produk.harga) FROM peminjaman JOIN produk ON produk.id_produk = peminjaman.id_produk WHERE id_pinjam = peminjaman.id_pinjam ) as total')
						// ->join('pelanggan','pelanggan.id_pelanggan = peminjaman.id_pelanggan')
						->join('produk','produk.id_produk = peminjaman.id_produk')
						->join('admin','produk.id_admin = peminjaman.id_admin')
						->join('pelanggan','produk.pelanggan = peminjaman.id_pelanggan')
						->group_by('id_pinjam')
						->get('produk')
						->result();
	}

	public function get_peminjaman_by_id($id_chart)
	{
		return $this->db->select('produk.nama_produk, jenis.nama_jenis, produk.harga, produk.size, produk.deskripsi, peminjaman.jumlah')
						->where('id_pinjam', $id_chart)
						->join('produk','produk.id_produk = peminjaman.id_produk')
						->join('jenis','jenis.id_jenis = produk.id_jenis')
						->get('peminjaman')
						->result();
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */	