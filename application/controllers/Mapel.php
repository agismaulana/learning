<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('Mapel_M');
    }

    public function index()
    {
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        if($profile['level_id'] > 1){
            $data = [
                'profile' => $profile,
                'title' => 'Mapel',
                'isi'   => 'mapel/index',
                'mapel' => $this->Mapel_M->resultId($profile['id']),
            ];
        } else {
            $data = [
                'profile' => $profile,
                'title' => 'Mapel',
                'isi' => 'mapel/index',
                'mapel' => $this->Mapel_M->show(),
            ];
            
        }
        $this->load->view('template/wrapper', $data);
    }

    public function tugas($id)
    {
        $this->load->model('Pelajaran_M');
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        if($profile['level_id'] > 1){
            $data = [
                'profile' => $profile,
                'title' => 'Mapel',
                'isi'   => 'mapel/tugas',
                'tugas' => $this->Pelajaran_M->whereLevel($id, $profile['level_id']),
            ];
        } else {
            $data = [
                'profile' => $profile,
                'title' => 'Mapel',
                'isi' => 'mapel/tugas',
                'tugas' => $this->Pelajaran_M->result($id),
            ]; 
        }
        $this->load->view('template/wrapper', $data);
    }

    public function detail($id){
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        $data = [
            'profile' => $profile,
            'title' => 'Mapel',
            'isi' => 'mapel/detail',
            'mapel' => $this->Mapel_M->detail($id),
        ];
        $this->load->view('template/wrapper', $data);
    }

    public function tambah(){
        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'Tambah Mapel',
                'isi' => 'mapel/tambah',
            ];
            $this->load->view('template/wrapper', $data);
        } else {
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'title'  => htmlspecialchars($this->input->post('title')),
                'isi'    => $this->input->post('isi'),
                'kelas'  => $this->input->post('kelas'),
                'user_id'=> $profile['id'],
                'waktu'  => $this->input->post('waktu'),
            ];

            $this->Mapel_M->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Telah Ditambahkan</div>');
            redirect('mapel');
        }
    }

    public function edit($id){

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'Mapel',
                'isi' => 'mapel/edit',
                'mapel' => $this->Mapel_M->detail($id),
            ];
            $this->load->view('template/wrapper', $data);
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'title' => htmlspecialchars($this->input->post('title')),
                'isi' => $this->input->post('isi'),
            ]; 

            $this->Mapel_M->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('mapel');
        }
    }

    public function delete($id){
        $this->Mapel_M->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Telah Dihapus</div>');
        redirect('mapel');
    }
}

/* End of file Mapel.php */



?>