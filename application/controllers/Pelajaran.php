<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajaran extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('Mapel_M');
        $this->load->model('Pelajaran_M');
    }

    public function index()
    {
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        $kelas = $profile['kelas'];
        $level = $profile['level_id'];

        if($level > 1){
            $data = [
                'profile' => $profile,
                'title' => 'Pelajaran',
                'isi' => 'pelajaran/index',
                'mapel' => $this->Mapel_M->whereKelas($kelas),
            ];
        } else {
            $data = [
                'profile' => $profile,
                'title' => 'Pelajaran',
                'isi' => 'pelajaran/index',
                'mapel' => $this->Mapel_M->resultDetail(''),
            ];
        }
            
        $this->load->view('template/wrapper', $data);
    }

    public function isi($id)
    {
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $kelas = $profile['kelas'];

            $data = [
                'profile' => $profile,
                'title' => 'Pelajaran',
                'isi' => 'pelajaran/isi',
                'mapel' => $this->Mapel_M->detail($id),
                'tugas' => $this->Pelajaran_M->show($id, $profile['id']),
            ];

            $this->load->view('template/wrapper', $data);
        } else { 
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            
            $image = $_FILES['image']['name'];

            if($image){
                $config['upload_path']          = './image/tugas/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|docx';
                $config['max_size']             = 200;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image'))
                {
                    $newFile = $this->upload->data('file_name');
                }
            }

            $data = [
                'mapel_id'  => $id,
                'user_id'   => $profile['id'],
                'image'     => $image,
                'isi'       => $this->input->post('isi'),
            ];

            $this->Pelajaran_M->tugas($data);
            redirect('pelajaran');
        }
    }

    public function update($id){
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            
        $image = $_FILES['image']['name'];

        if($image){
            $config['upload_path']          = './image/tugas/';
            $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
            $config['max_size']             = 2000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image'))
            {
                $newFile = $this->upload->data('file_name');        
            }
        }

        $data = [
            'id'        => $id,
            'image'     => $image,
            'isi'       => $this->input->post('isi'),
        ];

        $this->Pelajaran_M->update($data);
        redirect('pelajaran');
    }

}

/* End of file Pelajaran.php */



?>