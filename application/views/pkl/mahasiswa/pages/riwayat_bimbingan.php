<div class="container-fluid">

<div class="card-body">
 	<span id="success_message"></span>
	<br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Laporan Bimbingan</button>
	<br>
	<br>

		<table class="table table-bordered table-striped" id="example1">
  <thead>
      <tr>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>NIM</th>
        <th>NIP</th>
        <th>Deskripsi</th>
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
		<h5 class="modal-title" id="exampleModalLabel">Tambah Laporan Bimbingan</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<input type="text" id='judul' name="judul" class="form-control" placeholder="Judul" value="">
		</div>
		<div class="form-group">
                <input type="date" id='date' name="date" class="form-control" placeholder="Tanggal Bimbingan" value="">
    	</div>
		<div class="form-group">
			<input type="text" id='nim' name="nim" class="form-control" placeholder="NIM" value="">
		</div>
		<div class="form-group">
			<input type="text" id='nip' name="nip" class="form-control" placeholder="NIP" value="">
		</div>
		<div class="form-group">
                <input type="text" id='deskripsi' name="deskripsi" class="form-control" placeholder="Deskripsi" value="">
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
<!-- TUTUP MODAL TAMBAH DATA -->

<!-- MODAL EDIT DATA -->
<div class="modal fade" id="modal-edit">
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit Laporan Bimbingan</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form class="form" id="user_form" method="post">
		<div class="form-group">
			<select id="judul" name="judul" class="custom-select">
			</select>
		</div>
		<div class="form-group">
                <input type="date" id='date' name="date" class="form-control" placeholder="Tanggal Bimbingan" value="">
    	</div>
		<div class="form-group">
			<input type="text" id='nim' name="nim" class="form-control" placeholder="NIM" value="">
		</div>
		<div class="form-group">
			<input type="text" id='nip' name="nip" class="form-control" placeholder="NIP" value="">
		</div>
		<div class="form-group">
                <input type="text" id='deskripsi' name="deskripsi" class="form-control" placeholder="Deskripsi" value="">
              </div>
		<div class="modal-footer">
			<input type="hidden" name="id" id="id" />
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<input type="hidden" name="data_action" id="data_action" value="Insert" />
            <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
		</div>
		</form>
	</div>
</div>
<!-- TUTUP MODAL EDIT DATA -->


<script type="text/javascript" language="javascript">

	$(document).ready(function(){
		
		function getRiwayatBimbingan()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getRiwayatBimbingan'},
				success:function(data)
				{
					$('#card_riwayat').html(data);
				}
			});
		}

		getRiwayatBimbingan();

		$('#add-button').click(function(){
        $('#user_form')[0].reset();
        $('#action').val('Add');
        $('#data_action').val("insertRiwayat");
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
                    getRiwayatBimbingan();
                    if($('#data_action').val() == "insertRiwayat")
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

	$(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{id:id, data_action:'tampilRiwayat'},
            dataType:"json",
            success:function(data)
            {
				$('#modal-tambah').modal('show');           
                $('#nim').val(data.nim);
                $('#nilai').val(data.nilai);
                $('.modal-title').text('Edit Riwayat Bimbingan');
                $('#user_id').val(id);
                $('#action').val('Edit');
				$('#data_action').val('updateRiwayat');

			}
        })
    });

	$(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>test_api/action",
                method:"POST",
                data:{id:id, data_action:'deleteRiwayat'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
                        getRiwayatBimbingan();
                    }
                }
            })
        }
    });
	});


</script>
