<div class="container-fluid"> 

<!-- TABEL TAMBAH DATA SIDANG -->
 <div class="card-body">
 	<span id="success_message"></span>
  <br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Jadwal</button>
  <br>
  <br>

  <table class="table table-bordered table-striped" id="example1">
  <thead>
      <tr>
        <th>Tanggal Sidang</th>
        <th>Dosen</th>
        <th>Ruangan</th>
        <th>Mahasiswa</th>
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
                <input type="date" name="tanggal_sidang" id="tanggal_sidang" class="form-control" placeholder="Tanggal Sidang" value="">
              </div>
              <div class="form-group">
                <input type="text" name="dosen" id="dosen" class="form-control" placeholder="Dosen" value="">
              </div>
              <div class="form-group">
              <select name="ruangan" id="ruangan" class="custom-select">
                <option selected>Ruangan</option>
                <option>AA201</option>
                <option>AA202</option>
                <option>AA203</option>
                <option>AA204</option>
                <option>AA301</option>
                <option>AA302</option>
                <option>AA303</option>
                <option>AA304</option>
                <option>AA304</option>
              </select>
              </div>
              <div class="form-group">
                <input type="text" name="mahasiswa" id="mahasiswa" class="form-control" placeholder="Mahasiswa" value="">
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

					function getSidang()
					{
						$.ajax({
							url:"<?php echo base_url(); ?>test_api/action",
							method:"POST",
							data:{data_action:'getSidang'},
							success:function(data)
							{
								$('tbody').html(data);
							}
						});
					}

          getSidang();
        

          $('#add-button').click(function(){
            $('#user_form')[0].reset();
            $('#action').val('Add');
            $('#data_action').val("insertSidang");
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
                      getSidang();
                      if($('#data_action').val() == "insertSidang")
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
            data:{id:id, data_action:'getSingleSidang'},
            dataType:"json",
            success:function(data)
            {
								$('#modal-tambah').modal('show');           
                $('#tanggal_sidang').val(data.tanggal_sidang);
                $('#dosen').val(data.dosen);
								$('#ruangan').val(data.ruangan);
								$('#mahasiswa').val(data.mahasiswa);
                $('.modal-title').text('Edit Sidang');
                $('#user_id').val(id);
                $('#action').val('Edit');
								$('#data_action').val('updateSidang');

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
								data:{id:id, data_action:'deleteSidang'},
								dataType:"JSON",
								success:function(data)
								{
										if(data.success)
										{
												$('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
												getSidang();
										}
								}
						})
				}
  	  });

		});
          
          

</script>
