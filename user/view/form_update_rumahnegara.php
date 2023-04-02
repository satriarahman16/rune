<!-- Main content -->
<section class="content">

<div class="container-fluid">

<div class="row">
<div class="col-md-6">
<!-- general form elements -->

<div class="card card-primary">

<div class="card-header">
    <h3 class="card-title">Edit Rumah Negara</h3>
</div>

<!-- /.card-header -->
 <!-- form start -->
  <form method="POST" >
    <div class="card-body">

      <div class="form-group">
        <label for="exampleInputEmail1">Kode Barang</label>
        <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" value="<?php echo $aset->kode_barang?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="<?php echo $aset->nama_barang?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">NUP</label>
        <input type="text" class="form-control" name="nup" placeholder="Nama Barang" value="<?php echo $aset->nup?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Kode Unit</label>
        <input type="text" class="form-control" name="kode_unit" placeholder="Kode Unit" value="<?php echo $aset->kode_unit?>">
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

