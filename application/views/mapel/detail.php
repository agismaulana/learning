<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Mapel</h1>
</div>

<div class="row">

    <div class="col-xl-10 col-lg-12 mr-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data Mapel</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="col-8">
                        <h4><?= $mapel['title'];?></h4>
                        <p><?= $mapel['isi']?></p>
                    </div>
                    <div class="col-4">
                        <img src="<?= base_url('image/mapel/book-PNG.png');?>" alt="gambar" class="rounded-circle" style="width:100px;">
                        <p>Guru pengajar : <?= $mapel['namaGuru']?></p>
                        <p>Waktu Pengumpulan : <?= $mapel['waktu']?></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('mapel');?>" class="btn btn-secondary"> <i class="fa fa-undo-alt"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid --> 