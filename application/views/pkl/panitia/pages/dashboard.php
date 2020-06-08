<div class="container-fluid"> 
 <!-- Small boxes (Stat box) -->
 	<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="jmh_mahasiswa"> </h3>
                <p>Jumlah Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo site_url("pkl_panitia/mahasiswa")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="jmh_bimbingan"></h3>
                <p>Jumlah Dosen</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url("pkl_panitia/dosen")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
					</div>
					
					<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="jmh_industri"></h3>
                <p>Jumlah Industri</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url("pkl_panitia/perusahaan")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
		
		function getJumlahIndustri()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'jumlahIndustri'},
				success:function(data)
				{
					$('#jmh_industri').html(data);
				}
			});
		}

		getJumlahIndustri();
	});


</script>
