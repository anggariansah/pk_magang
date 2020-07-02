 
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/dist/js/demo.js"></script>

<div class="container-fluid"> 
 <!-- Small boxes (Stat box) -->
 <div class="card-body">
 <span id="success_message"></span>
  <br>
  <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus-circle"></i> Tambah Data</a>
  <br>
  <br>
	<table class="table table-bordered table-striped" id="example1">
	<thead>
			<tr>
				<th>No.</th>
				<th>Nama Mahasiswa</th>
				<th>Kelas</th>
				<th>Perusahaan</th>
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
    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
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
			<select id="id_industri" name="id_industri" class="custom-select">
				<option value="3">Bukalapak</option>
			</select>      
    </div>

    <div class="modal-footer">
      			<input type="hidden" name="user_id" id="user_id" />
            <input type="hidden" name="data_action" id="data_action" value="insertPendaftaran" />
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
    <h5 class="modal-title" id="exampleModalLabel">Edit Data Status</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" id="edit_form">

		<div class="form-group">
			<select id="status" name="status" class="custom-select">
				<option value="1" id="magang"></option>
				<option value="2" id="bimbingan"></option>
				<option value="3" id="sidang"></option>
			</select>      
    </div>

    <div class="modal-footer">
				<input type="hidden" name="id_mahasiswa" id="id_mahasiswa" />
				<input type="hidden" name="status-edit" id="status-edit" />
				<input type="hidden" name="data_action" id="data_action" value="updateStatusMahasiswa" />
				<input type="submit" name="action_edit" id="action_edit" class="btn btn-success" value="Add" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    </form>
  </div>
  </div>
</div>
</div>

<!-- TUTUP MODAL EDIT DATA -->


<!-- MODAL DETAIL -->
<div class="modal fade" id="modal-detail">
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
	<div class="card">
	<div class="card-body">

		<!-- Steps form -->
    <h2 class="text-center font-weight-bold pt-4 pb-5"><strong>Status Mahasiswa</strong></h2>
    <!-- Stepper -->
     <!-- Stepper -->
		 <div class="steps-form" id="step-status">
      <div class="steps-row setup-panel">
        <div class="steps-step">
          <a id="step-1"></a>
          <p>Magang</p>
        </div>
        <div class="steps-step">
          <a id="step-2"></a>
          <p>Bimbingan</p>
        </div>
        <div class="steps-step">
          <a id="step-3"></a>
          <p>Sidang</p>
        </div>
      </div>
    </div>

  </div>
    </div>

		<br>

		<div class="card" style="width: 25rem;">
			<div class="card-body">
				<h3 class="card-title"> <strong> Detail Mahasiswa </strong></h3>
			</div>
			<ul class="list-group list-group-flush">
				<p id="nim-detail" name="nim-detail"> </p>
				<p id="nama-detail" name="nama-detail"> </p>
				<p id="kelas-detail" name="kelas-detail"> </p>
			</ul>
		</div>

		<input type="hidden" name="status-id" id="status-id" />

	</div>
	</div>
</div>
</div>

<!-- TUTUP MODAL DETAIL -->





