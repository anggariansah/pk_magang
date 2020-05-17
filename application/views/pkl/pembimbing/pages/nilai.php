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
				<th>No.</th>
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
		<form class="form" action="" id="userform" method="POST">
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
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<input type="submit" id="action" name="action" class="btn btn-primary" values="Save changes">
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
                    fetch_data();
                    if($('#data_action').val() == "insertNilai")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Inserted</div>');
                    }
                }

                if(data.error)
                {
                    $('#nim').html(data.first_name_error);
                    $('#nilai').html(data.last_name_error);
                }
            }
        })
    });

</script>



