<div class="container-fluid"> 
 <!-- Small boxes (Stat box) -->

 <div class="card-body">
 	<span id="success_message"></span>
	<br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Industri</button>
	<br>
	<br>

	<table class="table table-bordered table-striped" id="example1">
	<thead>
			<tr>
				<th>Id Industri</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No Telp</th>
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
			<input type="hidden" name="industri_id" id="industri_id" />
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

		function getPerusahaanTabel()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getPerusahaanTabel'},
				success:function(data)
				{
					$('tbody').html(data);
				}
			});
		}

	
		getPerusahaanTabel();


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
                    getPerusahaanTabel();
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

	$(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>test_api/action",
                method:"POST",
                data:{id:id, data_action:'deletePerusahaan'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
                        getPerusahaanTabel();
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
            data:{id:id, data_action:'tampilSinglePerusahaan'},
            dataType:"json",
            success:function(data)
            {
                $('#modal-tambah').modal('show');
                $('#nama_perusahaan').val(data.nama_perusahaan);
				$('#alamat').val(data.alamat);
				$('#tlpn_hotline').val(data.tlpn_hotline);
                $('.modal-title').text('Edit Perusahaan');
                $('#industri_id').val(id);
                $('#action').val('Edit');
                $('#data_action').val('updatePerusahaan');
            }
        })
    });

});

</script>



