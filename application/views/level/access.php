<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Level</h1>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
    <div class="col-xl-6 col-lg-12">
        <h5>Level : <?= $level['nama'];?></h5>
        <div class="card shadow mb-4">
            <!-- Card Header-->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Access Data Level</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?php if($this->session->flashdata('message')){?>
                    <?= $this->session->flashdata('message');?>
                <?php } ?>
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th class="col">Nama</th>
                        <th class="col">Access</th>
                    </tr>
                    <?php foreach($menu as $m) { ?>
                    <tr>
                        <td><?= $m['nama'];?></td>
                        <td>
                            <div class="form-check text-center">
                                <input type="checkbox" class="form-check-input" <?= checkAccess($level['id'], $m['id']);?> data-level="<?= $level['id']?>" data-menu="<?= $m['id']?>">
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('level');?>" class="btn btn-secondary"> <i class="fa fa-undo-alt"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid --> 