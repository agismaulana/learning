<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Level</h1>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
    <div class="col-xl-6 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header-->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Level</h6>
            </div>
            <!-- Card Body -->
            <form action="<?= base_url('level/tambah')?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama"><h5>Nama</h5></label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
                    <?= form_error('nama', '<p class="text-danger">', '</p>')?>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('level');?>" class="btn btn-secondary"><i class="fa fa-undo-alt"></i> kembali</a>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid --> 