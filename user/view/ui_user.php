<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabel User</h3>
    </div>

    <div class="card-tambah">
    <a class="text-sky-500
        transition duration-150 ease-in-out 
        hover:text-sky-600 focus:text-sky-600 
        active:text-sky-700" 
    href="<?php echo URL_Helper::createLink('user/user_controller','add',null);?>"
    >Buat User</a>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Role</th>
        <th>Kode Unit</th>
        <th>Password</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
    foreach($users as $u){
    ?>
        <tr class="border-b dark:border-neutral-500">
            <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $u->nip;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->nama;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->peran;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->kode_unit;?></td>
            <td class="whitespace-nowrap px-6 py-4"><?php echo $u->password;?></td>
            <td class="whitespace-nowrap px-6 py-4">
                        <a 
                            class="text-amber-500
                                    transition duration-150 ease-in-out 
                                    hover:text-amber-600 focus:text-amber-600 
                                    active:text-amber-700"                 
                            href="<?php echo URL_HELPER::createLink('user/user_controller','update',array('nip'=>$u->nip)) ?>">
                                Edit
                        </a>
                        <a 
                            id="hapus"
                            onclick="bukaPopup(this)"
                            class="text-red-500
                                    transition duration-150 ease-in-out 
                                    hover:text-red-600 focus:text-red-600 
                                    active:text-red-700"
                            href="<?php echo URL_HELPER::createLink('user/user_controller','delete',array('nip'=>$u->nip)) ?> ?>" >Hapus</a>
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
