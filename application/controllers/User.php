<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();

        $this->load->model('User_M');
        $this->load->model('Level_M');

    }

    public function index()
    {
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        $data = [
            'profile' => $profile,
            'title' => 'User',
            'isi' => 'user/index',
            'user' => $this->User_M->show(),
        ];
        $this->load->view('template/wrapper.php',$data);
    }

    public function detail($id){
        $session = $this->session->userdata('nisn');
        $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
        $data = [
            'profile' => $profile,
            'title' => 'Detail User',
            'isi' => 'user/detail',
            'detail' => $this->User_M->detail($id),
        ];
        $this->load->view('template/wrapper.php',$data);
    }

    public function tambah(){
        
        $this->form_validation->set_rules('nisn', 'NISN', 'trim|required');
        $this->form_validation->set_rules('nama', 'NISN', 'trim|required');
        $this->form_validation->set_rules('kelas', 'NISN', 'trim|required');
        $this->form_validation->set_rules('alamat', 'NISN', 'trim|required');
        
        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'User',
                'isi' => 'user/tambah',
                'level' => $this->Level_M->show(),
            ];
            $this->load->view('template/wrapper.php',$data);
        } else {
            
            $data = [
            'nisn'      => htmlspecialchars($this->input->post('nisn')),
            'nama'      => htmlspecialchars($this->input->post('nama')),
            'kelas'     => htmlspecialchars($this->input->post('kelas')),
            'alamat'    => htmlspecialchars($this->input->post('alamat')),
            'password'  => sha1('pontir01oke'),
            'level_id'     => $this->input->post('level'),
            ];

            $this->User_M->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil ditambahkan</div>');
            redirect('user');
           
            if($this->input->post('upload') == 'upload'){
                $config['upload_path'] = './exce/';
                $config['allowed_types'] = 'xlsx|xls';
                $config['upload_path'] = 'doc'.time();

                $this->load->library('upload', $config);

                if($this->upload->do_upload('excel')){
                    $file = $this->upload->data();

                    $reader = ReaderFactory::create(Type::XLSX);
                    $reader->open('excel/'.$file['file_name']);
                    
                    foreach($reader->getSheetIterator() as $sheet){
                        $numRow = 1;

                        $save = array();

                        foreach($sheet->getSheetIterator() as $row){
                            if($numRow > 1){
                                $data = [
                                    'nisn' => $row[0],
                                    'nama' => $row[1],
                                    'kelas' => $row[2],
                                    'alamat' => $row[3],
                                    'password' => sha1('pontir01oke'),
                                    'level_id' => 2,
                                ];

                                array_push($save, $data);
                            }

                            $numRow++;
                        }

                        $this->user_M->simpanExcel($save);

                        $reader->close();

                        unlink('excel'.$file['file_name']);

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil ditambahkan</div>');
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal ditambahkan</div>');
                    redirect('user');
                }
            }
        }
    }

    public function edit($id){
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if($this->form_validation->run() == FALSE){
            $session = $this->session->userdata('nisn');
            $profile = $this->db->get_where('user', ['nisn' => $session])->row_array();
            $data = [
                'profile' => $profile,
                'title' => 'User',
                'isi' => 'user/edit',
                'edit' => $this->User_M->detail($id),
                'level' => $this->Level_M->show(),
            ];
            $this->load->view('template/wrapper.php',$data);
        } else {
            $data = [
                'id' => htmlspecialchars($this->input->post('id')),
                'nisn' => htmlspecialchars($this->input->post('nisn')),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'kelas' => htmlspecialchars($this->input->post('kelas')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'level_id' => htmlspecialchars($this->input->post('level')),
            ];

            $this->User_M->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('user');
        }
    }

    public function delete($id){
        $this->User_M->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('user');
    }

}

/* End of file User.php */


?>