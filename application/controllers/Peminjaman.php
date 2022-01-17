<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_peminjaman');
	
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['konten']="view/peminjaman";
			$data['cart_peminjaman'] = $this->m_peminjaman->get_cart();
			$this->load->view('view/index',$data);
		} else {
			redirect('login');
		}
	}

	public function cari_produk()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->m_peminjaman->cari_produk() == TRUE)
			{
				redirect('Peminjaman/index');
			} else {
				$this->session->set_flashdata('notif', 'Data buku tidak ditemukan atau stok sudah habis!');
				redirect('Peminjaman/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function hapus_item_cart()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->m_peminjaman->hapus_item_cart() == TRUE)
			{
				redirect('Peminjaman/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus item cart gagal');
				redirect('Peminjaman/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function ubah_jumlah_cart()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->m_peminjaman->ubah_jumlah_cart() == TRUE){
				echo json_encode(1);
			} else {
				echo json_encode(0);
			}
		} else {
			redirect('login/index');
		}
	}

	public function get_total_belanja()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$total_peminjaman['total'] = $this->m_peminjaman->get_total_belanja();
			echo json_encode($total_peminjaman);

		} else {
			redirect('login/index');
		}
	}

	public function bayar()
	{
		if($this->session->userdata('logged_in') == TRUE){

			//insert ke tabel peminjaman dulu
			if($this->m_peminjaman->tambah_peminjaman() == TRUE)
			{
				$this->session->set_flashdata('notif', 'Proses Penyewaan Berhasil');
				redirect('Peminjaman/index');

			} else {
				$this->session->set_flashdata('notif', 'Proses Pembelian Gagal');
				redirect('Peminjaman/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function riwayat()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'riwayat_peminjaman_view';
			$data['riwayat'] = $this->m_peminjaman->get_riwayat_peminjaman();

			$this->load->view('template', $data);
		} else {
			redirect('login/index');
		}
	}

	public function get_detil_peminjaman_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){
			$detil_peminjaman = $this->m_peminjaman->get_peminjaman_by_id($id);
			$data['show_detil'] = "";
			$total = 0;
			$no = 1;
			$data['show_detil'] .= '<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>Foto</th>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th>Deskripsi</th>
										<th>Size</th>
										<th>Jumlah</th>
										<th>Sub Total</th>
									</tr>';

			foreach ($detil_peminjaman as $d) {
				$data['show_detil'] .= '<tr>
									<td>'.$no.'</td>
									<td><img src="'.base_url().'assets-admin/foto/'.$d->foto.'" width="50px" /></td>
									<td>'.$d->nama_produk.'</td>
									<td>'.$d->harga.'</td>
									<td>'.$d->deskripsi.'</td>
									<td>'.$d->size.'</td>
									<td>'.$d->jumlah.'</td>
									<td>'.$d->harga*$d->jumlah.'</td>
								</tr>';

				$no++;
				$total += $d->harga*$d->jumlah;
			}
			$data['show_detil'] .= '</table>';
			$data['show_detil'] .= '<h3><p class="text-right">Total Belanja:</p></h3>
									<h2><p class="text-right">Rp '.$total.',- </p></h2>';
			echo json_encode($data);
		} else {
			redirect('login/index');
		}
	}

	public function cetak_nota()
	{
		$this->load->view('cetak_nota_view');
	}

}

/* End of file peminjaman.php */
/* Location: ./application/controllers/peminjaman.php */