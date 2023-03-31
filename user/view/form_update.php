<section class="content">
  

<?php
    $ar_prop = array(
        '0'=>'---Pilih Peran---',
        '1'=>'Pengelola',
        '2'=>'Pengguna'
    );

?>
<div class="container-fluid">

<div class="row">
<div class="col-md-6">
<!-- general form elements -->

<div class="card card-primary">

<div class="card-header">
    <h3 class="card-title">Quick Example</h3>
</div>

<!-- /.card-header -->
 <!-- form start -->
  <form method="POST">
    <div class="card-body">
      <div class="form-group">

                    <label for="exampleInputEmail1">Email address</label>

                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputPassword1">Password</label>

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

                  </div>

                </div>

                <!-- /.card-body -->




                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>

              </form>

            </div>

            <!-- /.card -->

        </div>

        <!-- /.row -->

      </div><!-- /.container-fluid -->
</div>

</section>
<form method="POST">
    <div class="flex justify-center flex-col">
        <!-- NIK -->
        <div class="mb-3 w-96">
            <label
            for="nip"
            class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
            >NIP</label
            >
            <input
                name="nip"
                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding py-[0.32rem] px-3 text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-sky focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-sky focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
                type="text"
                id="nip"
                value="<?php echo $user->nip?>" />
        </div>
        <!-- nama -->
        <div class="mb-3 w-96">
            <label
            for="nama"
            class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
            >Nama</label
            >
            <input
                name="nama"
                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding py-[0.32rem] px-3 text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-sky focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-sky focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
                type="text"
                id="nama" 
                value="<?php echo $user->nama?>"
                />
        </div>
        
        <!-- propinsi -->
        <div class="mb-3 w-96">
            <label
            for="peran"
            class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
            >Peran</label>
            <select
                name="peran"
                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding py-[0.32rem] px-3 text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-sky focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-sky focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
            >
                <?php
                    foreach($ar_prop as $nip=>$peran){
                        $selected = ($nip==$user->peran)?'selected':'';
                        // echo '<option '.$selected.' value="'.$id.'" >'.$nama_propinsi.'</option>';
                        echo '<option '.$selected.' value="'.$peran.'" >'.$peran.'</option>';
                    }
                ?>
            </select>
        </div>
        <!-- alamat -->
        <div class="mb-3 w-96">
            <label
            for="kode_unit"
            class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
            >Kode Unit</label
            >
            <input
                name="kode_unit"
                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding py-[0.32rem] px-3 text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-sky focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-sky focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
                type="text"
                id="kode_unit" 
                value="<?php echo $user->kode_unit?>"
            />
        </div>
        <div class="mb-3 w-96">
            <label
            for="password"
            class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
            >Password</label
            >
            <input
                name="password"
                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding py-[0.32rem] px-3 text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-sky focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-sky focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
                type="password"
                id="password" 
                value="<?php echo $user->password?>"
            />
        </div>
        <!-- Tombol simpan -->
        <div class="mb-3 w-96">
            <input type="submit" name="submit" value="SIMPAN" 
            <!-- class="inline-block rounded bg-sky-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-sky-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-sky-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-sky-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" /> -->
        </div>
    </div>
</form>