<div class="container-fluid"> 
 <!-- Small boxes (Stat box) -->
 	<div class="row">

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="jmh_bimbingan"></h3>
                <p>Riwayat Bimbingan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url("pkl_mahasiswa/riwayat_bimbingan")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
					</div>
					
					<div class="col-lg-3 col-6">
						<div class="card" style="width: 40rem;">
						<div class="card-body">
							<h3 class="card-title"> <strong> Detail Mahasiswa </strong></h3>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Nama		: Ramona Matovani</li>
							<li class="list-group-item">NIM 		: 4617010021</li>
							<li class="list-group-item">kelas		: TI 6A</li>
						</ul>
						</div>
          </div>

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

<script type="text/javascript" language="javascript">
	$(document).ready(function(){

		function getJumlahMahasiswa()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'jumlahMahasiswa'},
				success:function(data)
				{
					$('#jmh_mahasiswa').html(data);
				}
			});
		}

		getJumlahMahasiswa();
	});

	$(document).ready(function(){
		
		function getJumlahBimbingan()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'jumlahBimbingan'},
				success:function(data)
				{
					$('#jmh_bimbingan').html(data);
				}
			});
		}

		getJumlahBimbingan();
	});


</script>
