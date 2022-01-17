
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Data Produk</h4>
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <?php
                  $pesan = $this->session->flashdata('pesan');
                  if(!empty($pesan)) {
                    echo '<div class="alert alert-primary">'.$pesan.'</div>';
                  }
                  ?>
                    <thead class=" text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Foto
                      </th>
                      <th>
                        Nama Produk
                      </th>
                      <th>
                        Deskripsi
                      </th>
                      <th>
                        Harga
                      </th>
                      <th>
                        Size
                      </th>
                      <th>
                        Jenis
                      </th>
                      <th>
                        Stok
                      </th>
                    </thead>
                    <tbody>
                       <?php
                      $no=0;
                      foreach($arr as $p) {
                        $no++;
                        echo '<tr>
                        <td>'.$no.'</td>
                        <td><img src="'.base_url().'assets-admin/foto/'.$p->foto.'" width="50px" /></td>
                        <td>'.$p->nama_produk.'</td>
                        <td>'.$p->deskripsi.'</td>
                        <td>'.$p->harga.'</td>
                        <td>'.$p->size.'</td>
                        <td>'.$p->nama_jenis.'</td>
                        <td>'.$p->stok.'</td>
                        <td><a href="#" onclick="prepare_update_talent('.$p->id_produk.')"
                                        data-toggle="modal" data-target="#ubah" class="btn btn-info btn-nd">Ubah</a>
        
                        <a href="'.base_url().'index.php/Produk_admin/delete_produk/'.$p->id_produk.'"
                                        class="btn btn-danger btn-md" onclick="return confirm(\'Anda Yakin\')">Hapus</a>
                        </tr>';
                      }
                       ?>
        
                    </tbody>
                  </table>

            <!-- MODAL TAMBAH -->
            <div class="modal fade" id="tambah">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="card-header">
                  <div class="modal-header">
                  <h4 class="card-title" id="myModalLabel">Tambah Produk</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
                  </div>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url() ?>index.php/Produk_admin/add_produk" method="post" enctype="multipart/form-data">
                      Foto
                      <input type="file" name="foto" placeholder="Foto" class="form-control"><br>
                      Nama Produk
                      <input type="text" name="nama_produk" placeholder="Nama Produk" class="form-control"><br>
                      Deskripsi
                      <textarea type="textarea" name="deskripsi" placeholder="Deskripsi" class="form-control"></textarea><br>
                      Harga
                      <input type="text" name="harga" placeholder="Harga" class="form-control"><br>
                      Size
                      <input type="text" name="size" placeholder="Size" class="form-control"><br>
                      Jenis
                      <select name="jenis" class="form-control">
				                  <?php
					          	    foreach ($jenis as $j) {
							            echo '
							      	    <option value="'.$j->id_jenis.'">'.$j->nama_jenis.'</option>
						        	    ';
					          	    }
			            	      ?>	        		
	                    </select><br>
                      Stok
                      <input type="text" name="stok" placeholder="Stok" class="form-control"><br>

                      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
                    </form>
                     </div>
                    </div>
                  </div>
                 </div>

            <!-- MODAL UBAH -->
            <div class="modal fade" id="ubah">
              <div class="modal-dialog">
                <div class="modal-content">
                 <div class="card-header">
                 <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Ubah Produk</h4>
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 </div>
                 </div>
              <div class="modal-body">
              <form action="<?php echo base_url() ?>index.php/Produk_admin/update_produk" method="post">

                <input type="hidden" name="id_produk_edit" id="id_produk_edit"> <!-- fungsi nya untuk where -->

                Foto
                <div id="data_foto"></div>
                <!-- <input type="file" class="form-control" placeholder="Foto" name="foto_edit" id="foto_edit"><br> -->
                Nama Talent
                <input type="text" name="nama_produk_edit" id="nama_produk_edit" class="form-control"><br>
                Deskripsi
                <textarea type="text" name="deskripsi_edit" id="deskripsi_edit" class="form-control"></textarea><br>
                Harga
                <input type="text" name="harga_edit" id="harga_edit" class="form-control"><br>
                Size
                <input type="text" name="size_edit" id="size_edit" class="form-control"><br>
                Jenis
                <select name="jenis_edit" id="jenis_edit" class="form-control">
                <?php
                    foreach ($jenis as $j) {
                    echo '
                    <option value="'.$j->id_jenis.'">'.$j->nama_jenis.'</option>
                    ';
                    }
                ?>	        		
              </select><br>
                Stok
                <input type="text" name="stok_edit" id="stok_edit" class="form-control"><br>

                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
              </form>
            </div>
         </div>
       </div>
    </div>

    <script type="text/javascript">
      function prepare_update_talent(id_produk)
      {
        $.getJSON('<?php echo base_url(); ?>index.php/Produk_admin/json_produk_by_id/'+id_produk, function(data){

          $("#data_foto").html('<img src="<?php echo base_url(); ?>assets-admin/foto/' + data.foto + '" width="50px" >');
          $("#nama_produk_edit").val(data.nama_produk);
          $("#deskripsi_edit").val(data.deskripsi);
          $("#harga_edit").val(data.harga);
          $("#size_edit").val(data.size);
          $("#stok_edit").val(data.stok);
          $("#jenis_edit").val(data.id_jenis);
          $("#id_produk_edit").val(data.id_produk);
        });
      }
    </script>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>