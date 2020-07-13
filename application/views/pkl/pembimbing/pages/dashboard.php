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
              <a href="<?php echo site_url("pkl_pembimbing/list_mahasiswa")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
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
              <a href="<?php echo site_url("pkl_pembimbing/bimbingan")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

		</div>
</div>

<script type="text/javascript" language="javascript">

	var nip =  <?php echo $this->session->userdata('nip_pembimbing');?>;

	$(document).ready(function(){
	
		function getJumlahMahasiswa()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{nip:nip, data_action:'jumlahMahasiswaPembimbing'},
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
				data:{nip:nip, data_action:'jumlahBimbinganPembimbing'},
				success:function(data)
				{
					$('#jmh_bimbingan').html(data);
				}
			});
		}

		getJumlahBimbingan();
	});


</script>
