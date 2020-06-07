
 <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

 <!-- Daftar perusahaan nya -->
	<table cellspacing="7">
		  <tr>
		  
		 </tr>

	</table>
<!-- end daftar perusahaannya -->

<script type="text/javascript" language="javascript">
	$(document).ready(function(){

		function getPerusahaan()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'getPerusahaan'},
				success:function(data)
				{
					$('tr').html(data);
				}
			});
		}

		getPerusahaan();
	});

</script>
