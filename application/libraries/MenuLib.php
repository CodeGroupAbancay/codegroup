<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class MenuLib {

	function __construct() {
		$this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería
    }

   

    public function get_perfiles_asig_noasig($perfil_id) {
        $lista_asig = array();
        $lista_noasig = array();

        $this->CI->load->model('Model_Menu');
        $opciones = $this->CI->Model_Menu->all();

        foreach($opciones as $opcion) {
            $this->CI->db->where('menu_id',$opcion->id);
            $this->CI->db->where('perfil_id',$perfil_id);
            $query = $this->CI->db->get('permiso');
            $existe = ($query->num_rows >0);

            if($existe) {
                $lista_asig[] = array($opcion->id, $opcion->nombre, $perfil_id);
            }
            else {
                $lista_noasig[] = array($opcion->id, $opcion->nombre, $perfil_id);
            }
        }

        return array($lista_noasig, $lista_asig);
    }
     public function dar_acceso($perfil_id, $menu_id) {
        $registro = array();
        $registro['menu_id'] = $menu_id;
        $registro['perfil_id'] = $perfil_id;
        $this->CI->Model_Permiso->insert($registro);
    }

    public function quitar_acceso($perfil_id, $menu_id) {
        $this->CI->db->where('perfil_id', $perfil_id);
        $this->CI->db->where('menu_id', $menu_id);
       
        $this->CI->db->delete('permiso');
    }

    public function findByControlador($controlador) {
        $this->CI->db->where('controlador', $controlador);
        return $this->CI->db->get('menu')->row();
    }

}
