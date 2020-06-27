 
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

<!-- MODAL DETAIL DATA -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		
	<div class="card">
	<div class="card-body mb-4">

	<div class="card" style="width: 25rem;">
	<div class="card-body">
		<h3 class="card-title"> <strong> Detail Mahasiswa </strong></h3>
	</div>
	<ul class="list-group list-group-flush">
		<li class="list-group-item">Nama		: Ramona Matovani</li>
		<li class="list-group-item">NIM 		: 4617010021</li>
		<li class="list-group-item">kelas		: TI 6A</li>
	</ul>
	</div>

		<!-- Steps form -->
    <h2 class="text-center font-weight-bold pt-4 pb-5"><strong>Status Mahasiswa</strong></h2>
    <hr class="my-5">
    <!-- Stepper -->
    <div class="steps-form">
      <div class="steps-row setup-panel">
        <div class="steps-step">
          <a href="#step-9" type="button" class="btn btn-success btn-circle">1</a>
          <p>Magang</p>
        </div>
        <div class="steps-step">
          <a href="#step-10" type="button" class="btn btn-success btn-circle" disabled="disabled">2</a>
          <p>Bimbingan 1</p>
        </div>
        <div class="steps-step">
          <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>Bimbingan 2</p>
        </div>
        <div class="steps-step">
          <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>Bimbingan 3</p>
        </div>
        <div class="steps-step">
          <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>Sidang</p>
        </div>
      </div>
    </div>

	</div>
	</div>
</div>
</div>

<!-- TUTUP DETAIL TAMBAH DATA -->





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


		function fetch_data()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getMahasiswa'},
				success:function(data)
				{
					$('tbody').html(data);
				}
			});
		}

		fetch_data();

		getListPerusahaan();

		$('#add-button').click(function(){
					$('#user_form')[0].reset();
					$('#action').val('Add');
					$('.modal-title').text('Tambah Data');
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
                    fetch_data();
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
            data:{id:id, data_action:'tampilMahasiswa'},
            dataType:"json",
            success:function(data)
            {
        				$('#modal-tambah').modal('show');           
                $('#nim').val(data.nim);
                $('#nilai').val(data.nilai);
                $('.modal-title').text('Edit Data');
                $('#user_id').val(id);
                $('#action').val('Edit');
        				$('#data_action').val('updateMahasiswa');

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


