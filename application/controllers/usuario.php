<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	// Constructor de la clase
	function __construct() {
		parent::__construct();

		$this->load->model('Model_Usuario');
		$this->load->library('usuarioLib');

	
        $this->form_validation->set_message('valid_email', 'Campo %s no es un eMail valido');
        $this->form_validation->set_message('norep_email', 'Existe otro registro con el mismo email');
        $this->form_validation->set_message('norep_dni', 'Existe otro registro con el mismo dni');
    }

	public function index() {
		$data['titulo'] = 'Usuarios';
		$data['query'] = $this->Model_Usuario->all();
		$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('usuario/index',$data);
		$this->load->view('home/footer');
		
	}

	public function search() {
		$data['contenido'] = 'usuario/index';
		$data['titulo'] = 'Usuarios';

		$value = $this->input->post('buscar');
		$data['query'] = $this->Model_Usuario->allFiltered('usuario.name', $value);
		$this->load->view('template', $data);
	}

	public function norep_email() {
		return $this->usuariolib->norep_email($this->input->post());
	}
	public function norep_dni() {
		return $this->usuariolib->norep_dni($this->input->post());
	}
	public function create() {
		$this->load->model('Model_Perfil');
		$data['accion'] = 'insert';
		$data['titulo'] = 'Nuevo Usuario';
		$data['perfiles'] = $this->Model_Perfil->get_perfiles(); /* Lista de los Perfiles */
		$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('usuario/create',$data);
		$this->load->view('home/footer');
	}

	public function insert() {
		
		$this->form_validation->set_rules('dni', 'Dni', 'required|exact_length[8]|callback_norep_dni|is_numeric|xss_clean');
		$this->form_validation->set_rules('nombres', 'Nombres', 'required|max_length[50]|regex_match[/^([A-Za-záéíóúÑñ ])+$/]|xss_clean');
		 $this->form_validation->set_rules('apellidos', 'Apellido', 'required|regex_match[/^([A-Za-záéíóúÑñ ])+$/]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_norep_email|valid_email|max_length[50]|xss_clean');
       
       
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }
        else {
        	$registro['dni']=trim($this->input->post('dni'));
        	$registro['nombre']=trim($this->input->post('nombre'));
        	$registro['apellido']=trim($this->input->post('apellido'));
        	$registro['email']=trim($this->input->post('email'));
        	$hash=$this->bcrypt->hash_password($registro['email']);
        	$registro['password'] = $hash; // Por defecto misma login y pwd
			$registro['fecha_reg'] = date("Y-m-d");
			$registro['estado'] = $this->input->post('estado');
			$registro['perfil_id'] = $this->input->post('perfil_id');
			 $this->session->set_flashdata('msg', '<td><div id="msg" class="alert alert-success text-center">Usuario registrado correctamente</div></td>');
			$this->Model_Usuario->insert($registro);
			redirect('usuario/index');
        }
	}
	public function update() {
		
		$this->form_validation->set_rules('dni', 'Dni', 'required|exact_length[8]|callback_norep_dni|is_numeric|xss_clean');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[50]|regex_match[/^([A-Za-záéíóúÑñ ])+$/]|xss_clean');
		 $this->form_validation->set_rules('apellido', 'Apellido', 'required|regex_match[/^([A-Za-záéíóúÑñ ])+$/]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_norep_email|valid_email|max_length[50]|xss_clean');
       
		if($this->form_validation->run() == FALSE) {
			$this->edit($registro['id']);
		}
		else {
			$registro['id']=trim($this->input->post('id'));
			$registro['dni']=trim($this->input->post('dni'));
			$registro['nombre']=trim($this->input->post('nombre'));
        	$registro['apellido']=trim($this->input->post('apellido'));
        	$registro['email']=trim($this->input->post('email'));
			$registro['estado'] = $this->input->post('estado');
			$registro['perfil_id'] = $this->input->post('perfil_id');
			$this->Model_Usuario->update($registro);
			 $this->session->set_flashdata('msg', '<td><div  id="msg" class=" alert alert-success text-center">Usuario  actualizado correctamente</div></td>');
			redirect('usuario/index');
		}
	}

	public function edit($id) {
		//$id = $this->uri->segment(3);
		if ($id == NULL OR !is_numeric($id)){
			redirect('usuario/index');
			
		}else{
			$usuarios=$this->Model_Usuario->find($id);
			if ($usuarios) {
				
				$data['accion'] ='update';
				$data['titulo'] = 'Actualizar Usuario';
				$data['registro'] = $usuarios;
				$data['perfiles'] = $this->Model_Perfil->get_perfiles(); /* Lista de los Perfiles */
				$this->load->view('home/header');
				$this->load->view('topbar');
				$this->load->view('menu');
				$this->load->view('usuario/create',$data);
				$this->load->view('home/footer');
			}
			else{

			}
			
		}
	}
	public function editpassword($id) {
		//$id = $this->uri->segment(3);
		
		$data['accion'] ='updatepassword';
		$data['titulo'] = 'Cambiar contraseña';
		$data['registro'] = $this->Model_Usuario->find($id);
		$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('usuario/password',$data);
		$this->load->view('home/footer');
		
	}
	public function updatepassword() {
		$id = $this->input->post('id');
		$this->load->library('bcrypt');
		$this->form_validation->set_rules('password', 'Contraseña nueva','required|min_length[8]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('password_rep', 'Repita contraseña', 'required|matches[password]');
		 if($this->form_validation->run() == FALSE) {
			$this->editpassword($id);
		}
		else {

			$data['id']=$id;
			$new=$this->bcrypt->hash_password($this->input->post('password'));
			$data['password']=$new;
			$this->Model_Usuario->update($data);
			$this->session->set_flashdata('msg', '<td><div  id="msg" class=" alert-mini alert-success text-center">La contraseña fue cambiada correctamente </div></td>');
			redirect('usuario/index');
		}
	}



	public function delete($id) {
		$this->Model_Usuario->delete($id);
		redirect('usuario/index');
	}

}
