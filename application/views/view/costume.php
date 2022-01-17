<!-- Category section -->
<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">
							<li><a href="#">Halloween</a></li>
							<li><a href="#">Inflatable</a></li>
							<li><a href="#">Kigurumi</a></li>
							<li><a href="#">Princess</a></li>
						</ul>
					</div>
					
					
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						
						<?php
                      		foreach($arr as $a) {
							
						
						?>
							<div class="product-item">
								<div class="pi-pic">
								<span><img src="<?php echo base_url();?>assets-admin/foto/<?php echo $a->foto?>" class="col-lg-4 col-sm-6" /></span>
									<div class="pi-links">
										<a href="<?php echo base_url();?>index.php/produk_user/costume_detail?idtf=<?php echo $a->id_produk?>"  class="add-card"><i class="flaticon-bag"></i><span>DETAIL</span></a>
										<!-- <a href="<?php echo base_url();?>index.php/produk_user/costume_detail?idtf=<?php echo $a->id_produk?>" class="wishlist-btn"><i class="flaticon-heart"></i></a> -->
									</div>
								</div>
								<div class="pi-text">
								
                        			
									<h6><?php echo $a->harga?></h6>
									<p><?php echo $a->nama_produk?></p>
									  
								</div>
							</div>

							<?php
                      		 
							  }
						?>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->

