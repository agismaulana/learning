

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-8 d-none d-lg-block">
            <img src="<?= base_url('image\logo\Tut Wuri Handayani Logo_vectrostudio.jpg')?>" alt="image" style="width:100%;height:100%;">
          </div>
          <div class="col-lg-4">
            <div class="py-5 px-4">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">SDN Pondok Petir 01</h1>
              </div>
              <?php
                if($this->session->flashdata('message')){
                  echo $this->session->flashdata('message');
                } 
              ?>
              <form action="<?= base_url('auth/login')?>" method="post" class="user">
                <div class="form-group">
                  <input type="text" name="nisn" class="form-control form-control-user" id="nisn" aria-describedby="emailHelp" placeholder="Masukkan NISN">
                  <?= form_error('nisn', '<p class="text-danger">','</p>');?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Masukkan Password">
                  <?= form_error('password', '<p class="text-danger">','</p>');?>
                </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block col-8 mx-auto mb-3">
                  Login
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>