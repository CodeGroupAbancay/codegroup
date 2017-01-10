<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Muestra TODOS errores de validación de un formulario
if ( ! function_exists('autentificar')) {

	function autentificar() {
		$CI = & get_instance();

		$controlador = $CI->uri->segment(1);
		$accion = $CI->uri->segment(2);
		$url = $controlador.'/'.$accion;

		$libres = array(
			'/',
			'login/index',
			'login/ingresar',
			'login/salir',
			'login/insert_usuario'
			
		);

		if(in_array($url, $libres)) {
			echo $CI->output->get_output();
		}
		else {
			if($CI->session->userdata('nombres')) {
				if(autorizar()) {
					echo $CI->output->get_output();
				}
				else {
					redirect('home/acceso_denegado');
				}
			}
			else {
				redirect('login/index');
			}
		}

	}

}

function autorizar() {
	$CI = & get_instance();

	// El perfil del usuario logueado
	$perfil_id = $CI->session->userdata('perfil_id');

	// Con el controlador, buscar la opción de menú
	$CI->load->library('menuLib');
	$controlador = $CI->uri->segment(1);//capturamos el controlador
	$menu_id = $CI->menulib->findByControlador($controlador)->id;//verificamos si existe

	if(!$menu_id) {
		return FALSE;
	}

	// Recuperar de la tabla de permisos, la combinación Menu - Perfil
	$CI->load->library('permisoLib');
	$acceso = $CI->permisolib->findByMenuAndPerfil($menu_id, $perfil_id);
	if(!$acceso) {
		return FALSE;
	}

	return TRUE;
}
