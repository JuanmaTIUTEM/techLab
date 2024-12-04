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

	public function insertProduct($inventario_data){

	    // Preparar los parámetros para el procedimiento almacenado
	    $data = [
	        'p_nombre' => $inventario_data['nombre'],
	        'p_descripcion' => $inventario_data['descripcion'],
	        'p_cantidad' => $inventario_data['cantidad'],
	        'p_categoria' => $inventario_data['categoria'],
	        'p_numeroSerie' => $inventario_data['numeroSerie'],
	        'p_numeroInventario' => $inventario_data['numeroInventario'],
	        'p_ubicacion' => $inventario_data['ubicacion'],
	        'p_estado' => $inventario_data['estado'],
	        'p_imagen_principal' => $inventario_data['imagen_principal'],
	        'p_imagenes' => $inventario_data['imagenes'] // JSON con las rutas de las imágenes
	    ];

	    print_r($data);

	    /*// Ejecutar el procedimiento almacenado
	    $this->db->query("CALL registrar_inventario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $data);
	    return $this->db->affected_rows() > 0;*/

	}
}
