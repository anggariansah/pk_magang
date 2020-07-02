
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
<html>
<head>
  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
 
  <div class="container">   
   
    <form class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2" for="nama">Reply</label>
        <div class="form-group">
      <textarea type="text" class="form-control" id="alamat"></textarea>
    </div>
    <div class="container" style="margin-top:10px;">
  <div class="row">
            <div class="col-xs-12">
                <form method="POST">
                    <div class="form-group">
                        <label for="InputFile">File input</label>
                        <input type="file" id="InputFile" name="file">
                    </div>
      <button type="submit" class="btn btn-danger">Simpan</button>
      <button type="submit" class="btn btn-danger">Cancel</button>
    </form>   
  </div>
 

   <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <di4v class="card">
        <div class="card-header">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
<div class="container-fluid"> 

<!-- Tambah diskusi -->
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
<<div class="modal fade" id="modal-tambah">
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
                <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" value="">
              </div>
              <div class="form-group">
                <input type="text" name="isi" id="isi" class="form-control" placeholder="Isi" value="">
              </div>
              <div class="form-group">
                <input type="file" name="file" id="file" class="form-control" placeholder="File" value="">
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

        <script type="text/javascript" language="javascript">
        $('#add-button').click(function(){
            $('#user_form')[0].reset();
            $('#action').val('Add');
            $('#data_action').val("insertSidang");
            $('#modal-tambah').modal('show');
        });
        </script>

</div>
</div>

</body>
</html>