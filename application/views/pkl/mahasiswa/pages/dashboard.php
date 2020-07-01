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
			<li class="list-group-item">Nama&nbsp;: Ramona Matovani</li>
			<li class="list-group-item">NIM 		: 4617010021</li>
			<li class="list-group-item">Kelas		: TI 6A</li>
			<li class="list-group-item">Perusahaan	: Bukalapak.com</li>
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
			<li class="list-group-item">Kode 				: 2331</li>
			<li class="list-group-item">Dosen Pembimbing	: Risna Sari, M.Kom</li>
			<li class="list-group-item">Dosen Industri		: Hatta maulana, M.TI</li>
			<li class="list-group-item">Kode Industri		: Bukalapak.com</li>
			</ul>
	</div>
	</div>
</td>
</tr>
</table>

	<!-- Small boxes (Stat box) -->
	<div class="row">

		<!-- ./col -->
		<div class="col-md-12">
			<!-- small box -->
			
				<div class="col-md-4">
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

				<div class="col-md-8 row">
					<div class="card col-md-12" >
						<div class="card-body">
							<h3 class="card-title"> <strong> Detail Mahasiswa </strong></h3>
						</div>

						<tbody>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">Nama		: </li>
								<li class="list-group-item">NIM 		: </li>
								<li class="list-group-item">Kelas		: </li>
								<li class="list-group-item">Perusahaan	: </li>
							</ul>
						</tbody>
					</div>
					
					<div class="card col-md-12">
						<div class="card-body">
							<h3 class="card-title"> <strong> Detail Perusahaan </strong></h3>
						</div>

						<tbody>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">Nama Perusahaan	: </li>
								<li class="list-group-item">Alamat		: </li>
								<li class="list-group-item">No.Telf	: </li>

							</ul>
						</tbody>
					</div>
				</div>
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
				<a href="<?php echo site_url("pkl_mahasiswa/riwayat_bimbingan")?>" type="button" class="btn btn-success btn-circle" disabled="disabled">2</a>
				<p>Bimbingan 1</p>
			</div>
			<div class="steps-step">
				<a href="<?php echo site_url("pkl_mahasiswa/jadwalsidang")?>" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
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

		$(document).ready(function(){
			var nim = $(this).attr('id');
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{nim:nim, data_action:'tampilDetailMahasiswa'},
				dataType:"json",
				success:function(data)
				{
					$('#modal-detail').modal('show'); 
					$('#nim').html('<li class="list-group-item" id="nim" name="nim">Nim : '+nim+'</li>');          
					$('#nama').html('<li class="list-group-item" id="nama" name="nama">Nama : '+data.nama+'</li>');
					$('.modal-title').text('Detail Mahasiswa');
				}
			})
		});


	});
</script>