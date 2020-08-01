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
            <h6 class="m-0 font-weight-bold text-primary">Data Sub Menu</h6>
        </div>
            <!-- Card Body -->
            <div class="card-body">
                <h4>Nama : <?= $subMenu['nama'];?></h4>
                <h4>Url : <?= $subMenu['url'];?></h4>
                <h4>Icon : <?= $subMenu['icon'];?></h4>
                <h4>Menu : <?= $subMenu['menu'];?></h4>
                <h4>Aktif : <?php
                                if($subMenu['is_active'] == 1){
                                   echo 'Aktif';
                                } else {
                                   echo 'Tidak Aktif';
                                }
                            ?>
                </h4>
                <a href="<?= base_url('SubMenu')?>" class="btn btn-secondary"> <i class="fa fa-undo-alt"></i> kembali</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid --> 