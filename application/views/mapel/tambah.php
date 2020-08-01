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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Mapel</h6>
            </div>
            <form action="<?= base_url('mapel/tambah');?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan Judul">
                </div>
                <div class="form-group">
                    <label for="isi">isi</label>
                    <textarea name="isi" id="isi" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="custom-select">
                        <option selected>Pilih Kelas</option>
                        <option value="1">Kelas 1</option>
                        <option value="2">Kelas 2</option>
                        <option value="3">Kelas 3</option>
                        <option value="4">Kelas 4</option>
                        <option value="5">Kelas 5</option>
                        <option value="6">Kelas 6</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="date" class="form-control" name="waktu" id="waktu">
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('mapel');?>" class="btn btn-secondary"> <i class="fa fa-undo-alt"></i> Kembali</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid --> 