
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


<div class="container-fluid"> 

<!-- TABEL TAMBAH DATA DOSEN -->
 <div class="card-body">
 	<span id="success_message"></span>
  <br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
  <br>
  <br>

  <table class="table table-bordered table-striped" id="example1">
  <thead>
      <tr>
        <th>Kode</th>
        <th>Dosen Pembimbing</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Dosen Industri</th>
        <th>Kode Industri</th>
        <th>File</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
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
                <input type="number" name="kode" id="kode" class="form-control" placeholder="Kode" value="">
              </div>
              <div class="form-group">
                <input type="text" name="dospem" id="dospem" class="form-control" placeholder="Dosen Pembimbing" value="">
              </div>
              <div class="form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="">
              </div>
              <div class="form-group">
                <input type="number" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="">
              </div>
              <div class="form-group">
                <input type="text" name="dosin" id="dosin" class="form-control" placeholder="Dosen Industri" value="">
              </div>
              <div class="form-group">
                <input type="number" name="kode" id="kodin" class="form-control" placeholder="Kode Industri" value="">
              </div>
              <div class="form-group">
                <input type="file" name="kode" id="kodin" class="form-control" placeholder="Kode Industri" value="">
              </div>


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

        // $(document).ready(function(){

        //   function getDosenindustri()
        //   {
        //     $.ajax({
        //       url:"<?php echo base_url(); ?>test_api/action",
        //       method:"POST",
        //       data:{data_action:'getDosenindustri'},
        //       success:function(data)
        //       {
        //         $('tbody').html(data);
        //       }
        //     });
        //   }

        //   getDosenindustri();


      </script>
 