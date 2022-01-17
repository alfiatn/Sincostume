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
                  $aesan = $this->session->flashdata('pesan');
                  if(!empty($aesan)) {
                    echo '<div class="alert alert-primary">'.$aesan.'</div>';
                  }
                  ?>
                    <thead class=" text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Nama Jenis
                      </th>
                    </thead>
                    <tbody>
                       <?php
                      $no=0;
                      foreach($arr as $j) {
                        $no++;
                        echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$j->nama_jenis.'</td>
                        <td><a href="#" onclick="prepare_update_talent('.$j->id_jenis.')"
                                        data-toggle="modal" data-target="#ubah" class="btn btn-info btn-nd">Ubah</a>
        
                        <a href="'.base_url().'index.php/Produk_jenis/delete_produk/'.$j->id_jenis.'"
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
                    <form action="<?php echo base_url() ?>index.php/Jenis/add_jenis" method="post" enctype="multipart/form-data">
                      Nama Jenis
                      <input type="text" name="nama_jenis" placeholder="Nama Jenis" class="form-control"><br>

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
              <form action="<?php echo base_url() ?>index.php/Jenis/update_jenis" method="post">

                <input type="hidden" name="id_jenis_edit" id="id_jenis_edit"> <!-- fungsi nya untuk where -->

                Nama Jenis
                <input type="text" name="nama_jenis_edit" id="nama_jenis_edit" class="form-control"><br>

                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
              </form>
            </div>
         </div>
       </div>
    </div>

    <script type="text/javascript">
      function prepare_update_talent(id_jenis)
      {
        $.getJSON('<?php echo base_url(); ?>index.php/Jenis/json_jenis_by_id/'+id_jenis, function(data){

          $("#nama_jenis_edit").val(data.nama_jenis);
          $("#id_jenis_edit").val(data.id_jenis);
        });
      }
    </script>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>