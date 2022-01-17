

	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="<?php echo base_url(); ?>assets-admin/foto/<?php echo $row->foto; ?>">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?= $row->nama_produk  ?></h2>
					<h3 class="p-price">Rp. <?= $row->harga  ?></h3>
					<h4 class="p-stock">Available: <span><?= $row->stok ?></span></h4>
					<div class="fw-size-choose">
						<p><?php echo $row->size ?></p>
						
					</div>
					<br>
					<br>
					<a href="#" class="site-btn" style="background-color:#4698b8">Go to cart</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
								<?php echo $row->deskripsi ?>
								</div>
							</div>
						</div>
						</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->

	