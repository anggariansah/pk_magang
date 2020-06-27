
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Diskusi Bimbingan</title>
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

<!--   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
 -->


</head>
<body>
   <!-- Content Wrapper. Contains page content -->
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
        <!-- TABEL TAMBAH DATA DOSEN -->
 <div class="card-body">
  <span id="success_message"></span>
  <br>
  <button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
  <br>
  <br>

  <div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Balas</a>
    <a href="#" class="card-link">Edit</a>
  </div>
</div>

         <!-- MODAL TAMBAH DATA -->
<div class="modal fade" id="modal-tambah">
<div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" id="user_form">
              <div class="form-group">
                <input type="text" name="tanggal_sidang" id="tanggal_sidang" class="form-control" placeholder="judul" value="">
              </div>
              <div class="form-group">
                <input type="text" name="dosen" id="dosen" class="form-control" placeholder="Isi" value="">
              </div>
              <div class="form-group">
             

              <div class="modal-footer">
              <input type="hidden" name="user_id" id="user_id" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="hidden" name="data_action" id="data_action" value="Insert" />
              <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
              </div>
              </form>
            </div>
            </div>
          </div>
          </div>
        <!-- TUTUP MODAL TAMBAH DATA -->

</div>
</div>
</body>
</html>