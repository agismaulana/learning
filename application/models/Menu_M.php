<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_M extends CI_Model {

    public function show(){
        return $this->db->get('menu')->result_array();
    }

    public function showNoAdmin(){
        $this->db->where('id !=', 1);
        return $this->db->get('menu')->result_array();
    }

    public function tambah($data){
        $this->db->insert('menu', $data);
    }

    public function detail($id){
        return $this->db->get_where('menu', ['id' => $id])->row_array();
    }

    public function update($data){
        $this->db->where('id', $data['id']);
        $this->db->update('menu', ['nama' => $data['nama']]);
    }

    public function delete($id){
        $this->db->delete('menu', ['id' => $id]);
    }

}

/* End of file Menu_M.php */


?>