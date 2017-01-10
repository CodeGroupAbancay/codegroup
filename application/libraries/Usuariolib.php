<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class UsuarioLib {

	function __construct() {
		$this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería

		$this->CI->load->model('Model_Usuario');
        $this->CI->load->model('Model_Perfil');
        $this->CI->load->library('bcrypt');
        
    }

    public function login($email, $pass) {
    	$query = $this->CI->Model_Usuario->get_login($email);//comprobamos que el usuario exite(el email debe ser unico)
    	if($query->num_rows()==1) {
                $usuario = $query->row();
                 if($this->CI->bcrypt->check_password($pass,$usuario->password)){//comprobamos que el password exista
                     $perfil = $this->CI->Model_Perfil->find($usuario->perfil_id);

                    $datosSession = array('nombres' => $usuario->nombre,
                                          'apellidos' => $usuario->apellido,
                                          'usuario_id' => $usuario->id,
                                          'perfil_id' => $usuario->perfil_id,
                                          'perfil_name' => $perfil->nombre);
                    $this->CI->session->set_userdata($datosSession);
                   
                    return TRUE;     
                 }
                 else{
                    
                    return FALSE;
                 }
    	}
    	else {
    		//$this->CI->session->sess_destroy();
           
    		return FALSE;
    	}
    }

    public function cambiarPWD($act,$new) {
    	if($this->CI->session->userdata('usuario_id') == null) {
    		return FALSE;
    	}

    	$id = $this->CI->session->userdata('usuario_id');
    	$usuario = $this->CI->Model_Usuario->find($id);

    	if($usuario->password == $act) {
    		$data = array('id' => $id,
               			  'password' => $new);
    		$this->CI->Model_Usuario->update($data);
            return TRUE;
    	}
    	else {
    		return FALSE;
    	}
    }

    public function norep_email($registro) {
        $this->CI->db->where('email', $registro['email']);
        $query = $this->CI->db->get('usuario');

        if ($query->num_rows() > 0 AND (!isset($registro['id']) OR ($registro['id'] != $query->row('id')))) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    public function norep_dni($registro) {
        $this->CI->db->where('dni', $registro['dni']);
        $query = $this->CI->db->get('usuario');

        if ($query->num_rows() > 0 AND (!isset($registro['id']) OR ($registro['id'] != $query->row('id')))) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

}
