<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home');?>">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('image\logo\Tut Wuri Handayani Logo_vectrostudio.png');?>" alt="image" style="width:50px;">
    </div>
    <div class="sidebar-brand-text mx-1">SDN Pontir <sup>01</sup></div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php 
    $level = $this->session->userdata('level_id');
    $menu = "SELECT `menu`.`id`, `menu`.`nama`
               FROM `menu` JOIN `accessmenu`
                 ON `menu`.`id` = `accessmenu`.`menu_id`
              WHERE `accessmenu`.`level_id` = $level
           ORDER BY `accessmenu`.`menu_id` ASC
    ";
    $queryMenu = $this->db->query($menu)->result_array();

  ?>
  

  <!-- Heading -->
  <?php foreach($queryMenu as $m) { ?>
    <div class="sidebar-heading">
      <?= $m['nama'];?>
    </div>

    <?php 
      $menuId = $m['id'];
      $subMenu = "SELECT `submenu`.*
                    FROM `submenu` JOIN `menu`
                      ON `submenu`.`menu_id` = `menu`.`id`
                   WHERE `menu`.`id` = $menuId
                     AND `submenu`.`is_active` = 1
      ";
      $querySubMenu = $this->db->query($subMenu)->result_array();
    
    ?>

    <?php foreach($querySubMenu as $sm) { ?>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url($sm['url']);?>">
          <i class="<?= $sm['icon']?>"></i>
          <span><?= $sm['nama'];?></span></a>
      </li>
    <?php } ?>

    <hr class="sidebar-divider d-none d-md-block">

  <?php } ?>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->