<script type="text/javascript" language="javascript">
	$(document).ready(function(){

		function getListPerusahaan()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getListPerusahaan'},
				success:function(data)
				{
					$('#id_industri').html(data);
				}
			});
		}


		function getMahasiswa()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getMahasiswaPanitia'},
				success:function(data)
				{
					$('tbody').html(data);
				}
			});
		}

		getMahasiswa();

		getListPerusahaan();

		$('#add-button').click(function(){
					$('#user_form')[0].reset();
					$('#action').val('Add');
					$('#data_action').val("insertPendaftaran");
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
                    getMahasiswa();
                    if($('#data_action').val() == "insertPendaftaran")
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
            data:{id:id, data_action:'tampilDetailMahasiswa'},
            dataType:"json",
            success:function(data)
            {
        				$('#modal-edit').modal('show');     
								$('#status-edit').val(data.status);      
                $('.modal-title').text('Edit Status');
                $('#id_mahasiswa').val(id);
                $('#action_edit').val('Edit');

								var status = document.getElementById('status-edit').value;

								if(status == '1'){
									$('#magang').html('<option value="1" id="magang">Magang</option>');
									$('#bimbingan').html('<option value="2" id="bimbingan">Bimbingan</option>');
									$('#sidang').html('<option value="3" id="sidang" selected>Sidang</option>');
								}
								else if(status == '2'){
									$('#magang').html('<option value="1" id="magang">Magang</option>');
									$('#bimbingan').html('<option value="2" id="bimbingan" selected>Bimbingan</option>');
									$('#sidang').html('<option value="3" id="sidang">Sidang</option>');
								}
								else if(status == '3'){
									$('#magang').html('<option value="1" id="magang">Magang</option>');
									$('#bimbingan').html('<option value="2" id="bimbingan">Bimbingan</option>');
									$('#sidang').html('<option value="3" id="sidang" selected>Sidang</option>');
								}
								else{
									$('#magang').html('<option value="1" id="magang">Magang</option>');
									$('#bimbingan').html('<option value="2" id="bimbingan">Bimbingan</option>');
									$('#sidang').html('<option value="3" id="sidang">Sidang</option>');
								}


								$('#data_action').val('updateStatusMahasiswa');


      			}
        })
    });

		$(document).on('submit', '#edit_form', function(event){
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
									
                    $('#edit_form')[0].reset();
                    $('#modal-edit').modal('hide');
                    getMahasiswa();
                    if($('#data_action').val() == "updateStatusMahasiswa")
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
		

		$(document).on('click', '.detail', function(){
        var id = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{id:id, data_action:'tampilDetailMahasiswa'},
            dataType:"json",
            success:function(data)
            {
							$('#modal-detail').modal('show'); 
							$('#status-id').val(data.status); 
							$('#nim-detail').html('<li class="list-group-item" id="nim" name="nim">Nim : '+data.nim+'</li>');          
							$('#nama-detail').html('<li class="list-group-item" id="nama" name="nama">Nama : '+data.nama+'</li>');
							$('#kelas-detail').html('<li class="list-group-item" id="kelas" name="kelas">Kelas : '+data.kelas+'</li>');
							$('.modal-title').text('Detail Mahasiswa');


							var status = document.getElementById('status-id').value;

							if(status == '1'){
								$('#step-1').html('<a href="#step-9" type="button" class="btn btn-success btn-circle" id="step-1">1</a>');
								$('#step-2').html('<a href="#step-9" type="button" class="btn btn-default btn-circle" id="step-2">2</a>');
								$('#step-3').html('<a href="#step-9" type="button" class="btn btn-default btn-circle" id="step-3">3</a>');
							}
							else if(status == '2'){
								$('#step-1').html('<a href="#step-9" type="button" class="btn btn-success btn-circle" id="step-1">1</a>');
								$('#step-2').html('<a href="#step-9" type="button" class="btn btn-success btn-circle" id="step-2">2</a>');
								$('#step-3').html('<a href="#step-9" type="button" class="btn btn-default btn-circle" id="step-3">3</a>');
							}
							else if(status == '3'){
								$('#step-1').html('<a href="#step-9" type="button" class="btn btn-success btn-circle" id="step-1">1</a>');
								$('#step-2').html('<a href="#step-9" type="button" class="btn btn-success btn-circle" id="step-2">2</a>');
								$('#step-3').html('<a href="#step-9" type="button" class="btn btn-success btn-circle" id="step-3">3</a>');
							}
							else{
								$('#step-1').html('<a href="#step-9" type="button" class="btn btn-default btn-circle" id="step-1">1</a>');
								$('#step-2').html('<a href="#step-9" type="button" class="btn btn-default btn-circle" id="step-2">2</a>');
								$('#step-3').html('<a href="#step-9" type="button" class="btn btn-default btn-circle" id="step-3">3</a>');
							}
						
				


						}
        })
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
		

		$(document).on('click', '.delete', function(){
					var id = $(this).attr('id');
					if(confirm("Are you sure you want to delete this?"))
					{
							$.ajax({
									url:"<?php echo base_url(); ?>test_api/action",
									method:"POST",
									data:{id:id, data_action:'deleteMahasiswa'},
									dataType:"JSON",
									success:function(data)
									{
											if(data.success)
											{
													$('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
													getMahasiswa();
											}
									}
							})
					}
			});

	});


	//TEP
	$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-indigo').addClass('btn-default');
            $item.addClass('btn-indigo');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepSteps = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            prevStepSteps.removeAttr('disabled').trigger('click');
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i< curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-indigo').trigger('click');
});

</script>


