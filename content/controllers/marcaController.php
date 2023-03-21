<?php
	namespace content\controllers;
	use content\libraries\core\autoload;
	use content\models\marcaModel;
	use content\controllers\bitacoraController;

class marcaController extends autoload {
  private $model;
  private $bitacora;

  public function __construct(){
        parent::__construct();
        $this->model = new marcaModel;
        $this->bitacora = new bitacoraController;

    }

    public function  listar(){
      $data = '';

      $respuesta = $this->model->listar();

    	foreach ($respuesta as $regist) 
    	{
        if(in_array("Consultar Marcas", $_SESSION['permisos'])){ 
          $data .= '<a type="button"';
          if(in_array("Modificar Marcas", $_SESSION['permisos'])){ 
            $data.=' onclick="editarMarca('.$regist['id'].');"';
           }
           $data.=' class="list-group-item text-dark list-group-item-action p-3">
            <div class="row">
              <div class="col">'.$regist['nombre'].'</div>
              <div class="col text-end"><i class="ti-angle-right"></i></div>
            </div> 
          </a>';
        };
      }
      $data .= '';

      echo $data;

    }

    public function consultar($id){
      
      $resp = $this->model->consultar($id);

      $resultados [] = [
        "nombre"=>$resp->getnombre(),
        "id"=>$resp->getid(),
      ];
      echo json_encode($resultados);
      
    }

    public function guardar(){
      if (!empty($_POST['id'] && $_POST['nombre'] )) {
        if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['nombre'] )) {
          $p=new marcaModel();

          $p->setid($_POST['id']);
          $p->setnombre($_POST['nombre']);

          $this->model->guardar($p);
          $fecha=date('Y-m-d');
                  $accion='Se modificó una marca: '.$_POST['nombre'].' ';
                  $modulo='Marcas';
                  $id=$_SESSION['id_usuario'];
                  $this->bitacora->insertar(
                      $fecha,
                      $accion,
                      $modulo,
                      $id);
        }
			}
    }

    public function registrar(){
        if (!empty( $_POST['nombre'])) {
          if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['nombre'] )) {
            $p=new marcaModel();
            $p->setnombre($_POST['nombre']);

            $resp=$this->model->registrar($p);
            $fecha=date('Y-m-d');
                $accion='Se registro una nueva marca: '.$_POST['nombre'].' ';
                $modulo='Marcas';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
            echo json_encode($resp);
          }
		    }
    }

     public function eliminarMarca($id){
			$this->model->eliminarMarca($id);
      $fecha=date('Y-m-d');
                $accion='Se eliminó una marca con el id '.$id.' ';
                $modulo='Marcas';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
   	}

    public function buscarMarca(){
      $data = '';
      $respuesta = $this->model->buscarMarca($_POST["busqueda"]);
      if ($respuesta->rowCount() > 0) {
        foreach ($respuesta as $regist) {
            if(in_array("Consultar Marcas", $_SESSION['permisos'])){ 
              $data .= '<a type="button"';
              if(in_array("Modificar Marcas", $_SESSION['permisos'])){ 
                $data.=' onclick="editarMarca('.$regist['id'].');"';
               }
               $data.=' class="list-group-item text-dark list-group-item-action p-3">
                  <div class="row">
                    <div class="col">'.$regist['nombre'].'</div>
                    <div class="col text-end"><i class="ti-angle-right"></i></div>
                  </div> 
                </a>';
            };
        }
      }else {$data .= '<div class="row align-items-center">
                        <div class="col text-secondary text-center">No hay registros</div>
                      </div>';
      }
      $data .= '';
      echo $data;
    }

}

?>