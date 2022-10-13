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

    public function data_user()
    {
        $query = $this->db->query('
        SELECT u.lastname, u.firstname, u.grade, count(t.id_user) as "total_ticket" FROM user as u
        INNER JOIN ticket as t ON
        u.username = t.id_user
        GROUP BY u.username
        ORDER BY count(t.id_user) DESC LIMIT 10;
        ');
        return $query->result_array();
    }

    public function count_user()
    {
        $query = $this->db->query('
        SELECT COUNT(u.username) AS "count_user" FROM user AS u;
        ');
        return $query->result_array();
    }


}