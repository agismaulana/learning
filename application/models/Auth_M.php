<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_M extends CI_Model {

    public function login($data){
        $query = $this->db->get_where('user', [
            'nisn' => $data['nisn'], 
        ])->row_array();
        return $query;
    }

}

/* End of file Auth_M.php */



?>