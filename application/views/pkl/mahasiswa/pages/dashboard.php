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
		</div>

<table>
<tr>
<td>

	<div class="col-lg-3 col-6">
	<div class="card" style="width: 30rem;">
		<div class="card-body">
		<h3 class="card-title"> <strong> Detail Mahasiswa </strong></h3>
		</div>
		<ul class="list-group list-group-flush">
			<p id="nim-detail" name="nim-detail"> </p>
			<p id="nama-detail" name="nama-detail"> </p>
			<p id="kelas-detail" name="kelas-detail"> </p>
		</ul>
	</div>
	</div>
</div>
</td>
<td>
	<div class="col-lg-3 col-6">
	<div class="card" style="width: 30rem;">
		<div class="card-body">
		<h3 class="card-title"> <strong> Detail Perusahaan </strong></h3>
		</div>
		<ul class="list-group list-group-flush">
			<p id="nama-industri" name="nama-industri"> </p>
			<p id="alamat-industri" name="alamat-industri"> </p>
			<p id="telp-industri" name="telp-industri"> </p>
		</ul>
	</div>
	</div>
</td>
</tr>
</table>

	<!-- Steps form -->
	<h2 class="text-center font-weight-bold pt-4 pb-5"><strong>Status Mahasiswa</strong></h2>
	<hr class="my-5">
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

<script type="text/javascript" language="javascript">

	var id = "1";


	$(document).ready(function(){


		function getDetailMahasiswa()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{id:id, data_action:'tampilDetailMahasiswa'},
				dataType:"json",
				success:function(data)
				{
					$('#nim-detail').html('<li class="list-group-item" id="nim" name="nim">Nim : '+data.nim+'</li>');          
					$('#nama-detail').html('<li class="list-group-item" id="nama" name="nama">Nama : '+data.nama+'</li>');
					$('#kelas-detail').html('<li class="list-group-item" id="kelas" name="kelas">Kelas : '+data.kelas+'</li>');
				}
			});
		}

		function getDetailPerusahaanMahasiswa()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{id:id, data_action:'getDetailPerusahaanMahasiswa'},
				dataType:"json",
				success:function(data)
				{
					$('#nama-industri').html('<li class="list-group-item" id="nama-industri" name="nama-industri">Nama : '+data.nama+'</li>');          
					$('#alamat-industri').html('<li class="list-group-item" id="alamat-industri" name="alamat-industri">Nama : '+data.alamat+'</li>');
					$('#telp-industri').html('<li class="list-group-item" id="telp-industri" name="telp-industri">No Telp : '+data.telp+'</li>');
				}
			});
		}

		getDetailMahasiswa();
		getDetailPerusahaanMahasiswa();
		getJumlahBimbingan();
		getStatusMahasiswa();


		
		function getJumlahBimbingan()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{id:id, data_action:'jumlahBimbingan'},
				success:function(data)
				{
					$('#jmh_bimbingan').html(data);
				}
			});
		}

		function getStatusMahasiswa()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{id:id, data_action:'tampilDetailMahasiswa'},
				dataType:"json",
				success:function(data)
				{
					var status = data.status;

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
			});
		}

		




	});


</script>
