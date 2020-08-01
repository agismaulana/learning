<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">User</h1>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
    <div class="col-xl-6 col-lg-12">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
        </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-dark" style="font-size:20px;font-weight:bold;">
                    <p>NISN     : <?= $detail['nisn']?></p></br>
                    <p>Nama     : <?= $detail['nama'];?></p></br>
                    <p>Kelas    : <?= $detail['kelas'];?></p></br>
                    <p>Alamat   : <?= $detail['alamat'];?></p></br>
                    <p>Level    : <?= $detail['level'];?></p></br>
                    <p>Aktif    : <?php if($detail['active']){ echo"Online";}else{ echo "Offline";}?></p></br>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('user')?>" class="btn btn-secondary"><i class="fa fa-undo-alt"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid --> 