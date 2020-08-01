<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class SubMenu extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('SubMenu_M');
        $this->load->model('Menu_M');
    }

    public function index()
    {
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        $data = [
            'profile' => $profile,
            'title' => 'Sub Menu',
            'isi' => 'subMenu/index',
            'subMenu' => $this->SubMenu_M->show(),
        ];
        $this->load->view('template/wrapper.php',$data);
    }

    public function detail($id){
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        $data = [
            'profile' => $profile,
            'title' => 'Sub Menu Detail',
            'isi' => 'subMenu/detail',
            'subMenu' => $this->SubMenu_M->detail($id),
        ];
        $this->load->view('template/wrapper.php',$data);
    }

    public function tambah(){
        $this->form_validation->set_rules('nama','Nama','trim|required');
        $this->form_validation->set_rules('url','Url','trim|required');
        $this->form_validation->set_rules('iconNama', 'Icon', 'trim|required');

        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'Sub Menu Detail',
                'isi' => 'subMenu/tambah',
                'menu' => $this->Menu_M->show(),
            ];
            $this->load->view('template/wrapper.php',$data);
        } else { 
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama')),
                'url' => htmlspecialchars($this->input->post('url')),
                'icon' => htmlspecialchars($this->input->post('icon').' '.$this->input->post('iconNama')),
                'is_active' => htmlspecialchars($this->input->post('aktif')),
                'menu_id' => htmlspecialchars($this->input->post('menu')),
            ];

            $this->SubMenu_M->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('subMenu');
        }
    }

    public function edit($id){
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('url', 'Url', 'trim|required');
        $this->form_validation->set_rules('iconNama', 'Icon', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'Sub Menu Detail',
                'isi' => 'subMenu/edit',
                'subMenu' => $this->SubMenu_M->detail($id),
                'menu' => $this->Menu_M->show(),
            ];
            $this->load->view('template/wrapper.php',$data);
        } else {
            $data = [
                'id'        => $this->input->post('id'),
                'nama'      => htmlspecialchars($this->input->post('nama')),
                'url'       => htmlspecialchars($this->input->post('url')),
                'icon'      => $this->input->post('icon').' '.htmlspecialchars($this->input->post('iconNama')),
                'is_active' => $this->input->post('aktif'),
                'menu_id'   => $this->input->post('menu'),
            ];

            $this->SubMenu_M->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('subMenu');
        }
    }

    public function delete($id){
        $this->SubMenu_M->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('subMenu');
    }
}

/* End of file SubMenu.php */


?>