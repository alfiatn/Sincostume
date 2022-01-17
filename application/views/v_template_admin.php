<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets-admin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets-admin/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sin Costume
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="<?php echo base_url() ?>assets-admin/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() ?>assets-admin/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url() ?>assets-admin/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <?php
					if($this->session->userdata('nama_level') == 'Admin'){
					?>
          <li>
            <a href="<?php echo base_url() ?>index.php/dashboard_admin">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
              <a href="<?php echo base_url() ?>index.php/Jenis/index">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>Data Jenis</p>
              </a>
            </li>
          <li>
            <a href="<?php echo base_url() ?>index.php/produk_admin">
              <i class="now-ui-icons clothes_tie-bow"></i>
              <p>Data Produk</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>index.php/Admin">
              <i class="now-ui-icons users_single-02"></i>
              <p>Data Admin</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>index.php/pelanggan">
              <i class="now-ui-icons users_single-02"></i>
              <p>Data Pelanggan</p>
            </a>
          </li>
          <!-- <li>
            <a href="<?php echo base_url() ?>index.php/peminjaman/riwayat">
              <i class="now-ui-icons users_single-02"></i>
              <p>Data Peminjaman</p>
            </a>
          </li> -->
          <li>
            <a href="<?php echo base_url() ?>index.php/laporan/kostum">
              <i class="now-ui-icons files_paper"></i>
              <p>Laporan Kostum</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>index.php/laporan/studio">
              <i class="now-ui-icons files_paper"></i>
              <p>Laporan Studio</p>
            </a>
          </li>
          <?php
							} else {
					?>
          <li>
            <a href="<?php echo base_url() ?>index.php/laporan/kostum">
              <i class="now-ui-icons files_paper"></i>
              <p>Laporan Kostum</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>index.php/laporan/studio">
              <i class="now-ui-icons files_paper"></i>
              <p>Laporan Studio</p>
            </a>
          </li>
          <?php
							}
						?>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Logout</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?php echo base_url() ?>index.php/Dashboard_admin/logout">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
        <?php
		  $this->load->view($main_view);
        ?>
       
      <!-- End Navbar -->
      
   
     
      
    
      <!-- <footer class="footer">
        <div class="container-fluid"> -->
          <!-- <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav> -->
          <!-- <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer> -->
    </div>
  </div>
    Core JS Files  
  <script src="<?php echo base_url() ?>assets-admin/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets-admin/js/core/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets-admin/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets-admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url() ?>assets-admin/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url() ?>assets-admin/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url() ?>assets-admin/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url() ?>assets-admin/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets-admin/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>