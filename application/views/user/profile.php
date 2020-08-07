<div class="container">
    <div class="card mb-3 col-md-8 p-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('image/user/user.png');?>" class="card-img" alt="Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nama : <?= $detail['nama'];?></h5>
                    <p class="card-text">Kelas : <?= $detail['kelas'];?></p>
                    <p class="card-text">Alamat : <?= $detail['alamat'];?></p>
                    <p class="card-text">Level : <?= $detail['level'];?></p>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('');?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>