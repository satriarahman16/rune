<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header d-flex justify-content-between">
    <div>
        <div>
      <h3 class="card-title text-right">Tabel Penghuni Rumah Negara</h3>
      </div>
         </div>
    </div>


    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
        <th>Nama Penghuni</th>
        <th>NIP</th>
        <th>Jabatan</th>
        <th>Pangkat/Golongan</th>
        <th>Kode Unit</th>
        <th>Asal/Instansi</th>
        </tr>
        </thead>
        <tbody>
        <?php
    foreach($kumpulanPenghuni as $u){
    ?>
        <tr class="border-b dark:border-neutral-500">
            <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $u->nama;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->nip;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->jabatan;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->pangkat_gol;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->kode_unit;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->asal;?></td>
            
                    </td>
        </tr>
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
