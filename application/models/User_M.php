<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_M extends CI_Model {

    public function tambah($data){
        $tambah = $this->db->insert('user', $data);
    }

    public function show(){
        $this->db->select('user.*,level.nama as level');
        $this->db->from('user');
        $this->db->join('level','level.id=user.level_id');
        $user = $this->db->get()->result_array();
        return $user;
    }

    public function detail($id){
        $this->db->select('user.*,level.nama as level');
        $this->db->from('user');
        $this->db->join('level','level.id = user.level_id');
        $this->db->where('user.id', $id);
        $detail = $this->db->get()->row_array();
        return $detail;
    }

    public function update($data){
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        $this->db->update('user');
    }

    public function simpanExcel($data = []) {
        $jumlah = count($data);
        if($jumlah > 0){
            $this->db->insert_batch('user', $data);
        }
    }

    public function delete($id){
        $this->db->delete('user',['id' => $id]);
    }

}

/* End of file User_M.php */

?>