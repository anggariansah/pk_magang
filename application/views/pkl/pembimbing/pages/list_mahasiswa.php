
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
<div class="modal fade" id="modal-detail">
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
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
		<li class="list-group-item" id="nama" name="nama"> </li>
		<li class="list-group-item" id="nim" name="nim"> </li>
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

<!-- TUTUP MODAL TAMBAH DATA -->


<script type="text/javascript" language="javascript">
	$(document).ready(function(){

		function tampilDataMahasiswa()
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

		tampilDataMahasiswa();


		$(document).on('click', '.detail', function(){
        var nim = $(this).attr('nim');
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{nim:nim, data_action:'tampilDetailMahasiswa'},
            dataType:"json",
            success:function(data)
            {
							$('#modal-detail').modal('show');           
							$('#nim').val(nim);
							$('#nama').val(data.nama);
							$('.modal-title').text('Detail Mahasiswa');
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


