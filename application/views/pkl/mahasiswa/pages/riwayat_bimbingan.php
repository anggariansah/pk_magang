
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
 	<span id="success_message"></span>
  <br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambahkan Diskusi</button>
  <br>
  <br>

  <table class="table table-bordered table-striped" id="example1" >
  <thead>
      <tr>
        <th>Bimbingan</th>
        <th>Tanggal</th>
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
      <input type="date" id='tanggal' name="tanggal" class="form-control" placeholder="Tanggal Bimbingan" value="">
    </div>
		<div class="form-group">
      <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" value="">
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
<!--  TUTUP MODAL TAMBAH DATA -->

<script type="text/javascript">

var id;
var nim = <?php echo $this->session->userdata('nim');?>

$(document).ready(function(){


	function getIdFromNim()
	{
		$.ajax({
			url:"<?php echo base_url(); ?>test_api/action",
			method:"POST",
			data:{nim:nim, data_action:'getIdFromNim'},
			dataType:"json",
			success:function(data)
			{

				id = data.id;

				getLogbook();

			}
		});
	}

	getIdFromNim();

	function getLogbook()
	{
		$.ajax({
			url:"<?php echo base_url(); ?>test_api/action",
			method:"POST",
			data:{id:id, data_action:'getLogbook'},
			success:function(data)
			{
				$('tbody').html(data);
			}
		});
	}

	$('#add-button').click(function(){
        $('#user_form')[0].reset();
        $('#action').val('Add');
				$('#id').val(id);
        $('#data_action').val("insertLogbook");
        $('#modal-tambah').modal('show');
    });

		
		$(document).on('click', '.detail', function(){
        var id = $(this).attr('id');
        window.location.href="http://[::1]/pk_magang/pkl_mahasiswa/diskusi_bimbingan?id="+id;
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
                
										getLogbook();

                    if($('#data_action').val() == "insertLogbook")
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
                data:{id:id, data_action:'deleteLogbook'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
                        getLogbook();
                    }
                }
            })
        }
    });

});



</script>

