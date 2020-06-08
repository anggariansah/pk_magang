
<section class="content">
<span id="success_message"></span>
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
      <div class="col-md-6">
       <!-- general form elements -->
      <div class="card card-primary">
      <div class="card-header">
      <h3 class="card-title">Daftar PKL</h3>
      </div>
            <!-- /.card-header -->
            <!-- form start -->
      <form role="form">
      <div class="card-body">
      <div class="form-group">
      <label for="nama"></label>
      <input type="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
      </div>

      <div class="form-group">
      <label for="nim"></label>
      <input type="nim" class="form-control" id="nim" placeholder="Nomor Induk Mahasiswa">
      </div>

      <div class="form-group">
      <label for="notlp"></label>
      <input type="notlp" class="form-control" id="notlp" placeholder="Nomor Telepon">
      </div>

      <div class="form-group">
      <label for="Email"></label>
      <input type="email" class="form-control" id="email" placeholder="Email">
      </div>

      <div class="form-group">
      	<label for="perusahaan"></label>
      <div class="input-group">
      <div class="custom-file">
      	<input type="perusahaan" class="form-control" id="perusahaan" placeholder="Nama Perusahaan">
      <div class="input-group-append">
			<button id="add-button" type="button" class="btn btn-sm btn-primary">Tambah</button>
      </div>
      </div>
      </div>
      </div>
      </div>
              <!-- /.card-body -->

    <div class="card-footer">
        <button type="daftar" class="btn btn-primary">Daftar</button>
      </div>
    </form>
    </div>
    <!-- /.card -->

		<!-- MODAL TAMBAH DATA -->
<div class="modal fade" id="modal-tambah">
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tambah Perusahaan</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Perusahaan" value="">
		</div>
		<div class="form-group">
			<input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="">
		</div>
		<div class="form-group">
			<input type="number" id="no_telp" name="no_telp" class="form-control" placeholder="No Telp" value="">
		</div>
		<div class="modal-footer">
			<input type="hidden" name="user_id" id="user_id" />
      <input type="hidden" name="data_action" id="data_action" value="Insert" />
			<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</div>
		</form>
	</div>
	</div>
</div>
</div>



<!-- TUTUP MODAL TAMBAH DATA -->

<script type="text/javascript" language="javascript">
	$(document).ready(function(){

		function getNilaiMahasiswa()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getNilai'},
				success:function(data)
				{
					$('tbody').html(data);
				}
			});
		}


		getNilaiMahasiswa();

	$('#add-button').click(function(){
        $('#user_form')[0].reset();
        $('#action').val('Add');
        $('#data_action').val("insertPerusahaan");
        $('#modal-tambah').modal('show');
    });


	$(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url() . 'test_api/action' ?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                if(data.success)
                {
                    $('#user_form')[0].reset();
                    $('#modal-tambah').modal('hide');
                    if($('#data_action').val() == "insertPerusahaan")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Inserted</div>');
                    }
                }

                if(data.error)
                {
                    $('#nama').html(data.nama);
                }
            }
        })
    });

});

</script>



 