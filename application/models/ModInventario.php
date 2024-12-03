<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModInventario extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function init($dataBase){
		$this->db = $this->load->database($dataBase, TRUE);
	}

	public function getCategorias(){
		$result = $this->db->get('categorias');
		//$result = $this->db->query($query);

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}
	public function getUbicaciones(){
		$result = $this->db->get('ubicaciones');
		//$result = $this->db->query($query);

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}
	public function getEstados(){
		$result = $this->db->get('estados');
		//$result = $this->db->query($query);

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}
	//public function getProductos{}

	public function insertProduct($data){
		echo "<h1>Hola desde modelo</h1> <br>";
		print_r($data);
	}
}
