<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Data Pelanggan</h4>
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
                        Username
                      </th>
                      <th>
                        Nama Pelanggan
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Telp
                      </th>
                    </thead>
                    <tbody>
                       <?php
                      $no=0;
                      foreach($arr as $a) {
                        $no++;
                        echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$a->username.'</td>
                        <td>'.$a->nama_pelanggan.'</td>
                        <td>'.$a->email.'</td>
                        <td>'.$a->telp.'</td>
                        <td><a href="#" onclick="prepare_update_talent('.$a->id_pelanggan.')"
                                        data-toggle="modal" data-target="#ubah" class="btn btn-info btn-nd">Ubah</a>
        
                        <a href="'.base_url().'index.php/pelanggan/delete_pelanggan/'.$a->id_pelanggan.'"
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
                  <h4 class="card-title" id="myModalLabel">Tambah Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
                  </div>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url() ?>index.php/pelanggan/add_pelanggan" method="post" enctype="multipart/form-data">
                      Username
                      <input type="text" name="username" placeholder="Username" class="form-control"><br>
                      Password
                      <input type="text" name="password" placeholder="Password" class="form-control"><br>
                      Nama PElanggan
                      <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" class="form-control"><br>
                     	
                     Email PElanggan
                      <input type="email" name="email" placeholder="Email Pelanggan" class="form-control"><br>
                     	
                      Telp PElanggan
                      <input type="number" name="telp" placeholder="Telp Pelanggan" class="form-control"><br>
                     	

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
                 <h4 class="modal-title" id="myModalLabel">Ubah Pelanggan</h4>
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 </div>
                 </div>
              <div class="modal-body">
              <form action="<?php echo base_url() ?>index.php/pelanggan/update_pelanggan" method="post">

                <input type="hidden" name="id_pelanggan_edit" id="id_pelanggan_edit"> <!-- fungsi nya untuk where -->

                Username
                <input type="text" name="username_edit" id="username_edit" class="form-control"><br>
                Password
                <input type="text" name="password_edit" id="password_edit" class="form-control"><br>
                Nama pelanggan
                <input type="text" name="nama_pelanggan_edit" id="nama_pelanggan_edit" class="form-control"><br>
                 Email PElanggan
                <input type="email" name="email_edit" id="email_edit"placeholder="Email Pelanggan" class="form-control"><br>
                Telp PElanggan
                <input type="number" name="telp_edit" id="telp_edit" placeholder="telp Pelanggan" class="form-control"><br>
                     	

                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
              </form>
            </div>
         </div>
       </div>
    </div>

    <script type="text/javascript">
      function prepare_update_talent(id_pelanggan)
      {
        $.getJSON('<?php echo base_url(); ?>index.php/pelanggan/json_pelanggan_by_id/'+id_pelanggan, function(data){

          $("#username_edit").val(data.username);
          $("#nama_pelanggan_edit").val(data.nama_pelanggan);
          $("#email_edit").val(data.email);
          $("#telp_edit").val(data.telp);
          $("#id_pelanggan_edit").val(data.id_pelanggan);
        });
      }
    </script>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>