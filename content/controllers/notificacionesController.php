<?php 
		namespace content\controllers;
		use content\libraries\core\autoload;
		use content\models\notificacionesModel;
		
	class notificacionesController extends autoload{
		private $model;
		public function __construct(){
			parent::__construct();
			$this->model = new notificacionesModel;
	
		}

		public function listar(){
			$res = $this->model->listar(12);
			header('Content-Type: application/json');
        	http_response_code(200);
			echo json_encode([
				'data' => $res
			]);
		}

		public function eliminar(){
			$res = $this->model->eliminar($_POST['id']);
			echo json_encode($res);
		}

		public function registrar(){
			$this->model->registrar();
   	}
	}

?>