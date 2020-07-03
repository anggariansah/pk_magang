
 <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->

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

<div class="container-fluid"> 

<!-- TABEL TAMBAH DATA DOSEN -->
 <div class="card-body">
 	<span id="success_message"></span>
  <br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i>  Update Dosen Industri</button>
  <br>
  <br>

	<table>
	<tr>
	<td>
		<div class="col-lg-3 col-6">
		<div class="card" style="width: 30rem;">
			<div class="card-body">
			<h3 class="card-title"> <strong> Detail Dosen Industri </strong></h3>
			</div>
				<ul class="list-group list-group-flush">
					<p id="nama-dosen" name="nama-dosen"> </p>
					<p id="email-dosen" name="email-dosen"> </p>
					<p id="nohp-dosen" name="nohp-dosen"> </p>
					<p id="perusahaan-dosen" name="perusahaan-dosen"> </p>
				</ul>
		</div>
		</div>
	</div>
	</td>
	<td>
		<div class="col-lg-3 col-6">
		<div class="card" style="width: 30rem;">
			<div class="card-body">
			<h3 class="card-title"> <strong> Dosen Pembimbing </strong></h3>
			</div>
				<ul class="list-group list-group-flush">
					<p id="nip-pembimbing" name="nip-pembimbing"> </p>
					<p id="nama-pembimbing" name="nama-pembimbing"> </p>
					<p id="email-pembimbing" name="email-pembimbing"> </p>
					<p id="notelp-pembimbing" name="notelp-pembimbing"> </p>
				</ul>
		</div>
		</div>
	</td>
	</tr>
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
			<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Dosen" value="">
		</div>
		<div class="form-group">
			<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="">
		</div>
		<div class="form-group">
			<input type="number" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="">
		</div>
		<div class="form-group">
			<select id="id_industri" name="id_industri" class="custom-select">

			</select>   
		</div>
		<input type="hidden" name="id" id="id" />


		<div class="modal-footer">
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

				var id = "17";

      
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

				function getDetailDosenIndustri()
				{
					$.ajax({
						url:"<?php echo base_url(); ?>test_api/action",
						method:"POST",
						data:{id:id, data_action:'getDetailDosenIndustri'},
						dataType:"json",
						success:function(data)
						{
							$('#nama-dosen').html('<li class="list-group-item" id="nama-dosen" name="nama-dosen">Nama : '+data.nama+'</li>');          
							$('#email-dosen').html('<li class="list-group-item" id="email-dosen" name="email-dosen">Email : '+data.email+'</li>');
							$('#nohp-dosen').html('<li class="list-group-item" id="nohp-dosen" name="nohp-dosen">Nohp : '+data.nohp+'</li>');
							$('#perusahaan-dosen').html('<li class="list-group-item" id="perusahaan-dosen" name="perusahaan-dosen">Perusahaan : '+data.perusahaan+'</li>');

							if(data.nama == "-"){
							

								$('#add-button').click(function(){
										$('#user_form')[0].reset();
										$('#action').val('Add');
										$('#data_action').val("insertDosenIndustri");
										$('#modal-tambah').modal('show');

										$('#nama').val("");
										$('#email').val("");
										$('#telepon').val("");
										$('#id').val(id);
								});

							}else{

								$('#add-button').click(function(){
										$('#user_form')[0].reset();
										$('#action').val('Edit');
										$('#data_action').val("updateDosenIndustri");
										$('#modal-tambah').modal('show');

										$('#nama').val(data.nama);
										$('#email').val(data.email);
										$('#telepon').val(data.nohp);
										$('#id').val(data.iddosen);
										$('#id_industri').html('<option id="id_industri" name="id_industri" value="'+data.id+'">'+data.perusahaan+'</option>');

								});
								
							}

						}
					});
				}

				function getDetailDosenPembimbing()
				{
					$.ajax({
						url:"<?php echo base_url(); ?>test_api/action",
						method:"POST",
						data:{id:id, data_action:'getDetailDosenPembimbing'},
						dataType:"json",
						success:function(data)
						{
							$('#nip-pembimbing').html('<li class="list-group-item" id="nip-pembimbing" name="nip-pembimbing">NIP : '+data.nip+'</li>');          
							$('#nama-pembimbing').html('<li class="list-group-item" id="nama-pembimbing" name="nama-pembimbing">Nama : '+data.nama+'</li>');
							$('#email-pembimbing').html('<li class="list-group-item" id="email-pembimbing" name="email-pembimbing">Email : '+data.email+'</li>');
							$('#notelp-pembimbing').html('<li class="list-group-item" id="notelp-pembimbing" name="notelp-pembimbing">No Telp : '+data.notelp+'</li>');
						}
					});
				}


				getListPerusahaan();
				getDetailDosenIndustri();
				getDetailDosenPembimbing();

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
												getDetailDosenIndustri();
												
												$('#success_message').html('<div class="alert alert-success">Data Inserted</div>');
												
										}

										if(data.error)
										{
												$('#first_name_error').html(data.first_name_error);
												$('#last_name_error').html(data.last_name_error);
										}
								}
						})
				});

			



      </script>
 