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
				<th>Id PKLs</th>
				<th>Nama Dosen</th>
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
				<div class="input-group">
					<input type="number" class="form-control" id="mahasiswa_nim" name="mahasiswa_nim" placeholder="Nomor Induk Mahasiswa">
					<div class="input-group-append">
						<button id="show-button" type="button" class="btn btn-sm btn-primary">Tampilkan</button>
					</div>
				</div>
				</div>
				<div class="form-group">
					<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="" disabled>
				</div>

				<div class="form-group">
					<select name="dosen" id="dosen" class="custom-select">
							
					</select>
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

		function getDosen()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getDosen'},
				success:function(data)
				{
					$('#dosen').html(data);
				}
			});
		}

		fetch_data();
		getDosen();

	$('#add-button').click(function(){
        $('#user_form')[0].reset();
        $('#action').val('Add');
        $('#data_action').val("insertDosenPembimbing");
        $('#modal-tambah').modal('show');
    });

	$(document).on('click', '#show-button', function(){
        var nim = document.getElementById('mahasiswa_nim').value;
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{nim:nim, data_action:'tampilNamaMahasiswa'},
            dataType:"json",
            success:function(data)
            {

				if(data.error == "true"){

					$('#nama').val("");

				}else{

					$('#nama').val(data.nama);
				}

			}
        })
    });

	$(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{id:id, data_action:'getSingleDosenMahasiswa'},
            dataType:"json",
            success:function(data)
            {
				$('#modal-tambah').modal('show');           
                $('#mahasiswa_nim').val(data.nim);
                $('#nama').val(data.nama);
				$('#dosen').html('<option value="'+data.dosen+'">'+data.dosen+'</option>');
                $('.modal-title').text('Edit Dosen');
                $('#user_id').val(id);
                $('#action').val('Edit');
				$('#data_action').val('updateNilai');

			}
        })
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
                      if($('#data_action').val() == "insertDosenPembimbing")
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
                data:{id:id, data_action:'deleteDosenPembimbing'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
						fetch_data();
                    }
                }
            })
        }
    });

});



</script>
