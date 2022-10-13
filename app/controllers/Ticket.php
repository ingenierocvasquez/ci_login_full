<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ticket extends CI_Controller
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

            $crud->set_table('ticket');

            $crud->set_subject('Registro de Tickets');
            $crud->display_as('id_user', 'Usuario: '); 
            $crud->display_as('observacion', 'Solicitud: ');        
            $crud->order_by('fecha_ticket','desc');
            $crud->field_type('fecha_ticket', 'hidden');
            $crud->field_type('id_user', 'hidden');
            //$crud->field_type('estado_ticket', 'hidden');
            
            //$crud->set_relation('id_user','user','{username} - {firstname} {lastname}');
 
         
            $i = $this->session->userdata('rol_user');
            switch ($i) {
                case "1":
                 
                    break;   

                case "2":
                    //$crud->unset_operations();
                    $crud->unset_print();
                    $crud->unset_delete();
                    $crud->unset_read();
                    $crud->unset_clone();
                    $crud->unset_export();
                    $crud->unset_edit();
                    $crud->where('id_user', $this->session->userdata('username'));
                    $crud->columns('id_ticket','fecha_ticket', 'categoria', 'estado_ticket', 'observacion');
                    break;
               

                default:
                    redirect('login');

            }

            $state = $crud->getState();
            if($state == 'add')
            { ?>
                 <script src="<?php echo base_url().'assets/grocery_crud/js/jquery-2.2.4.min.js' ?>"></script>
                <script type="text/javascript">
                $(document).ready(function(){
                let user_id = <?php echo $this->session->userdata('username');?>;
                $('#field-id_user').val(user_id);
            });
                </script>
               <?php 
            }

            /*$crud->set_lang_string(
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
            );*/

            //$crud->callback_before_insert(array($this, 'encrypt_pw'));
            $crud->callback_column('estado_ticket', array($this, 'idenvisualestado'));

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
        if ($value == 'Cerrado') {
            return '<span class="label label-success">' . $value = "Cerrado" . '</span>';
        } elseif ($value == 'Abierto') {
            return '<span class="label label-danger">' . $value = "Abierto" . '</span>';
        }
    }
}