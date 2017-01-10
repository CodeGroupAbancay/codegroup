<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Usuario extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all() {
        $this->db->select('usuario.*, perfil.nombre as perfil_name');
        $this->db->from('usuario');
        $this->db->join('perfil', 'usuario.perfil_id = perfil.id', 'left');

        $query = $this->db->get();
        return $query->result();
    }
    function all2() {
        $consulta="SELECT id,concat_ws(' ',nombres,apellidos) as nombre_completo FROM usuario WHERE estado != 'Inactivo'";
        $query=$this->db->query($consulta);
        return $query->result();
    }

    function allFiltered($field, $value) {
        $this->db->select('usuario.* , perfil.name as perfil_name');
        $this->db->from('usuario');
        $this->db->join('perfil', 'usuario.perfil_id = perfil.id', 'left');
        $this->db->like($field, $value);

        $query = $this->db->get();
        return $query->result();
    }

    function find($id) {
        $this->db->select('usuario.*, perfil.nombre as perfil_name');
        $this->db->from('usuario');
        $this->db->join('perfil', 'usuario.perfil_id = perfil.id', 'left');
        $this->db->where('usuario.id', $id);
		return $this->db->get()->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('usuario');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
         
		$this->db->update('usuario');
    }
   

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('usuario');
    }

    function get_login($email) {
        $this->db->where('email', $email);
        $this->db->where('estado', '1');
        return $this->db->get('usuario');
    }

     
}
