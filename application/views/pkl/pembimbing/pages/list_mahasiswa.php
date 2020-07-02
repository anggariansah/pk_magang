
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
	<table class="table table-bordered table-striped" id="example1">
	<thead>
			<tr>
				<th>Nim</th>
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


<<!-- MODAL DETAIL -->
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

	var nip = "12345";

	$(document).ready(function(){

		function tampilDataMahasiswa()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{nip:nip, data_action:'getMahasiswaPembimbing'},
				success:function(data)
				{
					$('tbody').html(data);
				}
			});
		}

		tampilDataMahasiswa();


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


