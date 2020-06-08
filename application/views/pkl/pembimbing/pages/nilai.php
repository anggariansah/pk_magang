<div class="container-fluid"> 
 <!-- Small boxes (Stat box) -->

 <div class="card-body">
 	<span id="success_message"></span>
	<br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Nilai</button>
	<br>
	<br>

	<table class="table table-bordered table-striped" id="example1">
	<thead>
			<tr>
				<th>Nim</th>
				<th>Nama Mahasiswa</th>
				<th>Kelas</th>
				<th>Nilai</th>
				<th>Action</th>
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
		<h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form method="post" id="user_form">
		<div class="form-group">
			<select id="nim" name="nim" class="custom-select">
				
			</select>
		</div>
		<div class="form-group">
			<input type="number" id="nilai" name="nilai" class="form-control" placeholder="Nilai" value="">
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
			<select id="nim" name="nim" class="custom-select">
				
			</select>
		</div>
		<div class="form-group">
			<input type="number" id="nilai" name="nilai" class="form-control" placeholder="Nilai" value="">
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

<!-- TUTUP MODAL EDIT DATA -->

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

		function getNim()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getNim'},
				success:function(data)
				{
					$('#nim').html(data);
				}
			});
		}

		getNilaiMahasiswa();
		getNim();


	$('#add-button').click(function(){
        $('#user_form')[0].reset();
        $('#action').val('Add');
		$('.modal-title').text('Tambah Nilai');
        $('#data_action').val("insertNilai");
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
                    getNilaiMahasiswa();
                    if($('#data_action').val() == "insertNilai")
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
            data:{id:id, data_action:'tampilNilai'},
            dataType:"json",
            success:function(data)
            {
				$('#modal-tambah').modal('show');           
                $('#nim').val(data.nim);
                $('#nilai').val(data.nilai);
                $('.modal-title').text('Edit Nilai');
                $('#user_id').val(id);
                $('#action').val('Edit');
				$('#data_action').val('updateNilai');

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
                data:{id:id, data_action:'deleteNilai'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
                        getNilaiMahasiswa();
                    }
                }
            })
        }
    });

});

</script>



