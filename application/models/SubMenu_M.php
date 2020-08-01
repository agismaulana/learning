<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class SubMenu_M extends CI_Model {

    public function show(){
        return $this->db->get('submenu')->result_array();
    }

    public function detail($id){
        $this->db->select('submenu.*,menu.nama as menu');
        $this->db->from('submenu');
        $this->db->join('menu', 'menu.id = submenu.menu_id');
        $this->db->where('submenu.id', $id);
        return $this->db->get()->row_array();
    }

    public function tambah($data){
        $this->db->insert('submenu', $data);
    }

    public function update($data){
        $this->db->set($data);
        $this->db->where('id', $data['id']);
        $this->db->update('submenu');
    }

    public function delete($id){
        $this->db->delete('submenu', ['id' => $id]);
    }
}

/* End of file SubMenu_M.php */



?>