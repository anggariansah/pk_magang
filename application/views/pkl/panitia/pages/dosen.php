<div class="container-fluid"> 
 <!-- Small boxes (Stat box) -->
 <div class="card-body">
	<table class="table table-bordered table-striped" id="example1">
	<thead>
			<tr>
				<th>No.</th>
				<th>Nama Dosen</th>
				<th>NIP</th>
				<th>Mahasiswa yang Dibimbing</th>
			</tr>
		</thead>
		<tbody>
				
		</tbody>
	</table>
</div>
</div>


<script type="text/javascript" language="javascript">
	$(document).ready(function(){

		function fetch_data()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>test_api/action",
				method:"POST",
				data:{data_action:'listmhs_dosen'},
				success:function(data)
				{
					$('tbody').html(data);
				}
			});
		}

		fetch_data();

	});

</script>
