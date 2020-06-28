<div class="container-fluid"> 
 <!-- Small boxes (Stat box) -->
 <div class="card-body">
 <span id="success_message"></span>
	<br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Dosen</button>
	<br>
	<br>
	<table class="table table-bordered table-striped" id="example1">
	<thead>
			<tr>
				<th>Id PKL.</th>
				<th>Nama Dosen 1</th>
				<th>Nama Dosen 2</th>
				<th>Nama Dosen 3</th>
				<th>Mahasiswa yang Dibimbing</th>
				<th>Dosen Industri</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
				
		</tbody>
	</table>
</div>
</div>

<!-- MODAL TAMBAH LAPORAN BIMBINGAN -->
<div class="modal fade" id="modal-tambah">
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<input type="text" name="namadosen1" class="form-control" placeholder="Nama Dosen 1" value="">
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="nip" class="form-control" placeholder="NIP" value="">
			</select>
		</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<input type="text" name="namadosen2" class="form-control" placeholder="Nama Dosen 2" value="">
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="nip" class="form-control" placeholder="NIP" value="">
			</select>
		</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<input type="text" name="namadosen3" class="form-control" placeholder="Nama Dosen 3" value="">
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="nip" class="form-control" placeholder="NIP" value="">
			</select>
		</div>
		<div class="form-group">
                <input type="text" name="namamahasiswa" class="form-control" placeholder="Nama Mahasiswa yang Dibimbing" value="">
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
<!-- TUTUP MODAL EDIT DATA -->
<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<input type="text" name="namadosen" class="form-control" placeholder="Nama Dosen" value="">
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="nip" class="form-control" placeholder="NIP" value="">
			</select>
		</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<input type="text" name="namadosen" class="form-control" placeholder="Nama Dosen" value="">
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="nip" class="form-control" placeholder="NIP" value="">
			</select>
		</div>
	
<!-- MODAL EDIT DATA -->
<div class="modal fade" id="modal-edit">
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit Nilai</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<select id="nama" name="namadosen1" class="custom-select">
			</select>
		</div>
		<div class="form-group">
			<select id="nip" name="nip" class="custom-select">
			</select>
		</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<select id="nama" name="namadosen2" class="custom-select">
			</select>
		</div>
		<div class="form-group">
			<select id="nip" name="nip" class="custom-select">
			</select>
		</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<select id="nama" name="namadosen3" class="custom-select">
			</select>
		</div>
		<div class="form-group">
			<select id="nip" name="nip" class="custom-select">
			</select>
		</div>
		<div class="form-group">
                <input type="text" name="namamahasiswa" class="form-control" placeholder="Nama Mahasiswa yang Dibimbing" value="">
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
<!-- TUTUP MODAL EDIT DATA -->

<script type="text/javascript" language="javascript">
	$(document).ready(function(){

		function fetch_data()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'listmhs_dosen'},
				success:function(data)
				{
					$('tbody').html(data);
				}
			});
		}

		fetch_data();

		$('#add-button').click(function(){
        $('#user_form')[0].reset();
        $('#action').val('Add');
        $('#data_action').val("insertDosen");
        $('#modal-tambah').modal('show');
    });
	});



</script>
