<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Menu extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all() {
         $this->db->order_by("orden", "asc");
        $query = $this->db->get('menu');

        return $query->result();
    }
    function menuusuario($id_perfil){
        $this->db->select('menu.*');
        $this->db->from('menu');
        $this->db->join('menu_perfil','menu.id=menu_perfil.menu_id');
        $this->db->join('perfil','perfil.id=menu_perfil.perfil_id');
        $this->db->where('perfil.id',$id_perfil);
        $this->db->order_by("orden", "asc");
        $query=$this->db->get();
        return $query->result();
        // $consulta="select menu.* from menu,menu_perfil,perfil where menu.id = menu_perfil.menu_id and perfil.id=menu_perfil.perfil_id and perfil.id={$id_perfil}";
    }
   

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('menu')->row();
    }

    

}
