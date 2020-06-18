
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
      <form method="post" id="daftar_form">
      <div class="card-body">

      <div class="form-group">
		<label for="mahasiswa_nim">NIM</label>
		<div class="input-group">
			<input type="number" class="form-control" id="mahasiswa_nim" name="mahasiswa_nim" placeholder="Nomor Induk Mahasiswa">
			<div class="input-group-append">
				<button id="show-button" type="button" class="btn btn-sm btn-primary">Tampilkan</button>
			</div>
		</div>
      </div>

		<div class="form-group">
			<label for="nama">Nama Lengkap</label>
			<input type="nama" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" disabled>
		</div>

		<div class="form-group">
			<label for="notlp">No Telepon</label>
			<input type="notlp" class="form-control" id="notlp" placeholder="Nomor Telepon" disabled>
		</div>

		<div class="form-group">
			<label for="Email">Email</label>
			<input type="email" class="form-control" id="email" placeholder="Email" disabled>
		</div>

      <div class="form-group">
    	<label for="id_industri">Perusahaan</label>
      	<div class="input-group">
			<select id="id_industri" name="id_industri" class="custom-select">
			
			</select>      
			<div class="input-group-append">
				<button id="add-button" type="button" class="btn btn-sm btn-primary">Tambah</button>
			</div>
      	</div>
      </div>
	  
      </div>
              <!-- /.card-body -->

    	<div class="card-footer">
        <input type="submit" class="btn btn-primary" name="action" id="action" value="Daftar">
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
			<input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" value="">
		</div>
		<div class="form-group">
			<input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="">
		</div>
		<div class="form-group">
			<input type="number" id="tlpn_hotline" name="tlpn_hotline" class="form-control" placeholder="No Telp" value="">
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


		function getListPerusahaan()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getListPerusahaan'},
				success:function(data)
				{
					$('#id_industri').html(data);
				}
			});
		}


		getListPerusahaan();

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
                    getListPerusahaan();
                    if($('#data_action').val() == "insertPerusahaan")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Inserted</div>');
                    }
                }

                if(data.error)
                {
                    $('#first_name_error').html(data.first_name_error);
                    $('#last_name_error').html(data.last_name_error);
                }
            }
        })
    });


	$(document).on('submit', '#daftar_form', function(event){
    	event.preventDefault();
        $.ajax({
            url:"<?php echo base_url() . 'test_api/action' ?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
				alert("pp");
                if(data.success)
                {
					
                    $('#daftar_form')[0].reset();

					if($('#data_action').val() == "insertPerusahaan")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Inserted</div>');
                    }                    
                }

                if(data.error)
                {
                    $('#mahasiswa_nim').val("Error");
                    $('#id_industri').val("Error");
                }
            }
        })
    });

	$(document).on('click', '#show-button', function(){
        var nim = document.getElementById('mahasiswa_nim').value;
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{nim:nim, data_action:'tampilDetailMahasiswa'},
            dataType:"json",
            success:function(data)
            {

				if(data.error == "true"){
					$('#success_message').html('<div class="alert alert-danger">Nim Tidak Ditemukan</div>');
					
					$('#nama').val("");
					$('#notlp').val("");
					$('#email').val("");

				

				}else{
					$('#success_message').html('<div class="alert alert-success">Data Ditemukan</div>');

					$('#nama').val(data.nama);
					$('#notlp').val(data.telp);
					$('#email').val(data.email);

					$('#data_action').val("insertPendaftaran");
				}
			
			}
        })
    });

});

</script>



 