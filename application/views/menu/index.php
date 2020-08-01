<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Menu</h1>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12 mx-auto">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
            <a href="<?= base_url('menu/tambah');?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Menu</a>
        </div>
            <!-- Card Body -->
            <div class="card-body">
                <?php 
                    if($this->session->flashdata('message')){
                        echo $this->session->flashdata('message');
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0" style="font-size:20px;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $no = 1; 
                                foreach($menu as $m) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $m['nama']; ?></td>
                                <td>
                                    <a href="menu/edit/<?= $m['id'];?>" class="btn btn-success" onclick="return confirm('Yakin?');">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="menu/delete/<?= $m['id'];?>" class="btn btn-danger" onclick="return confirm('yakin?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid --> 