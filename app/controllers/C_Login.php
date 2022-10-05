<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_Login extends CI_Controller
{
    /* construct */
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('M_paginas');
        $this->load->model('M_Login');
    }

    /* index Method */
    public function index()
    {

        if ($this->session->userdata('is_logged_in')):
            //$data['img_header'] = base_url() . 'assets/images/logo.png';
            $data = array(
            );
        endif;

        if ($this->session->userdata('user_type') === '0') {
            $this->session->set_flashdata( 'msg', '<div class="alert alert-danger">Usuario Inactivo</div>');
            $this->view_login();
        } else {
            $i = $this->session->userdata('user_type');

            switch ($i) {
                case 'administrador':
                    //$data['img_header'] = base_url() . 'assets/images/logo.png';
                    //$this->load->view('plantilla_admin/header', $data);
                    //$this->load->view('V_tablero_principal', $data);
                    //$this->load->view('plantilla_admin/footer');
                    break;
                case "lprass":
                    //$data['img_header'] = base_url() . 'assets/images/logo.png';
                    //$this->load->view('plantilla_admin/header', $data);
                    //$this->load->view('V_tablero_principal', $data);
                    //$this->load->view('plantilla_admin/footer');
                    break;
                case "prestador":
                    //$data['img_header'] = base_url() . 'assets/images/logo.png';
                    //$this->load->view('plantilla_admin/header', $data);
                    //$this->load->view('V_tablero_principal', $data);
                    //$this->load->view('plantilla_admin/footer');
                    break;
                default:
                    $this->view_login();
            }
        }
    }

     /* access_validate Method */
    public function access_validate()
    {

        $this->form_validation->set_rules("usuario", "Usuario", "trim|required");
        $this->form_validation->set_rules("password", "Clave", "trim|required|min_length[5]");

        $username = $this->input->post('usuario');
        $password = md5($this->input->post('password'));
        $url = $this->input->post('url');

        if ($this->form_validation->run() == true) {

            $user = $this->M_Login->LoginBD($username, $password);
            if ($user && count($user) == 1) {
                $session = array(
                    'doc_user' => $user->doc_user,
                    'user_id' => $user->user_id,
                    'user_type' => $user->user_type,
                    'regional' => $user->regional,
                    'ncompleto' => $user->ncompleto,
                    'des_user_type' => $user->des_user_type,                    
                    'is_logged_in' => true,
                );

                $this->session->set_userdata($session);

                $this->index();
            } else {

                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">Usuario y/o Password Invalido</div>'
                );
                $this->view_login();
            }
        } else {
            $this->view_login();
        }
    }

    /* view_login Method */
    public function view_login()
    {
        //$data['home'] = 'SEGUIMIENTO TOMA DE MUESTRA';
        //$data['img_header'] = base_url() . 'assets/images/logo.png';

        $this->load->view('template/header');
        $this->load->view('pages/login');
        $this->load->view('template/footer');
    }

    /* logout Method */
    public function logout()
    {
        if ($this->session->userdata('is_logged_in')) {
            $this->session->sess_destroy();
            redirect(base_url() . 'login');
        }
    }

   
}
