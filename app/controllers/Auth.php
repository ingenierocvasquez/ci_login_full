<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth extends CI_Controller
{
    /* construct */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_auth');        
    }

    /* index Method */
    public function index()
    {
        
        if ($this->session->userdata('is_logged_in')):
            $data = array(
            );
        endif;

        if ($this->session->userdata('status') === '0') {
            $this->session->set_flashdata( 'msg', '<div class="alert alert-danger">Usuario Inactivo</div>');
            $this->view_login();
        } else {    


            $i = $this->session->userdata('rol_user');

            switch ($i) {
                case '1':
                    $data['title'] = 'App-Solicitudes-Administrador';
                    $this->load->view('template/header', $data);
                    $this->load->view('template/navbar');
                    $this->load->view('pages/panel', $data);
                    $this->load->view('template/footer');
                    break;
                case "2":
                    $data['title'] = 'App-Solicitudes-Estudiante';
                    $this->load->view('template/header', $data);
                    $this->load->view('template/navbar');
                    $this->load->view('pages/panel', $data);
                    $this->load->view('template/footer');
                   
                    break;
                case "3":
                    
                    break;
                default:
                    $this->view_login();
            }
        }
    }

     /* login Method */
    public function login()
    {

        $this->form_validation->set_rules("usuario", "Usuario", "trim|required");
        $this->form_validation->set_rules("password", "Clave", "trim|required|min_length[5]");

        $username = $this->input->post('usuario');
        $password = md5((string) $this->input->post('password'));
        $url = $this->input->post('url');

        if ($this->form_validation->run() == true) {

            $user = $this->Model_auth->login_database($username, $password);
            if ($user && count($user) === 1) {
                
                foreach($user as $item)
				{
					$session = array(
                        'username' => $item['username'],
						'status' => $item['status'],
                        'rol_user' => $item['rol_user'],
                        'lastname' => $item['lastname'],
                        'firstname' => $item['firstname'],
                        'email' => $item['email'],
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
        $data['title'] = 'App-Solicitudes';
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
