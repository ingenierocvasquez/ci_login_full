  <?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_auth extends CI_Model
{

    public function login_database($usuario, $password)
    {
        $this->db->where('username', $usuario);
        $this->db->where('password', $password);
        return $this->db->get('user')->result_array();
    }

}