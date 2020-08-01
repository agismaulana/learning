<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_M extends CI_Model {
    
    public function show(){
        $level = $this->db->get('level')->result_array();
        return $level;
    }

    public function tambah($nama) {
        $tambah = $this->db->insert('level',['nama' => $nama]);
        return $tambah;
    }

    public function detail($id){
        $detail = $this->db->get_where('level', ['id' => $id])->row_array();
        return $detail;
    }

    public function update($data){
        $this->db->where('id', $data['id']);
        $this->db->update('level', ['nama' => $data['nama']]);
    }

    public function delete($id){
        $this->db->delete('level', ['id' => $id]);
    }

    public function access($data){
        $result = $this->db->get_where('accessmenu', $data);

        if($result->num_rows() < 1){
            $this->db->insert('accessmenu', $data);
        } else {
            $this->db->delete('accessmenu', $data);
        }
    }
}

/* End of file Level_M.php */


?>