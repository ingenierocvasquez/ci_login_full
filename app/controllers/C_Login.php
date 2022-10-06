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

        if ($this->session->userdata('status') === '0') {
            $this->session->set_flashdata( 'msg', '<div class="alert alert-danger">Usuario Inactivo</div>');
            $this->view_login();
        } else {    


            $i = $this->session->userdata('status');

            switch ($i) {
                case '1':
                    //$data['img_header'] = base_url() . 'assets/images/logo.png';
                    $this->load->view('template/header', $data);
                    $this->load->view('template/navbar');
                    $this->load->view('pages/panel', $data);
                    $this->load->view('template/footer');
                    break;
                case "2":
                    //$data['img_header'] = base_url() . 'assets/images/logo.png';
                    //$this->load->view('plantilla_admin/header', $data);
                    //$this->load->view('V_tablero_principal', $data);
                    //$this->load->view('plantilla_admin/footer');
                    break;
                case "3":
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

            $user = $this->M_Login->login_database($username, $password);
            if ($user && count($user) === 1) {
                
                foreach($user as $item)
				{
					$session = array(
						'status' => $item['status'],
						'is_logged_in' => true,
					);			
				 }
                $this->session->set_userdata($session);

                $this->index();
            } else {

                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">Acceso denegado - nombre de usuario o contraseña incorrectos.</div>'
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
        $data['title'] = 'App-Login';
        //$data['img_header'] = base_url() . 'assets/images/logo.png';

        $this->load->view('template/header', $data);
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
