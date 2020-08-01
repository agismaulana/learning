<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelajaran</h1>
    </div>

    <div class="row">
        <?php foreach($mapel as $m) { ?>
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('image/mapel/book-PNG.png');?>" class="card-img" alt="Gambar">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?= base_url('pelajaran/isi/'.$m['id'])?>" class="text-dark"><?= $m['title']?></a>
                            </h5>
                            <p class="card-text"><?= substr($m['isi'], 0, 50);?></p>
                            <p class="card-text"><small class="text-muted"><?= $m['namaGuru']?></small></p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text">Waktu Penggumpulan <?= date($m['waktu'])?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>
<!-- /.container-fluid -->