<section class="content">
<div class="container-fluid">
    		<div class="row">
        <!-- left column -->
				<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary">
				<div class="card-header">
				<h3 class="card-title">Riwayat Bimbingan</h3>
				</div>
				<br>

					<!-- Main content -->
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="col-lg-12" id="card_riwayat">

								</div>
							</div>							
						</div>
					</div>

</div>

<script type="text/javascript" language="javascript">

	$(document).ready(function(){
		
		function getRiwayatBimbingan()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getRiwayatBimbingan'},
				success:function(data)
				{
					$('#card_riwayat').html(data);
				}
			});
		}

		getRiwayatBimbingan();
	});


</script>
