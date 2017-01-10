<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Permiso extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    public function menu_perfiles($menu_id) {
        $data['contenido'] = 'menu/menu_perfiles';
        $data['titulo'] = 'Acceso a  "'.$this->Model_Menu->find($menu_id)->nombre.'"';

        // Cargar arreglos Izquierda y Derecha
        $perfiles = $this->menulib->get_perfiles_asig_noasig($menu_id);
        $data['query_izq'] = $perfiles[0];
        $data['query_der'] = $perfiles[1];

        $this->load->view('template', $data);
    }
     function insert($registro) {
        $this->db->set($registro);
        $this->db->insert('permiso');
    }

    public function mp_noasig() {
        $perfil_id = $this->uri->segment(3);
        $menu_id = $this->uri->segment(4);

        $this->load->library('menu_PerfilLib');
        if ($perfil_id == '1' ) {
            $this->session->set_flashdata('msg', '<td><div id="msg" class="alert-mini alert-danger text-center">La acción no se puede realizar </div></td>');
            redirect('menu/menu_perfiles/'.$menu_id);
        }
        else{
            $this->menu_perfillib->quitar_acceso($perfil_id, $menu_id);
            redirect('menu/menu_perfiles/'.$menu_id);
        }
    }

    public function mp_asig() {
        $perfil_id = $this->uri->segment(3);
        $menu_id = $this->uri->segment(4);

        $this->load->library('menu_PerfilLib');
        $this->menu_perfillib->dar_acceso($perfil_id, $menu_id);
        redirect('menu/menu_perfiles/'.$menu_id);
    }
}
