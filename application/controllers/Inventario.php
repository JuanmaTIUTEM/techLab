<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {
	public function __construct() {
        parent::__construct();
        // Cargar el modelo
        $this->load->model('ModInventario');
        $this->ModInventario->init('inventario');
	}
	public function index(){
		$info['categorias'] = $this->ModInventario->getCategorias();
		$info['estados'] = $this->ModInventario->getEstados();
		$info['ubicaciones'] = $this->ModInventario->getUbicaciones();
		$this->load->view('Templates/head');
		$this->load->view('Inventario/vwPrincipal',$info);
		$this->load->view('Templates/footer');
	}
	public function registrarProducto(){
		//print_r($_POST);
		$data = $_POST;
		$this->ModInventario->insertProduct($data);
		
	}
}