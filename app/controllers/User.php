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

            $crud->set_subject('REGISTRO DE USUARIOS');
            $crud->display_as('username', 'USUARIO: ');
            $crud->display_as('password', 'CONTRASEÑA: ');
            /*$crud->display_as('fecha_registro', 'FECHA DE REGISTRO: ');
            $crud->display_as('ncompleto', 'NOMBRE COMPLETO: ');
            $crud->display_as('email', 'CORREO ELECTRONICO: ');
            $crud->display_as('celular', 'CELULAR: ');
            $crud->display_as('regional', 'REGIONAL: ');
            $crud->display_as('prestador', 'PRESTADOR: ');
            $crud->display_as('user_id', 'ID DEL USUARIO: ');
            $crud->display_as('user_pw', 'CONTRASEÑA: ');
            $crud->display_as('user_type', 'TIPO DE USUARIO: ');
            $crud->display_as('estado_us', 'ESTADO DEL USUARIO: ');
            $crud->display_as('des_user_type', 'DECRIPCIÓN DEL USUARIO: ');*/

            //$crud->unset_delete();
            //$crud->unset_clone();

            //$crud->field_type('fecha_registro', 'hidden');
            //$crud->field_type('user_pw', 'password');
            //$crud->order_by('des_user_type', 'desc');

            //$i = $this->session->userdata('user_type');

            /*switch ($i) {
                case "administrador":
                    $crud->unset_print();
                    $crud->unset_delete();
                    $crud->unset_read();
                    $crud->unset_clone();
                    $crud->unset_export();
                    break;

                default:
                    redirect('login');

            }*/

            $crud->set_lang_string(
                'update_success_message',
                'Actuaiización Exitosa!.
					<script type="text/javascript">
					swal.fire({
						title: "Bien Hecho!",
						text: "Sus Datos Fuerón Actualizados!",
						icon: "success",
						button: "Cerrar Sesión",
						})
						.then(function(result){
							window.location = "' . base_url() . 'cerrarsesion' . '";
							});
							</script>
							<div style="display:none">
							'
            );

            //$crud->callback_before_insert(array($this, 'encrypt_pw'));

            //$crud->callback_column('estado_us', array($this, 'idenvisualestado'));

            $output = $crud->render();
            $this->_salida_datos($output);
        } catch (Exception $e) {
            show_error($e->getMessage());
        }
    }

    /*public function encrypt_pw($post_array)
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
    }*/
}
