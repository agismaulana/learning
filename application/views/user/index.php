<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">User</h1>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12 mx-auto">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            <a href="<?= base_url('user/tambah');?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah User</a>
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
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Aktif</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Aktif</th>
                            <th>Aksi</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $no = 1; 
                                foreach($user as $u) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $u['nisn']; ?></td>
                                <td><?= $u['nama']; ?></td>
                                <td>
                                        <?php 
                                        if($u['active'] == 1){
                                            echo '<div class="badge badge-success">Online</div>'; 
                                        } else { 
                                            echo '<div class="badge badge-danger">Offline</div>'; }?>
                                </td>
                                <td>
                                    <a href="user/detail/<?= $u['id']?>" class="btn btn-warning">
                                       <i class="fa fa-info"></i> Detail
                                    </a>
                                    <a href="user/edit/<?= $u['id'];?>" class="btn btn-success">
                                        <i class="fa fa-edit" onclick="return confirm('Yakin?');"></i> Edit
                                    </a>
                                    <a href="user/delete/<?= $u['id'];?>" class="btn btn-danger" onclick="return confirm('yakin?')">
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