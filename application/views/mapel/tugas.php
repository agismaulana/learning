<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Mapel</h1>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12 mx-auto">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Yang Mengumpulkan Tugas</h6>
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
                            <th>File</th>
                            <th>Title</th>
                            <th>Siswa</th>
                            <th>Isi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>File</th>
                            <th>Title</th>
                            <th>Siswa</th>
                            <th>Isi</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $no = 1; 
                                foreach($tugas as $t) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $t['image']; ?></td>
                                <td><?= $t['mapel'];?></td>
                                <td><?= $t['siswa'];?></td>
                                <td><?= $t['isi'];?></td>
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