<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Laporan Kostum</h4>
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
                      <!-- <th>
                        Admin
                      </th> -->
                      <th>
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                       <?php
                      $no=0;
                      foreach($datakos as $k) {
                        $no++;
                        echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$k->nama_produk.'</td>
                        <td>'.$k->nama_peminjam.'</td>
                        <td>'.$k->tanggal_pinjam.'</td>
                        <td>'.$k->alamat.'</td>
                        
                        <td>
                        <a href="'.base_url().'index.php/laporan/delete/'.$k->id_pinjam.'"
                                        class="btn btn-danger btn-md" onclick="return confirm(\'Anda Yakin\')">Hapus</a>
                        </td>
                        </tr>';
                      }
                       ?>
        
                    </tbody>
                  </table>

