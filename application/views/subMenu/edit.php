<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Sub Menu</h1>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
    <div class="col-xl-6 col-lg-12 mr-auto">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Sub Menu</h6>
            </div>
            <!-- Card Body -->
            <form action="<?= base_url('subMenu/edit/'. $subMenu['id']);?>" method="post">
            <div class="card-body">
                <input type="hidden" name="id" id="id" value="<?= $subMenu['id'];?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $subMenu['nama']?>">
                    <?= form_error('nama', '<p class="text-danger">', '</p>');?>
                </div>
                <div class="form-group">
                    <label for="nama">Url</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Masukkan Url" value="<?= $subMenu['url'];?>">
                    <?= form_error('url', '<p class="text-danger">', '</p>');?>
                </div>
                <div class="form-group">
                    <label for="nama">Icon</label>
                    <div class="d-flex">
                        <?php
                            $iconMenu = $subMenu['icon'];
                            $icon = explode(' ', $iconMenu);
                        ?>
                        <select class="custom-select col-3" name="icon" id="icon">
                            <option value="<?= $icon[0]?>"><?= $icon[0];?></option>
                            <option value="fa">fa</option>
                            <option value="fas">fas</option>
                            <option value="fab">fab</option>
                        </select>
                        <input type="text" class="form-control col-9" placeholder="Masukkan Icon"  name="iconNama" id="iconNama" value="<?= $icon[1].' '.$icon[2];?>">
                    </div>
                    <?= form_error('icon', '<p class="text-danger">', '</p>');?>
                </div>
                <div class="form-group">
                    <label for="nama">Aktif</label>
                    <select name="aktif" id="aktif" class="custom-select">
                        <option value="<?= $subMenu['is_active']?>"><?php if($subMenu['is_active']){echo 'Aktif';} else { echo 'Tidak Aktif';}?></option>
                        <option value="1">Aktif</option>
                        <option value="2">Tidak Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Menu</label>
                    <select name="menu" id="menu" class="custom-select">
                        <option value="<?= $subMenu['menu_id']?>"><?= $subMenu['menu'];?></option>
                        <?php foreach($menu as $m){?>
                        <option value="<?= $m['id']?>"><?= $m['nama']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('subMenu');?>" class="btn btn-secondary"> <i class="fa fa-undo-alt"></i> kembali</a>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-check"></i> Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid --> 