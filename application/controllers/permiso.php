<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permiso extends CI_Controller {

	// Constructor de Clase
	function __construct() {
		parent::__construct();

		$this->load->model('Model_Permiso');
		$this->load->model('Model_Perfil');
		$this->load->library('menuLib');

		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
		$this->form_validation->set_message('numeric', '%s debe ser un número');
		$this->form_validation->set_message('is_natural', '%s debe ser un número mayor a cero');
	}

	public function index() {
		$data['titulo'] = 'Perfiles';
		$data['query'] = $this->Model_Perfil->all();
		$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('permiso/index',$data);
		$this->load->view('home/footer');
	}

	public function administrar($perfil_id) {
		$data['contenido'] = 'menu/menu_perfiles';
		$data['titulo'] = 'Permisos de  "'.$this->Model_Perfil->find($perfil_id)->nombre.'"';

		// Cargar arreglos Izquierda y Derecha
		$perfiles = $this->menulib->get_perfiles_asig_noasig($perfil_id);
		$data['query_izq'] = $perfiles[0];
		$data['query_der'] = $perfiles[1];
		$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('permiso/menu_perfiles',$data);
		$this->load->view('home/footer');
		
	}

	public function mp_noasig() {
		$menu_id = $this->uri->segment(3);
		$perfil_id = $this->uri->segment(4);
		
		if ($perfil_id == '1' ) {
			$this->session->set_flashdata('msg', '<td><div id="msg" class="alert-mini alert-danger text-center">La acción no se puede realizar </div></td>');
			redirect('permiso/administrar/'.$perfil_id);
		}
		else{
			$this->menulib->quitar_acceso($perfil_id, $menu_id);
			redirect('permiso/administrar/'.$perfil_id);
		}
	}

	public function mp_asig() {
		$menu_id = $this->uri->segment(3);
		$perfil_id = $this->uri->segment(4);
		$this->menulib->dar_acceso($perfil_id, $menu_id);
		redirect('permiso/administrar/'.$perfil_id);
	}

}
