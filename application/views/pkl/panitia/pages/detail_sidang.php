<div class="container-fluid"> 

<!-- TABEL TAMBAH DATA SIDANG -->
 <div class="card-body">
 	<span id="success_message"></span>

	<div class="col-lg-3 col-6" id="data-jadwal">
		
    </div>
  <br>
	<h3>Dosen Penguji </h3>
  <br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Jadwal</button>
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
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Jadwal</button>
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


		

	});
          
          

</script>
