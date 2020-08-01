<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Menu</h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
            </div>
            <!-- Card Body -->
            <form action="<?= base_url('menu/tambah')?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="Nama" class="form-control" name="nama" placeholder="Masukkan Nama">
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('menu');?>" class="btn btn-secondary"><i class="fa fa-undo-alt"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>