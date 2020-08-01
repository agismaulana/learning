<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Pelajaran</h1>
</div>

<!-- Content Row -->

<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4" style="overflow-y: auto;">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Isi</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
          <h3 class="text-center"><?= $mapel['title']?></h3>
          <?= $mapel['isi']?>
      </div>
    </div>
  </div>

  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tugas</h6>
      </div>
      <?php if($tugas) {?>
      <?= form_open_multipart('pelajaran/update/'.$tugas['id']);?>
      <div class="card-body">
        <input type="hidden" name="id" id="id" value="<?= $tugas['id'];?>">
        <div class="form-group">
          <textarea name="isi" id="isi" cols="5" rows="5">
            <?= $tugas['isi']?>
          </textarea>
        </div>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="inputGroupFile">
            <?php if($tugas['image'] == '') { ?>
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <?php } else {?>
            <label class="custom-file-label" for="inputGroupFile01"><?= $tugas['image'];?></label>
            <?php } ?>
          </div>
        </div>
        <p class="text-danger">*Upload File tipe jpg/png/pdf/docx</p>
      </div>
      <?php } else {?>
      <?= form_open_multipart('pelajaran/isi/'.$mapel['id']);?>
      <div class="card-body">
        <div class="form-group">
          <textarea name="isi" id="isi" cols="5" rows="5"></textarea>
        </div>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="inputGroupFile">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
        </div>
        <p class="text-danger">*Upload File tipe jpg/png/pdf/docx</p>
      </div>
      <?php } ?>
      <div class="card-footer">
        <button class="btn btn-primary mt-2" type="submit">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->