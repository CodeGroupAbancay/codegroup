<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Perfil extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all() {
        $query = $this->db->get('perfil');
        return $query->result();
    }

   

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('perfil')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('perfil');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('perfil');
    }
      function get_perfiles() {
        $lista = array();
        $this->load->model('Model_Perfil');
        $registros = $this->Model_Perfil->all();
        foreach ($registros as $registro) {
            $lista[$registro->id] = $registro->nombre;
        }
        return $lista;
    }

     function countUsuarios($id) {
        $consulta=" SELECT usuario.id FROM usuario,perfil WHERE usuario.perfil_id=perfil.id AND perfil.id={$id}";
         $query=$this->db->query($consulta);
        return $query->num_rows();
    }
    function delete($id) {   
    	$this->db->where('id', $id);
		$this->db->delete('perfil');
    }

}
