<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('Level_M');
        $this->load->model('Menu_M');
    }

    public function index()
    {
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        $data = [
            'profile' => $profile,
            'title' => 'Level',
            'isi' => 'level/index',
            'level' => $this->Level_M->show(),
        ];
        $this->load->view('template/wrapper.php',$data);
    }

    public function tambah(){
        
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]');

        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'Tambah Level',
                'isi' => 'level/tambah',
            ];
            $this->load->view('template/wrapper.php',$data);
        } else {
            $nama = htmlspecialchars($this->input->post('nama'));
            $query = $this->Level_M->tambah($nama);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Telah Ditambahkan</div>');
            redirect('level');
        }
    }

    public function edit($id){
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'Edit Level',
                'isi' => 'level/edit',
                'level' => $this->Level_M->detail($id),
            ];
            $this->load->view('template/wrapper.php',$data);
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
            ];

            $this->Level_M->update($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Telah Di Ubah</div>');
            redirect('level');
        }
    }

    public function delete($id){
        $this->Level_M->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Telah Di Hapus</div>');
        redirect('level');
    }

    public function access($id){
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        $data = [
            'profile' => $profile,
            'title' => 'Access Level',
            'isi' => 'level/access',
            'level' => $this->Level_M->detail($id),
            'menu' => $this->Menu_M->showNoAdmin(),
        ];
        $this->load->view('template/wrapper.php',$data);
    }

    public function changeAccess(){
        $menuId = $this->input->post('menuId');
        $levelId = $this->input->post('levelId');
        
        $data = [
            'level_id' => $levelId,
            'menu_id' => $menuId,
        ];

        $this->Level_M->access($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Akses Telah Di Ganti</div>');
    }

}

/* End of file Level.php */


?>