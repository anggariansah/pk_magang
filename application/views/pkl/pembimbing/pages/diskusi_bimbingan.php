
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

<!-- Tambah diskusi -->
  <span id="success_message"></span>
  <br>
  <button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
  <br>
  <br>

  <div class="card" id="diskusi" style="width: 40rem;">
  
	</div>

	</div>


<!-- MODAL TAMBAH DATA -->
<div class="modal fade" id="modal-tambah">
<div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Reply</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form class="form-horizontal" method="post" id="user_form">
				<div class="form-group">
					<input type="hidden" class="form-control" id="id_logbook" name="id_logbook"/>
				</div>
				<div class="form-group">
					<textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
				</div>
				<div class="form-group">
						<input type="file" id="InputFile" name="file">
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

$(document).ready(function(){

	function getRiwayatPembimbing()
	{
		$.ajax({
			url:"<?php echo base_url(); ?>test_api/action",
			method:"POST",
			data:{id:<?php echo $_GET['id']; ?>, data_action:'tampilRiwayatPembimbing'},
			success:function(data)
			{
				$('#diskusi').html(data);
			}
		});
	}

	getRiwayatPembimbing();

	$('#add-button').click(function(){
			$('#user_form')[0].reset();
			$('#action').val('Add');
			$('#id_logbook').val(<?php echo $_GET['id']; ?>);
			$('#data_action').val("insertRiwayatPembimbing");
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
					getRiwayatPembimbing();
                
                    if($('#data_action').val() == "insertRiwayatPembimbing")
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
				data:{id:id, data_action:'deleteRiwayat'},
				dataType:"JSON",
				success:function(data)
				{
					if(data.success)
					{
						$('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
						getRiwayatPembimbing();
					}
				}
			})
		}
	});

});

</script>


