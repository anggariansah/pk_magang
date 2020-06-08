<div class="container-fluid"> 

<!-- TABEL TAMBAH DATA SIDANG -->
 <div class="card-body">
  <span id="success_message"></span>
  <br>
  <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus-circle"></i> Tambah Data</a>
  <br>
  <br>

  <table class="table table-bordered table-striped" id="example1">
  <thead>
      <tr>
        <th>Tanggal Sidang</th>
        <th>Dosen</th>
        <th>Ruangan</th>
        <th>Mahasiswa</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
</div>
</div>

         <!-- MODAL TAMBAH DATA -->
          <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form" action="" id="userform" method="POST">
              <div class="form-group">
                <input type="date" name="nilai" class="form-control" placeholder="Tanggal Sidang" value="">
              </div>
              <div class="form-group">
                <input type="text" name="nilai" class="form-control" placeholder="Dosen" value="">
              </div>
              <div class="form-group">
              <select name="" class="custom-select">
                <option selected>Ruangan</option>
                <option>AA201</option>
                <option>AA202</option>
                <option>AA203</option>
                <option>AA204</option>
                <option>AA301</option>
                <option>AA302</option>
                <option>AA303</option>
                <option>AA304</option>
                <option>AA304</option>
              </select>
              </div>
              <div class="form-group">
                <input type="text" name="nilai" class="form-control" placeholder="Mahasiswa" value="">
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" id="action" name="action" class="btn btn-primary" values="Save changes">
              </div>
              </form>
            </div>
            </div>
          </div>
          </div>
        <!-- TUTUP MODAL TAMBAH DATA -->

          <script type="text/javascript" language="javascript">
            $(document).ready(function(){

              function getSidang()
              {
                $.ajax({
                  url:"<?php echo base_url(); ?>test_api/action",
                  method:"POST",
                  data:{data_action:'getSidang'},
                  success:function(data)
                  {
                    $('tbody').html(data);
                  }
                });
              }

              getSidang();
            });

            $(document).on('click', '.delete', function(){
            var id = $(this).attr('id');
            if(confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>test_api/action",
                    method:"POST",
                    data:{id:id, data_action:'deleteSidang'},
                    dataType:"JSON",
                    success:function(data)
                    {
                        if(data.success)
                        {
                            $('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
                            getSidang();
                        }
                    }
                })
            }
              });

						</script>
