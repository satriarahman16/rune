<!-- Main content -->
<section class="content">

<div class="container-fluid">

<div class="row">
<div class="col-md-6">
<!-- general form elements -->

<div class="card card-primary">

<div class="card-header">
    <h3 class="card-title">Edit User</h3>
</div>

<!-- /.card-header -->
 <!-- form start -->
  <form method="POST" >
    <div class="card-body">

      <div class="form-group">
        <label for="exampleInputEmail1">NIP</label>
        <input type="text" class="form-control" name="nip" placeholder="NIP" value="<?php echo $user->nip?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $user->nama?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Peran</label>
        <select class="form-control" name="peran">
            <option selected>--Pilih Peran--</option>
            <option value="admin">Admin</option>
            <option value="pengguna">Pengguna</option>
            <option value="pengelola">Pengelola</option>
            </select>
        </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Kode Unit</label>
        <input type="text" class="form-control" name="kode_unit" placeholder="Kode Unit" value="<?php echo $user->kode_unit?>">
      </div>

      <div class="form-group">
         <label for="exampleInputPassword1">Password</label>
         <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $user->password?>">
      </div>

    </div>

 <!-- /.card-body -->

 <div class="card-footer">
        <button type="submit" name="submit_update" values="SIMPAN" class="btn btn-primary">Simpan</button>
    </div>

  <!-- </form>
</div>
<!-- /.card -->
<!-- </div> -->

<!-- /.row -->
</div><!-- /.container-fluid -->

