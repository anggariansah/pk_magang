
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>List Perusahaan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>assets/AdminLTE/index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url(); ?>assets/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url(); ?>assets/AdminLTE/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url(); ?>assets/AdminLTE/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
 
  <!-- /.navbar -->

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Perusahaan</h1>
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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
 

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

 <!-- Daftar perusahaan nya -->
	<table cellspacing="7">
		  <tr>
		    <td scope="col" width="5%">
		    <div class="card" style="width: 18rem;">
 			<img class="card-img-top" src="..." alt="Card image cap">
  			<div class="card-body">
   			<h5 class="card-title">Bukalapak.com</h5>
    		<p class="card-text">Ini perusahaan Bukalapak.com</p>
   			<a href="#" class="btn btn-primary">Lihat</a>
  			</div>
			</div>
			</td>
		 
			<td scope="col" width="5%">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="..." alt="Card image cap">
  			<div class="card-body">
    		<h5 class="card-title">Toko Pedia</h5>
    		<p class="card-text">Ini perusahaan Tokopedia</p>
    		<a href="#" class="btn btn-primary">Lihat</a>
  			</div>
		    </div>        
			</div>	
		 	</td>

			<td scope="col" width="5%">
		 	<div class="card" style="width: 18rem;">
		 	<img class="card-img-top" src="..." alt="Card image cap">
  			<div class="card-body">
    		<h5 class="card-title">Toko Pedia</h5>
    		<p class="card-text">Ini perusahaan Tokopedia</p>
    		<a href="#" class="btn btn-primary">Lihat</a>
  			</div>
			</div>        
			</div>	
			</td>
		 </tr>

		 <tr>
		 	<td>
		 	<div class="card" style="width: 18rem;">
 		 	<img class="card-img-top" src="..." alt="Card image cap">
  			<div class="card-body">
   			<h5 class="card-title">Bukalapak.com</h5>
    		<p class="card-text">Ini perusahaan Bukalapak.com</p>
   			<a href="#" class="btn btn-primary">Lihat</a>
  			</div>
			</div>
		 	</td>
		 
		 
		 	<td>
		 	<div class="card" style="width: 18rem;">
		 	<img class="card-img-top" src="..." alt="Card image cap">
  			<div class="card-body">
    		<h5 class="card-title">Toko Pedia</h5>
    		<p class="card-text">Ini perusahaan Tokopedia</p>
    		<a href="#" class="btn btn-primary">Lihat</a>
  			</div>
			</div>        
			</div>	
			</td>

			<td>
		 	<div class="card" style="width: 18rem;">
		 	<img class="card-img-top" src="..." alt="Card image cap">
  			<div class="card-body">
    		<h5 class="card-title">Toko Pedia</h5>
    		<p class="card-text">Ini perusahaan Tokopedia</p>
    		<a href="#" class="btn btn-primary">Lihat</a>
  			</div>
			</div>        
			</div>	
			</td>
		 </tr>

		<tr>
		    <td scope="col" width="5%">
		    <div class="card" style="width: 18rem;">
 			<img class="card-img-top" src="..." alt="Card image cap">
  			<div class="card-body">
   			<h5 class="card-title">Bukalapak.com</h5>
    		<p class="card-text">Ini perusahaan Bukalapak.com</p>
   			<a href="#" class="btn btn-primary">Lihat</a>
  			</div>
			</div>
			</td>
		 
			<td scope="col" width="5%">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="..." alt="Card image cap">
  			<div class="card-body">
    		<h5 class="card-title">Toko Pedia</h5>
    		<p class="card-text">Ini perusahaan Tokopedia</p>
    		<a href="#" class="btn btn-primary">Lihat</a>
  			</div>
		    </div>        
			</div>	
		 	</td>

			<td scope="col" width="5%">
		 	<div class="card" style="width: 18rem;">
		 	<img class="card-img-top" src="..." alt="Card image cap">
  			<div class="card-body">
    		<h5 class="card-title">Toko Pedia</h5>
    		<p class="card-text">Ini perusahaan Tokopedia</p>
    		<a href="#" class="btn btn-primary">Lihat</a>
  			</div>
			</div>        
			</div>	
			</td>
		 </tr>

	</table>



		

		

<!-- end daftar perusahaannya -->

        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.3-pre
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>
