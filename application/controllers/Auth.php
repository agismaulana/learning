<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_M');
    }

    public function login()
    {
        
        if($this->session->userdata('nisn')){
            redirect('home');
        }

        $data = [
            'title' => 'Login',
            'isi' => 'auth/login',
        ];
        
        $this->form_validation->set_rules('nisn', 'NISN', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/wrapper', $data);
        } else {
            $data = [
                'nisn' => $this->input->post('nisn'),
            ];
            $query = $this->Auth_M->login($data);
            if($query){
                $password = sha1($this->input->post('password'));
                $hash = $query['password'];
                if($password == $hash){
                    
                    $data = [
                        'nisn' => $query['nisn'],
                        'level_id' => $query['level_id'],
                    ];

                    $this->db->where('nisn', $data['nisn']);
                    $this->db->update('user',['active' => 1]);
                    
                    $this->session->set_userdata($data);
                    
                    redirect('/');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Akun Tidak Ada</div>');
                redirect('auth/login');
            }
        }
    }

    public function logout(){
        $this->db->where('nisn', $this->session->userdata('nisn'));
        $this->db->update('user', ['active' => 0]);
        $this->session->unset_userdata('nisn');
        $this->session->unset_userdata('level_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Anda Telah Keluar</div>');
        redirect('auth/login');
    }

    public function blocked(){
        $data = ['title' => 'Access Blocked'];
        $this->load->view('template/header',$data);
        $this->load->view('auth/blocked');
        $this->load->view('template/footer');
    }

}

/* End of file Auth.php */


?>