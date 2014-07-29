<?php
class tablas_model extends CI_Model {
	public function __construct() {
		parent::__construct ();
	}
	public function categorias() {
		return $this->db->get ( 'categorias' )->result ();
	}
	public function supervision() {
		return $this->db->get ( 'supervision' )->result ();
	}
	public function zona() {
		return $this->db->get ( 'zona' )->result ();
	}
	public function c_e($id_establecimiento = NULL) {
		$this->db->where ( 'id_establecimiento', $id_establecimiento );
		return $this->db->get ( 'c_e' )->result ();
	}
	public function s_e($id_establecimiento = NULL) {
		$this->db->where ( 'id_establecimiento', $id_establecimiento );
		return $this->db->get ( 's_e' )->result ();
	}
	public function categorias_establecimiento($id=NULL){
		$this->db->select('*');
		$this->db->from('categorias');
		$this->db->join('c_e','categorias.id_categoria=c_e.id_categoria');
		$this->db->where('c_e.id_establecimiento',$id);
		return $this->db->get()->result();	
	}
	public function supervision_establecimiento($id=NULL){
		$this->db->select('*');
		$this->db->from('supervision');
		$this->db->join('s_e','s_e.id_supervision=supervision.id_supervision');
		$this->db->where('s_e.id_establecimiento',$id);
		return $this->db->get()->result();	
	}
	
}