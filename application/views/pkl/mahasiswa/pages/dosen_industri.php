<div class="container-fluid"> 

<!-- TABEL TAMBAH DATA DOSEN -->
 <div class="card-body">
 	<span id="success_message"></span>
  <br>
	<button id="add-button" type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
  <br>
  <br>

  <table class="table table-bordered table-striped" id="example1">
  <thead>
      <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Kode Industri</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
</div>
</div>

         <!-- MODAL TAMBAH DATA -->
<div class="modal fade" id="modal-tambah">
<div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
						<form method="post" id="user_form">
              <div class="form-group">
                <input type="number" name="kode" id="kode" class="form-control" placeholder="Kode" value="">
              </div>
              <div class="form-group">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="">
              </div>
              <div class="form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="">
              </div>
              <div class="form-group">
                <input type="number" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="">
              </div>

              <div class="modal-footer">
							<input type="hidden" name="user_id" id="user_id" />
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="data_action" id="data_action" value="Insert" />
							<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
							</div>
              </form>
            </div>
            </div>
          </div>
          </div>
        <!-- TUTUP MODAL TAMBAH DATA -->

      <script type="text/javascript" language="javascript">
        $(document).ready(function(){

          function getDosenindustri()
          {
            $.ajax({
              url:"<?php echo base_url(); ?>test_api/action",
              method:"POST",
              data:{data_action:'getDosenindustri'},
              success:function(data)
              {
                $('tbody').html(data);
              }
            });
          }

          getDosenindustri();

          });

      </script>
