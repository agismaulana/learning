<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajaran_M extends CI_Model {

    public function tugas($data){
        $this->db->insert('tugas', $data);
    }

    public function show($mapelId, $userId){
        return $this->db->get_where('tugas', ['mapel_id' => $mapelId, 'user_id' => $userId])->row_array();
    }

    public function result($id){
        $this->db->select('tugas.*, user.nama as siswa, mapel.title as mapel');
        $this->db->from('tugas');
        $this->db->join('user', 'user.id = tugas.user_id');
        $this->db->join('mapel', 'mapel.id = tugas.mapel_id');
        $this->db->where('user.id', $id);
        return $this->db->get()->result_array();
    }

    public function whereLevel($id,$level){
        $this->db->select('tugas.*, user.nama as siswa, mapel.title as mapel');
        $this->db->from('tugas');
        $this->db->join('user', 'user.id = tugas.user_id');
        $this->db->join('mapel', 'mapel.id = tugas.mapel_id');
        $this->db->where(['user.id' => $id, 'level' => $level]);
        return $this->db->get()->result_array();
    }

    public function update($data){
        $this->db->where('id',$data['id']);
        $this->db->set($data);
        $this->db->update('tugas');
    }

}

/* End of file Pelajaran_M.php */


?>