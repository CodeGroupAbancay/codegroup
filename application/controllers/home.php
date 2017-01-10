<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('home/index');
		$this->load->view('home/footer');
	}

	public function acceso_denegado() {
		
		$data['titulo'] = 'Denegado';
				$this->load->view('home/header');
		$this->load->view('topbar');
		$this->load->view('menu');
		$this->load->view('home/acceso_denegado',$data);
		$this->load->view('home/footer');
	}
}
