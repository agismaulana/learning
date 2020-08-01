<?php 

require_once "header.php";
if($this->session->userdata('nisn')){
    require_once "sidebar.php";
    require_once "navbar.php";
}
require_once "content.php";
require_once "footer.php";


?>