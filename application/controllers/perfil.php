<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

	// Constructor de Clase
	function __construct() {
		parent::__construct();

		$this->load->model('Model_Perfil');
		$this->load->library('perfilLib');

		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
		$this->form_validation->set_message('norep', 'Ya existe un perfíl con ese nombre');
	}

	public function index() {
	
		$data['titulo'] = 'Perfiles';
		$data['query'] = $this->Model_Perfil->all();
		$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('perfil/index',$data);
		$this->load->view('home/footer');
	}

	public function search() {
		$data['contenido'] = 'perfil/index';
		$data['titulo'] = 'Perfiles';
		$value = $this->input->post('buscar');
		$data['query'] = $this->Model_Perfil->allFiltered('name', $value);

		$this->load->view('template', $data);
	}

	public function norep() {
		return $this->perfillib->norep($this->input->post());
	}

	public function create() {
		
		$data['accion'] = 'insert';
		$data['titulo'] = 'Nuevo Perfil';
		$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('perfil/create',$data);
		$this->load->view('home/footer');
		
	}

	public function insert() {
		$registro = $this->input->post();

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[20]|callback_norep');
		if($this->form_validation->run() == FALSE) {
			$this->create();
		}
		else {
			
			$registro['nombre']=$this->input->post('nombre');
			$this->Model_Perfil->insert($registro);
			$this->session->set_flashdata('msg', '<td><div id="msg" class=" alert-mini alert-success text-center"> Nuevo perfíl creado correctamente </div></td>');
			redirect('perfil/index');
		}
	}

	public function edit($id) {
		// $id = $this->uri->segment(3);

		if ($id == NULL OR !is_numeric($id) OR $id=='2' OR $id=='1'){
			redirect('perfil/index');
			
		}else{
			
			$data['titulo'] = 'Actualizar Perfil';
			$data['accion'] = 'update';
			$data['registro'] = $this->Model_Perfil->find($id);
			$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('perfil/create',$data);
		$this->load->view('home/footer');
		}
	}

	public function update() {
		$registro = $this->input->post();

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_norep|max_length[20]|xss_clean');
		if($this->form_validation->run() == FALSE) {
			$this->edit($registro['id']);
		}
		else {
		
			$registro['nombre']=trim($this->input->post());
			$this->Model_Perfil->update($registro);
			$this->session->set_flashdata('msg', '<td><div id="msg" class=" alert alert-success text-center">Perfíl editado correctamente </div></td>');
			redirect('perfil/index');
		}
	}

	public function delete() {
		  $id = $this->uri->segment(3);
		if ($id=='2' OR $id=='1'){
			$this->session->set_flashdata('msg', '<td><div id="msg" class=" alert-mini alert-danger text-center">Este perfíl no puede ser eliminado</div></td>');
			redirect('perfil/index');
		}
		$numUsuarios=$this->Model_Perfil->countUsuarios($id);
		if($numUsuarios >0) {
			$this->session->set_flashdata('msg', '<td><div id="msg" class="alert alert-danger text-center">Existen usuarios relacionados a este perfíl, por lo cual no puede ser eliminado</div></td>');
			redirect('perfil/index');
		}else{
			$this->session->set_flashdata('msg', '<td><div id="msg" class="alert alert-success text-center">Perfíl eliminado correctamente</div></td>');
			$this->Model_Perfil->delete($id);
			redirect('perfil/index');
		}

		
	}
	

}
