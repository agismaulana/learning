<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_M extends CI_Model {

    public function show(){
        return $this->db->get('mapel')->result_array();
    }

    public function tambah($data){
        $this->db->insert('mapel', $data);
    }

    public function detail($id){
        $this->db->select('mapel.*, user.nama as namaGuru');
        $this->db->from('mapel');
        $this->db->join('user','user.id = mapel.user_id');
        $this->db->where('mapel.id', $id);
        return $this->db->get()->row_array();
    }

    public function whereKelas($kelas){
        $this->db->select('mapel.*, user.nama as namaGuru');
        $this->db->from('mapel');
        $this->db->join('user', 'user.id = mapel.user_id');
        $this->db->where('mapel.kelas', $kelas);
        return $this->db->get()->result_array();
    }

    public function resultId($id){
        return $this->db->get_where('mapel', ['id' => $id])->result_array();
    }

    public function resultDetail(){
        $this->db->select('mapel.*, user.nama as namaGuru');
        $this->db->from('mapel');
        $this->db->join('user','user.id = mapel.user_id');
        return $this->db->get()->result_array();
    }

    public function update($data){
        $this->db->set($data);
        $this->db->where('id', $data['id']);
        $this->db->update('mapel');
    }

    public function delete($id){
        $this->db->delete('mapel',['id' => $id]);
    }

}

/* End of file Mapel_M.php */


?>