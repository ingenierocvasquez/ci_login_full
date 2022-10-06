  <?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_Login extends CI_Model
{

    public function login_database($usuario, $password)
    {
        $this->db->where('username', $usuario);
        $this->db->where('password', $password);
        return $this->db->get('user')->result_array();
    }

   /* public function gr_atencion()
    {
        $query = $this->db->query("SELECT  IFNULL(ips_asig, 'TOTAL GENERAL') AS IPS,
        Count(IF(gestion <> '',(ndoc),Null)) as 'GESTIONADO',
        Count(IF(gestion = '',(ndoc),Null)) as 'NO GESTIONADO',
        COUNT(ips_asig) AS TOTAL
        FROM
        seg_asig
        WHERE dep IN ('ATLANTICO', 'BOLIVAR', 'CORDOBA', 'CESAR', 'MAGDALENA', 'SUCRE')
        GROUP BY  ips_asig
        WITH ROLLUP");
        return $query->result_array();
    }

    public function gr_tedenciaxdia()
    {
        $query = $this->db->query("SELECT date_format(fecha_asig, '%d - %m') AS dia,
        Count(IF(gestion <> '',(ndoc),Null)) as 'GESTIONADO',
        Count(IF(gestion = '',(ndoc),Null)) as 'NO GESTIONADO',
        COUNT(dep) AS TOTAL
        FROM
        seg_asig AS t
        WHERE dep IN ('ATLANTICO', 'BOLIVAR', 'CORDOBA', 'CESAR', 'MAGDALENA', 'SUCRE')
        GROUP BY  dia
        ORDER BY dia ASC
        ");
        return $query->result_array();
    }

    public function gr_tendenciacsc()
    {
        $query = $this->db->query("SELECT  IFNULL(dep, 'TOTAL GENERAL') AS DEPARTAMENTO,
        Count(IF(gestion <> '',(ndoc),Null)) as 'GESTIONADO',
        Count(IF(gestion = '',(ndoc),Null)) as 'NO GESTIONADO',
        COUNT(dep) AS TOTAL
        FROM
        seg_asig
        WHERE dep IN ('ATLANTICO', 'BOLIVAR', 'CORDOBA', 'CESAR', 'MAGDALENA', 'SUCRE') AND
        ips_asig ='IPS CUIDADO SEGURO EN CASA SA'
        GROUP BY  dep
        WITH ROLLUP
        ");
        return $query->result_array();
    }

    public function gr_tendenciacaminos()
    {
        $query = $this->db->query("SELECT  IFNULL(dep, 'TOTAL GENERAL') AS DEPARTAMENTO,
        Count(IF(gestion <> '',(ndoc),Null)) as 'GESTIONADO',
        Count(IF(gestion = '',(ndoc),Null)) as 'NO GESTIONADO',
        COUNT(dep) AS TOTAL
        FROM
        seg_asig
        WHERE dep IN ('ATLANTICO', 'BOLIVAR', 'CORDOBA', 'CESAR', 'MAGDALENA', 'SUCRE') AND
        ips_asig ='CAMINOS IPS SAS'
        GROUP BY  dep
        WITH ROLLUP
        ");
        return $query->result_array();
    }



    public function gr_atencion_med()
    {
        $query = $this->db->query("
        SELECT  DAY(t.fecha_cita) AS mes,
        Count(IF(est_llamada = 'CONTACTADO',(cod_medico),Null)) as 'CONTACTADO',
        Count(IF(t.est_llamada = 'NO CONTACTADO',(cod_medico),Null)) as 'NO CONTACTADO',
        Count(IF(est_llamada = 'PRESENCIAL',(cod_medico),Null)) as 'PRESENCIAL',
        Count(IF(est_llamada = '',(cod_medico),Null)) as 'PENDIENTES',
        Count(IF(est_llamada = NULL,(cod_medico),1))  as 'TOTAL'
        FROM
        teleconsulta AS t
        WHERE t.fecha_cita = CURDATE() AND  t.cod_medico = '{$this->session->userdata('cod_medico')}'
        GROUP BY  DAY(t.fecha_cita)
        ORDER BY mes ASC, TOTAL DESC
        ");
        return $query->result_array();
    }

    public function gr_tedenciaxdia_med()
    {
        $query = $this->db->query("
        SELECT date_format(t.fecha_cita, '%d') AS dia,
        Count(IF(est_llamada = 'CONTACTADO',(cod_medico),Null)) as 'CONTACTADO',
        Count(IF(t.est_llamada = 'NO CONTACTADO',(cod_medico),Null)) as 'NO CONTACTADO',
        Count(IF(est_llamada = 'PRESENCIAL',(cod_medico),Null)) as 'PRESENCIAL',
        Count(IF(est_llamada = '',(cod_medico),Null)) as 'PENDIENTES',
        Count(IF(est_llamada = NULL,(cod_medico),1))  as 'TOTAL'
        FROM
        teleconsulta AS t
        WHERE MONTH(t.fecha_cita) = MONTH(CURDATE()) AND  t.cod_medico = '{$this->session->userdata('cod_medico')}'
        GROUP BY  dia
        ORDER BY dia ASC
        ");
        return $query->result_array();
    }*/

}