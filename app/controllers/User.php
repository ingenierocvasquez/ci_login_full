	<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('session');
    }

    public function _salida_datos($output = null)
    {
 
        $data['title'] = 'App-Solicitudes';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('pages/data', $output);
        $this->load->view('template/footer');

        if ($this->session->userdata('is_logged_in') == false) {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $this->_salida_datos((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));

        if ($this->session->userdata('is_logged_in') == false) {
            redirect(base_url() . 'login');
        }
    }

    public function main()
    {
        try {
            $crud = new grocery_CRUD();

            $crud->set_table('user');

            $crud->set_subject('Registro de Usuarios');
            $crud->display_as('username', 'Usuario: ');
            $crud->display_as('password', 'Contraseña: ');
            $crud->display_as('at_create', 'Fecha de Registro: ');
            $crud->display_as('status', 'Estado: ');
            $crud->display_as('email', 'Correo Eletronico: ');
            $crud->set_rules('email', 'Correo Eletronico', 'required|valid_email');
            $crud->display_as('rol_user', 'Rol del Usuario: ');
            $crud->display_as('lastname', 'Apellidos: ');
            $crud->display_as('firstname', 'Nombres: ');
            $crud->display_as('datebirth', 'Fecha de Nacimiento: ');
            $crud->display_as('grade', 'Grado: ');    
            $crud->display_as('movil', 'Numero de Celular: '); 
            $crud->field_type('at_create', 'hidden');
            $crud->field_type('status', 'true_false');
            $crud->unique_fields(array('username'));
            $crud->required_fields('username','password');
         
            $i = $this->session->userdata('rol_user');
            switch ($i) {
                case "1":
                 
                    break;   

                case "2":
                    $crud->unset_operations();
                    $crud->where('username', $this->session->userdata('username'));
                    $crud->columns('username', 'firstname', 'lastname', 'status', 'email', 'grade', 'movil', 'datebirth');
                    $crud->field_type('at_create', 'hidden');
                    $crud->field_type('status', 'hidden');
                    $crud->field_type('rol_user', 'hidden');
                    $crud->field_type('password', 'password');
                    break;
               

                default:
                    redirect('login');

            }

            //$crud->callback_before_update(array($this,'encrypt_pw'));
            $crud->callback_before_insert(array($this, 'encrypt_pw'));
            $crud->callback_column('status', array($this, 'idenvisualestado'));

            $output = $crud->render();
            $this->_salida_datos($output);
        } catch (Exception $e) {
            show_error($e->getMessage());
        }
    }

    public function encrypt_pw($post_array)
    {
        if (!empty($post_array['password'])) {
            $post_array['password'] = MD5($_POST['password']);
        }
        return $post_array;
    }

    public function idenvisualestado($value, $row)
    {
        if ($value == '1') {
            return '<span class="label label-success">' . $value = "Activo" . '</span>';
        } elseif ($value == '0') {
            return '<span class="label label-danger">' . $value = "Inactivo" . '</span>';
        }
    }
}
