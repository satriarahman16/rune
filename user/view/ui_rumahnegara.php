<!-- Main content -->
<section class="content">



  <!-- Default box -->
  <div class="card">
    <div class="card-header d-flex justify-content-between">
    <div>
        <div>
        <h3 class="card-title text-right">Tabel Rumah Negara</h3>
        </div>
    </div>
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>NUP</th>
        <th>Kode Unit</th>
        <th>Status Validasi</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
    foreach($asets as $u){
    ?>
        <tr class="border-b dark:border-neutral-500">
            <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $u->kode_barang;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->nama_barang;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->nup;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->kode_unit;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->status_validasi;?></td>
            <td class="whitespace-nowrap px-6 py-4">
           
                <div class="btn-group">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Validasi</button>
                  <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal2">Detail Rumah Negara</a>
                    <!-- <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal3">Detail Relasi Tanah</a> -->
                  </div>
                </div>
              
                </td>
        
            </tr>

        <!-- Modal Validasi-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Aset Rumah Negara ini Datanya sudah valid?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <button type="button" name= "submit_valid" class="btn btn-success">Valid</button>
        <button type="button" class="btn btn-danger">Tidak Valid</button>
      </div>      
    </div>
  </div>
</div>

   <!-- Modal Detail RN-->
   <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h5 class="modal-title" id="exampleModalLabel">Detail Rumah Negara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="whitespace-nowrap">Alamat : <?php echo $u->alamat;?></p>      
        <p class="whitespace-nowrap">Koordinat : 
        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $u->lat_long;?>" target="_blank"><?php echo $u->lat_long;?> -> Koordinat di Google Maps</a></p>
        <p class="whitespace-nowrap">Status Penggunaan : <?php echo $u->status_penggunaan;?></p>
        <p class="whitespace-nowrap">Kondisi : <?php echo $u->kondisi;?></p>
        <p class="whitespace-nowrap">luas_rn : <?php echo $u->luas_rn;?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- 
    Modal Detail Relasi Tanah
   <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Relasi Tanah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->




    <?php
        }
    ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>

    function bukaPopup(obj){
            Swal.fire({
                title: 'Apakah yakin ingin hapus data?',
                showDenyButton: true,
                confirmButtonText: 'Hapus',
                denyButtonText: 'Tidak',
            }).then(result=>{
                if(result.isConfirmed){
                    Swal.fire('Sukses Hapus!', '', 'success')
                    window.location = obj.href;
                }else if(result.isDenied){
                    Swal.fire('Batal hapus', '', 'info')
                }
            });
            event.preventDefault();
    }

</script>
