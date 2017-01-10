<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// Constructor de Clase
	function __construct() {
		parent::__construct();

		$this->load->library('usuarioLib');
		$this->load->library('bcrypt');
		$this->form_validation->set_message('loginok', 'Usuario o password incorrectos');
		$this->load->model('Model_Usuario');	
	}
	public function index(){
		if ($this->session->userdata('nombres')) {
			redirect('home/index');
		}
		else{
			$this->load->view('login/index');
		}
	}


	public function ingresar() {
		$this->form_validation->set_rules('email', 'Email', 'required|callback_loginok|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Clave', 'required');
		if($this->form_validation->run() == FALSE) {
			$this->index();
		}
		else {
			redirect('home/index','refresh');
			
		}
	}
	public function insert_usuario() {
		
       		$registro['dni']='76988987';
        	$registro['nombre']='Daniel';
        	$registro['apellido']='Barrientos';
        	$registro['email']='danielbq111144@gmail.com';
        	$hash=$this->bcrypt->hash_password($registro['email']);
        	$registro['password'] = $hash; // Por defecto misma login y pwd
        	$registro['fecha_reg'] = date("Y-m-d");
        	$registro['perfil_id'] = 1;

        	if ($this->bcrypt->check_password($registro['email'],$hash)) {
        			 $this->session->set_flashdata('msg', '<td><div id="msg" class="alert alert-succes text-center">Usuario registrado correctamente</div></td>');
				$this->Model_Usuario->insert($registro);
				redirect('login/index');
        	}
        	else{
        		 $this->session->set_flashdata('msg', '<td><div id="msg" class="alert alert-succes text-center">Ocurrio un error</div></td>');
				
				redirect('login/index');
        	}

	}

	public function loginok() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');		
		return $this->usuariolib->login($email,$password);
	}

	public function salir() {
	
		$this->session->sess_destroy();
		redirect('login/index');
	}
}

//end application/controllers/home.php
	
