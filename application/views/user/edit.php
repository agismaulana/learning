<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Area Card-->
        <div class="col-xl-6 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header-->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
                </div>
                <!-- Card Body -->
                <form action="<?= base_url('user/edit/'.$edit['id'])?>" method="post">
                <div class="card-body">
                    <input type="hidden" name="id" id="id" value="<?= $edit['id'];?>">
                    <div class="form-group">
                        <label for="nisn"><h5>NISN</h5></label>
                        <input type="text" name="nisn" id="nisn" class="form-control" value="<?= $edit['nisn']?>" placeholder="Masukkan Nisn">
                        <?= form_error('nama', '<p class="text-danger">', '</p>')?>
                    </div>
                    <div class="form-group">
                        <label for="nama"><h5>Nama</h5></label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $edit['nama']?>" placeholder="Masukkan Nama">
                        <?= form_error('nama', '<p class="text-danger">', '</p>')?>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $edit['kelas']?>" placeholder="Masukkan Kelas">
                        <?= form_error('kelas', '<p class="text-danger">', '</p>')?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"><?= $edit['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <select name="level" id="level" class="custom-select">
                            <option value="<?= $edit['level_id']?>"><?= $edit['level']?></option>
                            <?php foreach($level as $l) { ?>
                            <option value="<?= $l['id']?>"><?= $l['nama']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('user');?>" class="btn btn-secondary"><i class="fa fa-undo-alt"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid --> 