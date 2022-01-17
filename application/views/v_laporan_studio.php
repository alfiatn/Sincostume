<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Laporan Studio </h4>
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <?php
                  $aesan = $this->session->flashdata('pesan');
                  if(!empty($pesan)) {
                    echo '<div class="alert alert-primary">'.$pesan.'</div>';
                  }
                  ?>
                    <thead class=" text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Nama Produk
                      </th>
                      <th>
                        Nama Peminjam
                      </th>
                      <th>
                        Tanggal Pinjam
                      </th>
                      <th>
                        Alamat
                      </th>
                      <th>
                        Nama Admin
                      </th>
                      <th>
                        Aksi
                      </th>
                      <!-- <th>
                        Admin
                      </th> -->
                    </thead>
                    <tbody>
                       <?php
                      $no=0;
                      foreach($datastu as $s) {
                        $no++;
                        echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$s->nama_produk.'</td>
                        <td>'.$s->nama_peminjam.'</td>
                        <td>'.$s->tanggal_pinjam.'</td>
                        <td>'.$s->alamat.'</td>
                        
                        <td>
                        <a href="'.base_url().'index.php/laporan/delete/'.$s->id_pinjam.'"
                                        class="btn btn-danger btn-md" onclick="return confirm(\'Anda Yakin\')">Hapus</a>
                        </td>
                        </tr>';
                      }
                       ?>
        
                    </tbody>
                  </table>
                  