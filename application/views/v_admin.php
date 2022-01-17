<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Data Admin</h4>
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
                        Nama Admin
                      </th>
                      <th>
                        Level
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
                        <td>'.$a->nama_admin.'</td>
                        <td>'.$a->nama_level.'</td>
                        <td><a href="#" onclick="prepare_update_talent('.$a->id_admin.')"
                                        data-toggle="modal" data-target="#ubah" class="btn btn-info btn-nd">Ubah</a>
        
                        <a href="'.base_url().'index.php/admin/delete_admin/'.$a->id_admin.'"
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
                    <form action="<?php echo base_url() ?>index.php/Admin/add_admin" method="post" enctype="multipart/form-data">
                      Username
                      <input type="text" name="username" placeholder="Username" class="form-control"><br>
                      Password
                      <input type="text" name="password" placeholder="Password" class="form-control"><br>
                      Nama Admin
                      <input type="text" name="nama_admin" placeholder="Nama Admin" class="form-control"><br>
                      Level
                      <select name="level" class="form-control">
				            	<?php
					              	foreach ($level as $l) {
							            echo '
							          	<option value="'.$l->id_level.'">'.$l->nama_level.'</option>
						            	';
					              	}
			            		?>	        		
	                	</select><br>

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
              <form action="<?php echo base_url() ?>index.php/Admin/update_admin" method="post">

                <input type="hidden" name="id_admin_edit" id="id_admin_edit"> <!-- fungsi nya untuk where -->

                Username
                <input type="text" name="username_edit" id="username_edit" class="form-control"><br>
                Password
                <input type="text" name="password_edit" id="password_edit" class="form-control"><br>
                Nama Admin
                <input type="text" name="nama_admin_edit" id="nama_admin_edit" class="form-control"><br>
                Level
                <select name="level_edit" id="level_edit" class="form-control">
                <?php
                    foreach ($level as $l) {
                    echo '
                    <option value="'.$l->id_level.'">'.$l->nama_level.'</option>
                    ';
                    }
                ?>	        		
              </select><br>

                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
              </form>
            </div>
         </div>
       </div>
    </div>

    <script type="text/javascript">
      function prepare_update_talent(id_admin)
      {
        $.getJSON('<?php echo base_url(); ?>index.php/Admin/json_admin_by_id/'+id_admin, function(data){

          $("#username_edit").val(data.username);
          $("#nama_admin_edit").val(data.nama_admin);
          $("#level_edit").val(data.id_level);
          $("#id_admin_edit").val(data.id_admin);
        });
      }
    </script>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>