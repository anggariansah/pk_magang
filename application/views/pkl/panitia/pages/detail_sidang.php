<div class="container-fluid"> 

<!-- TABEL TAMBAH DATA SIDANG -->
 <div class="card-body">
 	<span id="success_message"></span>

	<div class="col-lg-3 col-6" id="data-jadwal">
		
    </div>
  <br>
	<h3>Dosen Penguji </h3>
  <br>
	<button id="add-dosen-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Dosen</button>
  <br>
  <br>

  <table class="table table-bordered table-striped" id="example1">
  <thead>
      <tr>
        <th>Nip</th>
        <th>Nama Dosen</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="tabel-dosen">
      
    </tbody>
  </table>
  
  <br>
  <h3>Mahasiswa</h3>
  <br>
	<button id="add-mahasiswa-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Mahasiswa</button>
  <br>
  <br>

  <table class="table table-bordered table-striped" id="example1">
  <thead>
      <tr>
	  	<th>Nip</th>
			<th>Nama Mahasiswa</th>
			<th>Kelas</th>
			<th>Perusahaan</th>
			<th>Action</th>
      </tr>
    </thead>
    <tbody id="tabel-mahasiswa">
      
    </tbody>
  </table>
  
</div>
</div>


   <!-- MODAL TAMBAH PENGUJI -->
	 <div class="modal fade" id="modal-tambah-dosen">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Penguji</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="dosen_form">
						<div class="form-group">
							<input type="hidden" name="id_jadwal_dosen" id="id_jadwal_dosen" value="" />
							<select name="dosen" id="dosen" class="custom-select">
							
							</select>
						</div>
						
						<div class="modal-footer">
							<input type="hidden" name="user_id" id="user_id" />
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="data_action" id="data_action" value="insertPenguji" />
							<input type="submit" name="action_dosen" id="action_dosen" class="btn btn-success" value="Add" />
						</div>
					</form>
				</div>
      </div>
    </div>
   </div>
        <!-- TUTUP MODAL TAMBAH PENGUJI -->


				<!-- MODAL TAMBAH MAHASISWA -->
	 <div class="modal fade" id="modal-tambah-mahasiswa">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="mahasiswa_form">
						<div class="form-group">
							<input type="hidden" name="id_jadwal_mhs" id="id_jadwal_mhs" value="" />
						</div>

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
						
						<div class="modal-footer">
							<input type="hidden" name="user_id" id="user_id" />
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="data_action" id="data_action" value="insertMahasiswaSidang" />
							<input type="submit" name="action_mhs" id="action_mhs" class="btn btn-success" value="Add" />
						</div>
					</form>
				</div>
      </div>
    </div>
   </div>
        <!-- TUTUP MODAL TAMBAH MAHASISWA -->


	<script type="text/javascript" language="javascript">
		$(document).ready(function(){

			function getSingleSidang()
			{
				$.ajax({
					url:"<?php echo base_url(); ?>test_api/action",
					method:"POST",
					data:{id:<?php echo $_GET['id']; ?>,data_action:'getSingleSidang'},
					success:function(data)
					{
						$('#data-jadwal').html(data);
					}
				});
			}


			function getSidangMahasiswa()
			{
				$.ajax({
					url:"<?php echo base_url(); ?>test_api/action",
					method:"POST",
					data:{id:<?php echo $_GET['id']; ?>,data_action:'getSidangMahasiswa'},
					success:function(data)
					{
						$('#tabel-mahasiswa').html(data);
					}
				});
			}


			function getSidangPenguji()
			{
				$.ajax({
					url:"<?php echo base_url(); ?>test_api/action",
					method:"POST",
					data:{id:<?php echo $_GET['id']; ?>,data_action:'getSidangPenguji'},
					success:function(data)
					{
						$('#tabel-dosen').html(data);
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

		getSingleSidang();
		getSidangMahasiswa();
		getDosen();
		getSidangPenguji();
			

        $('#add-dosen-button').click(function(){
						var id = document.getElementById('id').value;

            $('#dosen_form')[0].reset();
						$('#action_dosen').val('Add');
						$('#id_jadwal_dosen').val(id);
            $('#modal-tambah-dosen').modal('show');
				});
				
				$('#add-mahasiswa-button').click(function(){
						var id = document.getElementById('id').value;

            $('#mahasiswa_form')[0].reset();
						$('#action_mhs').val('Add');
						$('#id_jadwal_mhs').val(id);
            $('#modal-tambah-mahasiswa').modal('show');
        });


        $(document).on('submit', '#dosen_form', function(event){
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
                      $('#dosen_form')[0].reset();
                      $('#modal-tambah-dosen').modal('hide');
                      getSidangPenguji();
                      if($('#data_action').val() == "insertPenguji")
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
			

			$(document).on('submit', '#mahasiswa_form', function(event){
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
                      $('#mahasiswa_form')[0].reset();
                      $('#modal-tambah-mahasiswa').modal('hide');
                      getSidangMahasiswa();
                      if($('#data_action').val() == "insertMahasiswaSidang")
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

			$(document).on('click', '#show-button', function(){
        var nim = document.getElementById('mahasiswa_nim').value;
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{nim:nim, data_action:'tampilDetailMahasiswa'},
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
			

			$(document).on('click', '.delete-mhs', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>test_api/action",
                method:"POST",
                data:{id:id, data_action:'deleteSidangMahasiswa'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
												$('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
												getSidangMahasiswa();
                    }
                }
            })
        }
		});
		

		$(document).on('click', '.delete-penguji', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>test_api/action",
                method:"POST",
                data:{id:id, data_action:'deleteSidangPenguji'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
												$('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
												getSidangPenguji();
                    }
                }
            })
        }
    });


		

	});
          
          

</script>
