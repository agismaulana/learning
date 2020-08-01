<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pengumuman extends CI_Controller {
    
        public function __construc(){
            parent::__construct();
            is_logged_in();
            $this->load->model('Pengumuman_M');
        }

        public function index()
        {
            
        }
    
    }
    
    /* End of file Pengumuman.php */
    

?>