<!-- Main content -->
<section class="content">
<?php
    $ar_prop = array(
        '0'=>'---Pilih Peran---',
        '1'=>'Pengelola',
        '2'=>'Pengguna'
    );

?>
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Tes Form</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form class="form-horizontal" method="POST">>
            <div class="card-body">
              <div class="form-group row">
                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                  <input type="nip" class="form-control" id="nip" value="<?php echo $user->nip ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="nama" class="form-control" id="nama" value="<?php echo $user->nama ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Submit</button>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card -->

</section>
<!-- /.content -->
