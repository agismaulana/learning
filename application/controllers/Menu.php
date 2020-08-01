<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_M');
    }

    public function index()
    {
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        $data = [
            'profile' => $profile,
            'title' => 'Menu',
            'isi' => 'menu/index',
            'menu' => $this->Menu_M->show(),
        ];
        $this->load->view('template/wrapper.php',$data);
    }

    public function tambah(){
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'Tambah Menu',
                'isi' => 'menu/tambah',
            ];
            $this->load->view('template/wrapper.php',$data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama')),
            ]; 

            $this->Menu_M->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('menu');
        }
    }

    public function edit($id){
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'Edit Menu',
                'isi' => 'menu/edit',
                'menu' => $this->Menu_M->detail($id),
            ];
            $this->load->view('template/wrapper.php',$data);
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'nama' => htmlspecialchars($this->input->post('nama')),
            ];
            $this->Menu_M->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('menu');
        }
        
    }

    public function delete($id){
            $this->Menu_M->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
            redirect('menu');
    }

}

/* End of file Menu.php */


?>