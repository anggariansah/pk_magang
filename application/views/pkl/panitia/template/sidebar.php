<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>assets/AdminLTE/index3.html" class="brand-link">
      <span class="brand-text font-weight-light">SIAPKL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
					<a href="#" class="d-block" id="nama"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item">
            <a href="<?php echo site_url("pkl_panitia/dashboard")?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
   		    </li>

          <li class="nav-item">
            <a href="<?php echo site_url("pkl_panitia/mahasiswa")?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Mahasiswa
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url("pkl_panitia/sidang")?>" class="nav-link">
              <i class="nav-icon fas fa-gavel"></i>
              <p>
                Sidang
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url("pkl_panitia/dosen")?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Dosen
              </p>
            </a>
					</li>
					
					<li class="nav-item">
            <a href="<?php echo site_url("pkl_panitia/perusahaan")?>" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Industri
              </p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  </body>
</html>

<script type="text/javascript" language="javascript">

var nip = <?php echo $this->session->userdata('nip_panitia');?>;


$(document).ready(function(){

		function getProfileDosen()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{nip:nip, data_action:'getProfileDosen'},
				dataType:"json",
				success:function(data)
				{
					$('#nama').html('<a href="#" class="d-block" id="nama">'+data.nama+'</a>');
				}
			});
		}

		getProfileDosen();

});

</script>
