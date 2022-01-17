
	<!-- cart section end -->
	<section class="cart-section spad">
	
	<div class="container">
			<div class="row">
				<div class="col-lg-4 card-right">
					<form action="<?php echo base_url('index.php/peminjaman/cari_produk') ?>" method="post" class="promo-code-form">
						<input type="text" placeholder="Masukkan Nama Produk" name="nama_produk">
						<input type="submit" name="submit" value="TAMBAH">
					</form>
					
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart-table">
						<h3>Peminjaman</h3>
						<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>
						<div class="cart-table-warp">
						<form action="<?php echo base_url('index.php/peminjaman/bayar'); ?>" method="post">
							<table>
							<thead>
								<tr>
									<th class="product-th">Nama Produk</th>
									<th class="quy-th">QTY</th>
									<th class="size-th">Ukuran</th>
									<th class="total-th">Harga</th>
									<th class="total-th">Subtotal</th>
									<th class="total-th">Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
									if($cart_peminjaman != NULL){
									foreach ($cart_peminjaman as $cart) {
										?>
								<tr>
									<td class="product-col">
									<input type="hidden" name="id_produk[]" value="<?php echo $cart->id_produk?>">
										
										<div class="pc-title">
											<h4><?php echo $cart->nama_produk?></h4>
											<p><?php echo $cart->deskripsi?></p>
										</div>
									</td>
									<td class="quy-col">
										<div class="quantity">
											<input type="number" name="jumlah[]" class="pro-qty" onchange="hitung_subtotal(<?php echo $cart->id_chart?> ,<?php echo $cart->harga?> ,this.value, <?php echo $cart->id_produk?>)" value="<?php echo $cart->jumlah?>">
                    					</div>
									</td>
									<td class="size-col"><h4><?php echo $cart->size ?></h4></td>
									<td class="total-col"><h4><?php echo $cart->harga ?></h4></td>
									<td><span id="subtot_<?php echo $cart->id_chart ?>"><?php echo $cart->harga*$cart->jumlah?> </span></td>
									<td class="total-col"><a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_cart" onclick="prepare_hapus_cart(<?php echo $cart->id_chart?>)">Hapus</a></td>
								</tr>
								<?php
									}
									} else {
										echo '
											<tr>
												<td colspan="12">
													Keranjang belanja kosong.
												</td>
											</tr>
											';
											?>
								
						<?php
					}
				?>
				</tbody>
			</table>
			</div>
			<?php
			if($cart_peminjaman != NULL)
				{
				echo '
			<div class="total-cost">
			<h6>Total <span id="total_peminjaman">0</span>,-</h6>
			</div>
			<br>
			<br>
			<div class="promo-code-form col-lg-5" >
			<input type="text" name="alamat"  placeholder="Masukkan Alamat Pengiriman">
			<br>
			<br>
			<input type="text" name="nama_peminjam"  placeholder="Masukkan Nama Peminjam">
			</div>
			<div class="col-lg-4 card-right">
			<input type="submit" name="submit" class="site-btn" value="Pesan">
			';
				}
				?>
			</form>
				</div>
				</div>
				</div>
						
				</div>
				
				
				
				<!-- </div> -->
				<!-- <div class="cart-table-warp"> -->
				
				
				
				<!-- </div> -->
</section>
	
	<!-- cart section end -->

	<div id="modal_hapus_cart" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Konfirmasi Hapus Item Cart</h4>
      </div>
      <form action="<?php echo base_url('index.php/peminjaman/hapus_item_cart'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id"  id="hapus_id">
	        	<p>Apakah anda yakin menghapus produk ini di cart ?</p>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">
	$.getJSON("<?php echo base_url('index.php/peminjaman/get_total_belanja') ?>", function(data){
        $("#total_peminjaman").text(data.total);
    });

	function prepare_hapus_cart(id_chart)
	{
		$("#hapus_id").val(id_chart);
	}

	function hitung_subtotal(id_chart,harga,qty,id_produk)
	{
		var price;
		price = harga*qty;
		$("#subtot_"+id_chart).text(price);
		//update qty ke tabel cart
		$.post("<?php echo base_url('index.php/peminjaman/ubah_jumlah_cart') ?>",
	    {
	    	id_chart: id_chart,
	    	id_produk: id_produk,
	        jumlah: qty
	    }, function(data, status){
	    	console.log(data);
	    	if(data == '0'){
	    		alert("Stok produk tidak mencukupi!");
	    	}
	    });
		//mengganti total belanja di cart
	    $.getJSON("<?php echo base_url('index.php/peminjaman/get_total_belanja') ?>", function(data){
	        $("#total_peminjaman").text(data.total);
	    });
	}
</script>
