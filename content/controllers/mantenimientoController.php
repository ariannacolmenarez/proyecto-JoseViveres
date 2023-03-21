<?php 
	namespace content\controllers;
	use content\libraries\core\autoload;
	use content\models\mantenimientoModel;
	use content\controllers\bitacoraController;

	class mantenimientoController extends autoLoad{
		private $model;
		private $bitacora;

		public function __construct(){
			parent::__construct();
			$this->model=new mantenimientoModel;
			$this->bitacora = new bitacoraController;
			
		}

		public function mantenimiento(){
			$data['page_tag'] = "Mantenimiento | Market MP";
			$data['page_title'] = "Mantenimiento del sistema";
			parent::getView("mantenimiento", $data);
		}

		public function respaldo(){
			$this->model->respaldo();
			$fecha=date('Y-m-d');
			$accion='Se realizo un respaldo de la BASE DE DATOS ';
			$modulo='Mantenimiento';
			$id=$_SESSION['id_usuario'];
			$this->bitacora->insertar(
				$fecha,
				$accion,
				$modulo,
				$id);
			//header("location:"._DIRECTORY_."mantenimiento");
		}

		public function form(){
			
			parent::getView($this,"restaurar", "");
		}

		public function select(){
			$directorio = "./database/";
			$dir=opendir($directorio);
			while (($file = readdir($dir))!== false)
			 {
			   if ($file != '.' && $file != '..')       
				   echo '<option value="'.$directorio.$file.'">'.$directorio.$file.'</option>';      
			 }	
	    }

	    public function restaurar(){
			
			$result=$this->model->restaurar();
			$fecha=date('Y-m-d');
			$accion='Se realizo una restauración de la BASE DE DATOS ';
			$modulo='Mantenimiento';
			$id=$_SESSION['id_usuario'];
			$this->bitacora->insertar(
				$fecha,
				$accion,
				$modulo,
				$id);
			header("location:"._DIRECTORY_."mantenimiento");
		}
	
	}




?>
