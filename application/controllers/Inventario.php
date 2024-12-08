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
	public function registrarProducto() {
	    // Verificar si el formulario fue enviado
	    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	        // Configuración general para subir imágenes
	        $config['allowed_types'] = 'jpg|jpeg|png|gif';
	        $config['max_size'] = 2048; // Tamaño máximo en KB

	        // Obtener información del producto desde el formulario
	        $product_name = $this->input->post('nombre'); // Nombre del producto
	        $product_description = $this->input->post('descripcion'); // Descripción del producto
	        $product_category = $this->input->post('categoria'); // Categoría del producto
	        $product_serial_number = $this->input->post('numeroSerie'); // Número de serie
	        $product_inventory_number = $this->input->post('numeroInventario'); // Número de inventario
	        $product_location = $this->input->post('ubicacion'); // Ubicación del producto
	        $product_state = $this->input->post('estado'); // Estado del producto

	        // Generar la ruta de la carpeta del producto
	        $folder_name = strtolower(str_replace(' ', '_', $product_name));
	        $product_folder_path = './imagenes/' . $folder_name;

	        // Verificar si la carpeta del producto existe, si no, crearla
	        if (!is_dir($product_folder_path)) {
	            mkdir($product_folder_path, 0777, true);
	        }

	        $config['upload_path'] = $product_folder_path; // Ruta de la carpeta del producto
	        $this->upload->initialize($config);

	        $imagenes = [];
	        $imagen_principal = '';

	        // Verificar si hay imágenes en el formulario
	        if (!empty($_FILES['imagenes']['name'][0])) {
	            $total_imagenes = count($_FILES['imagenes']['name']);

	            // Subir las imágenes
	            for ($i = 0; $i < $total_imagenes; $i++) {
	                $_FILES['imagen']['name'] = $_FILES['imagenes']['name'][$i];
	                $_FILES['imagen']['type'] = $_FILES['imagenes']['type'][$i];
	                $_FILES['imagen']['tmp_name'] = $_FILES['imagenes']['tmp_name'][$i];
	                $_FILES['imagen']['error'] = $_FILES['imagenes']['error'][$i];
	                $_FILES['imagen']['size'] = $_FILES['imagenes']['size'][$i];

	                // Configurar el nombre de la imagen
	                $config['file_name'] = $folder_name . "_img_" . ($i + 1) . "." . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
	                $this->upload->initialize($config);

	                if ($this->upload->do_upload('imagen')) {
	                    $upload_data = $this->upload->data();
	                    $image_path = $product_folder_path . '/' . $upload_data['file_name']; // Ruta completa de la imagen

	                    // Guardar la ruta de la imagen en el array
	                    $imagenes[] = $image_path;

	                    // Si es la primera imagen, marcarla como principal
	                    if ($i == 0) {
	                        $imagen_principal = $image_path;
	                    }
	                } else {
	                    // Mostrar errores de subida
	                    echo "Error al subir la imagen " . ($i + 1) . ": " . $this->upload->display_errors();
	                }
	            }

	       

	            // Datos para llamar al procedimiento almacenado
	            $inventario_data = [
	                'nombre' => $product_name,
	                'descripcion' => $product_description,
	                'cantidad' => $product_quantity,
	                'categoria' => $product_category,
	                'numeroSerie' => $product_serial_number,
	                'numeroInventario' => $product_inventory_number,
	                'ubicacion' => $product_location,
	                'estado' => $product_state,
	                'imagen_principal' => $imagen_principal, // La imagen principal
	                'imagenes' => json_encode($imagenes) // Convertir las imágenes a JSON para el procedimiento
	            ];
	            //print_r($inventario_data);
	            $res = $this->ModInventario->insertProduct($inventario_data);
	           print_r($res);
	            // Llamar al procedimiento almacenado con los datos del producto
	            /*if ($this->ModInventario->registrarInventario($inventario_data)) {
	                redirect('inventario'); // Redirigir a la página de inventarios
	            } else {
	                echo "Error al registrar el inventario.";
	            }*/
	        }
	    }
	    

	    // Cargar la vista con el formulario
	    //$this->index();
	}



}