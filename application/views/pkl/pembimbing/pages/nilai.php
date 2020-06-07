<div class="container-fluid"> 
 <!-- Small boxes (Stat box) -->

 <div class="card-body">
 	<span id="success_message"></span>
	<br>
	<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus-circle"></i> Tambah Nilai</a>
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
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form method="post" id="user_add">
		<div class="form-group">
			<input type="number" id="nim" name="nim" class="form-control" placeholder="Nim" value="">
		</div>
		<div class="form-group">
			<input type="number" id="nilai" name="nilai" class="form-control" placeholder="Nilai" value="">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<input type="submit" id="action" name="action" class="btn btn-primary" values="Save changes">
		</div>
		</form>
	</div>
	</div>
</div>
</div>

<!-- TUTUP MODAL TAMBAH DATA -->


<!-- MODAL EDIT DATA -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit Nilai</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form class="form" id="user_form" method="post">
		<div class="form-group">
			<select name="" class="custom-select">
				<option selected>Nim</option>
				<option>4617010014</option>
				<option>4617010012</option>
				<option>4617010022</option>
			</select>
		</div>
		<div class="form-group">
			<input type="number" name="nilai" class="form-control" placeholder="Nilai" value="">
		</div>
		<div class="modal-footer">
			<input type="hidden" name="id" id="id" />
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<input type="submit" id="action" name="action" class="btn btn-primary" values="Save changes">
		</div>
		</form>
	</div>
	</div>
</div>
</div>

<!-- TUTUP MODAL EDIT DATA -->


<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <label>Enter First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" />
                    <span id="first_name_error" class="text-danger"></span>
                    <br />
                    <label>Enter Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" />
                    <span id="last_name_error" class="text-danger"></span>
                    <br />
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
	});


	$(document).on('submit', '#user_add', function(event){
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
                    $('#user_add')[0].reset();
                    $('#modal-tambah').modal('hide');
                    getNilaiMahasiswa();
                    if($('#data_action').val() == "insertNilai")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Inserted</div>');
                    }
                }

                if(data.error)
                {
                    $('#nim').html(data.nim);
                    $('#nilai').html(data.nilai);
                }
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

	$(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{id:id, data_action:'tampilNilai'},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#nim').val(data.nim);
                $('#nilai').val(data.nilai);
                $('#id').val(id);
                $('#action').val('Edit');
                $('#data_action').val('Edit');
            }
        })
    });

</script>



